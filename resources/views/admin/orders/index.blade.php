@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-primary fw-bold">Quản lý đơn hàng</h1>
        </div>

        <div class="card shadow-sm mb-4 border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="text-primary fw-semibold">{{ $order->order_code }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td class="text-success fw-semibold">{{ number_format($order->total_amount) }}đ</td>
                                    <td>
                                        {{-- trạng thái theo statuss với Order::STATUSES --}}
                                        @php
                                            $statusInfo = $statuses[$order->status] ?? [
                                                'text' => 'Không xác định',
                                                'class' => 'bg-dark text-white',
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusInfo['class'] }}">
                                            {{ $statusInfo['text'] }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .table thead th {
            background-color: #f8f9fc;
            color: #4e73df;
            font-weight: 600;
            text-align: center;
        }

        .table td {
            vertical-align: middle;
            text-align: center;
        }

        .btn.btn-primary {
            transition: all 0.3s ease;
            border-radius: 0.4rem;
        }

        .card {
            border-radius: 1rem;
        }
    </style>
@endpush
