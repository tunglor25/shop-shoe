<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\User;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $period = $request->input('period', 'today');
        $currentPeriod = $this->getCurrentPeriodText($period);
        $data = $this->getDashboardData($period);
        $recentActivities = $this->getRecentActivities();

        return view('admin.Dashboard', array_merge($data, [
            'currentPeriod' => $currentPeriod,
            'recentActivities' => $recentActivities,
        ]));
    }

    public function filter(Request $request)
    {
        $period = $request->input('period', 'today');
        $data = $this->getDashboardData($period);

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    protected function getCurrentPeriodText($period)
    {
        return match ($period) {
            'week' => 'This Week',
            'month' => 'This Month',
            'year' => 'This Year',
            default => 'Today',
        };
    }

    protected function getDashboardData($period)
    {
        $dateRange = $this->getDateRange($period);
        $compareDateRange = $this->getCompareDateRange($period);

        $currentData = [
            'totalSales' => $this->getTotalSales($dateRange['start'], $dateRange['end']),
            'activeUsers' => $this->getActiveUsers($dateRange['start'], $dateRange['end']),
            'newOrders' => $this->getNewOrders($dateRange['start'], $dateRange['end']),
            'revenue' => $this->getRevenue($dateRange['start'], $dateRange['end']),
        ];

        $compareData = [
            'totalSales' => $this->getTotalSales($compareDateRange['start'], $compareDateRange['end']),
            'activeUsers' => $this->getActiveUsers($compareDateRange['start'], $compareDateRange['end']),
            'newOrders' => $this->getNewOrders($compareDateRange['start'], $compareDateRange['end']),
            'revenue' => $this->getRevenue($compareDateRange['start'], $compareDateRange['end']),
        ];

        return array_merge($currentData, [
            'salesChange' => $this->calculateChange($currentData['totalSales'], $compareData['totalSales']),
            'usersChange' => $this->calculateChange($currentData['activeUsers'], $compareData['activeUsers']),
            'ordersChange' => $this->calculateChange($currentData['newOrders'], $compareData['newOrders']),
            'revenueChange' => $this->calculateChange($currentData['revenue'], $compareData['revenue']),
        ]);
    }

    protected function getDateRange($period)
    {
        $now = Carbon::now();

        return match ($period) {
            'week' => ['start' => $now->startOfWeek(), 'end' => $now->copy()->endOfWeek()],
            'month' => ['start' => $now->startOfMonth(), 'end' => $now->copy()->endOfMonth()],
            'year' => ['start' => $now->startOfYear(), 'end' => $now->copy()->endOfYear()],
            default => ['start' => $now->startOfDay(), 'end' => $now->copy()->endOfDay()],
        };
    }

    protected function getCompareDateRange($period)
    {
        $now = Carbon::now();

        return match ($period) {
            'week' => ['start' => $now->copy()->subWeek()->startOfWeek(), 'end' => $now->copy()->subWeek()->endOfWeek()],
            'month' => ['start' => $now->copy()->subMonth()->startOfMonth(), 'end' => $now->copy()->subMonth()->endOfMonth()],
            'year' => ['start' => $now->copy()->subYear()->startOfYear(), 'end' => $now->copy()->subYear()->endOfYear()],
            default => ['start' => $now->copy()->subDay()->startOfDay(), 'end' => $now->copy()->subDay()->endOfDay()],
        };
    }

    protected function getTotalSales($startDate, $endDate)
    {
        return Order::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', '!=', 'delivered')
            ->count();
    }

    protected function getActiveUsers($startDate, $endDate)
    {
        // Using 'status' field with assumed 'active' value
        // Change 'active' to whatever status value you use for active users
        $count = User::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'active')
            ->count();

        return number_format($count);
    }

    protected function getNewOrders($startDate, $endDate)
    {
        $count = Order::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'pending')
            ->count();

        return number_format($count);
    }

    protected function getRevenue($startDate, $endDate)
    {
        $amount = Order::whereBetween('created_at', [$startDate, $endDate])
            ->where('status', 'delivered')
            ->sum('total_amount');
        return number_format($amount, 2);
    }

    protected function calculateChange($currentValue, $previousValue)
    {
        $current = (float) str_replace(',', '', $currentValue);
        $previous = (float) str_replace(',', '', $previousValue);

        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }

        return (($current - $previous) / $previous) * 100;
    }

    protected function getRecentActivities()
{
    $activities = [];

    // Người dùng mới đăng ký
    $users = User::latest()->take(3)->get();
    foreach ($users as $user) {
        $activities[] = [
            'icon' => 'user-plus',
            'icon_color' => '#198754',
            'title' => 'Đăng ký người dùng mới',
            'description' => $user->name . ' đã đăng ký tài khoản',
            'time' => $user->created_at->diffForHumans(),
        ];
    }

    // Đơn hàng mới tạo
    $orders = Order::latest()->take(3)->get();
    foreach ($orders as $order) {
        $activities[] = [
            'icon' => 'shopping-cart',
            'icon_color' => '#d4af37',
            'title' => 'Đơn hàng mới',
            'description' => 'Đơn hàng #' . $order->id . ' trị giá ' . number_format($order->total_amount) . '₫',
            'time' => $order->created_at->diffForHumans(),
        ];
    }

    // Đơn hàng đã thanh toán
    $completedOrders =Order::where('status', 'completed')->latest()->take(2)->get();
    foreach ($completedOrders as $completed) {
        $activities[] = [
            'icon' => 'credit-card',
            'icon_color' => '#0d6efd',
            'title' => 'Thanh toán hoàn tất',
            'description' => 'Đơn hàng #' . $completed->id . ' đã được thanh toán',
            'time' => $completed->updated_at->diffForHumans(),
        ];
    }

    // Đơn hàng đã giao (nếu có trạng thái 'shipped')
    $shippedOrders =Order::where('status', 'shipped')->latest()->take(2)->get();
    foreach ($shippedOrders as $shipped) {
        $activities[] = [
            'icon' => 'truck',
            'icon_color' => '#fd7e14',
            'title' => 'Đơn hàng đã vận chuyển',
            'description' => 'Đơn hàng #' . $shipped->id . ' đã được giao cho khách',
            'time' => $shipped->updated_at->diffForHumans(),
        ];
    }

    // Gộp và sắp xếp theo thời gian giảm dần
    usort($activities, function ($a, $b) {
        return strtotime($b['time']) - strtotime($a['time']);
    });

    return array_slice($activities, 0, 5); // Lấy 5 hoạt động gần nhất
}

}
