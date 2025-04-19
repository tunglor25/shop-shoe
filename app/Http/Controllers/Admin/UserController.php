<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Hiển thị danh sách người dùng
     */
    public function index(Request $request)
    {
        $title = 'Danh sách người dùng';
        $search = $request->input('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('username', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('full_name', 'like', "%{$search}%");
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.users.index', compact('title','users', 'search'));
    }

    /**
     * Hiển thị thông tin chi tiết người dùng
     */
    public function show(User $user)
    {
        $title = 'Thông tin người dùng';
        return view('admin.users.show', compact('title','user'));
    }

    /**
     * Chặn hoặc bỏ chặn tài khoản người dùng
     */
    public function toggleBan(User $user)
    {
        // Ngăn chặn tự chặn tài khoản mình
        if ($user->id === auth()->id()) {
            return redirect()->back()
                             ->with('error', 'Bạn không thể tự chặn tài khoản của mình');
        }

        // Đảo trạng thái
        $user->status = $user->status === 'active' ? 'banned' : 'active';
        $user->save();

        $action = $user->status === 'banned' ? 'đã chặn' : 'đã bỏ chặn';

        return redirect()->back()
                         ->with('success', "Đã $action tài khoản {$user->username}");
    }
}
