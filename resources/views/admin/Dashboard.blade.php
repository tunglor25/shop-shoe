<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bảng điều khiển Admin')</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <style>
        :root {
            --gold: #d4af37;
            --gold-light: #f1e5ac;
            --gold-dark: #a67c00;
            --gold-soft: rgba(212, 175, 55, 0.7);
            --dark-bg: #121212;
            --darker-bg: #0a0a0a;
            --border-gold: rgba(212, 175, 55, 0.3);
            --footer-height: 60px;
            --header-height: 60px;
            --sidebar-width: 250px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0e1a 0%, #1a1a2e 100%);
            color: white;
            padding-top: var(--header-height);
        }

        /* NProgress */
        #nprogress .bar {
            background: linear-gradient(90deg, red, orange, yellow, green, cyan, blue, violet);
            height: 1.5px;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--header-height) - var(--footer-height));
        }

        @media (max-width: 992px) {
            .luxury-sidebar {
                left: -100%;
            }

            .luxury-sidebar.show {
                left: 0;
            }

            .main-content {
                margin-left: 0;
                margin-top: var(--header-height);
            }

            .luxury-footer {
                left: 0;
            }
        }

        /* Luxury VIP Style */
        .text-gold {
            color: #d4af37 !important;
        }

        .text-gold-soft {
            color: rgba(212, 175, 55, 0.8) !important;
        }

        .bg-gold {
            background-color: #d4af37 !important;
        }

        .btn-gold {
            background-color: #d4af37;
            color: #121212;
            border: none;
            transition: all 0.3s;
        }

        .btn-gold:hover {
            background-color: #c9a227;
            color: #121212;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
        }

        .btn-outline-gold {
            color: #d4af37;
            border-color: #d4af37;
            background: transparent;
        }

        .btn-outline-gold:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: #d4af37;
        }

        .border-gold {
            border-color: rgba(212, 175, 55, 0.3) !important;
        }

        .luxury-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .luxury-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4) !important;
        }

        .stat-card {
            cursor: pointer;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
        }

        .trend-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 0.75rem;
        }

        .dropdown-menu-dark {
            background-color: #1a1a1a;
            border: 1px solid rgba(212, 175, 55, 0.3);
        }

        .dropdown-item.text-light:hover {
            background-color: rgba(212, 175, 55, 0.2);
            color: #d4af37 !important;
        }

        .avatar-sm {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    @yield('styles')
</head>

<body>
    @include('admin.layouts.partials.nav')
    @include('admin.layouts.partials.sidebar')

    <main class="main-content">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
            rel="stylesheet">

        <div class="container-fluid py-4">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <div class="d-flex justify-content-between align-items-center">
                    <ol class="breadcrumb mb-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="#" class="text-gold-soft"><i
                                    class="fas fa-home me-1"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item active text-gold" aria-current="page">Bảng điều khiển</li>
                    </ol>
                    <div class="dropdown">
                        <button class="btn btn-gold dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-calendar-alt me-2"></i>{{ $currentPeriod }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item text-light period-filter" href="#"
                                    data-period="today">Hôm nay</a></li>
                            <li><a class="dropdown-item text-light period-filter" href="#" data-period="week">Tuần này</a></li>
                            <li><a class="dropdown-item text-light period-filter" href="#"
                                    data-period="month">Tháng này</a></li>
                            <li><a class="dropdown-item text-light period-filter" href="#" data-period="year">Năm nay</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <h1 class="h2 mt-4 mb-4 text-gold" style="font-family: 'Playfair Display', serif;">
                <i class="fas fa-chart-line me-2"></i> Tổng quan Bảng điều khiển
            </h1>

            <!-- Statistics Cards -->
            <div class="row g-4">
                <!-- Sales Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="luxury-card stat-card"
                        style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3);">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="stat-icon" style="background: rgba(212,175,55,0.1); color: #d4af37;">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <span class="badge {{ $salesChange >= 0 ? 'bg-success' : 'bg-danger' }} trend-badge">
                                    <i
                                        class="fas fa-arrow-{{ $salesChange >= 0 ? 'up' : 'down' }} me-1"></i>{{ round(abs($salesChange), 1) }}%
                                </span>
                            </div>
                            <h6 class="text-gold-soft mb-2">Tổng đơn hàng</h6>
                            <h4 class="mb-3 text-light">{{ $totalSales }}</h4>
                            <div class="progress" style="height: 8px; background: rgba(212,175,55,0.1);">
                                <div class="progress-bar bg-gold" style="width: {{ min(abs($salesChange), 100) }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="luxury-card stat-card"
                        style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3);">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="stat-icon" style="background: rgba(25,135,84,0.1); color: #198754;">
                                    <i class="fas fa-users"></i>
                                </div>
                                <span class="badge {{ $usersChange >= 0 ? 'bg-success' : 'bg-danger' }} trend-badge">
                                    <i
                                        class="fas fa-arrow-{{ $usersChange >= 0 ? 'up' : 'down' }} me-1"></i>{{ round(abs($usersChange), 1) }}%
                                </span>
                            </div>
                            <h6 class="text-gold-soft mb-2">Người dùng hoạt động</h6>
                            <h4 class="mb-3 text-light">{{ number_format($activeUsers) }}</h4>
                            <div class="progress" style="height: 8px; background: rgba(212,175,55,0.1);">
                                <div class="progress-bar bg-success" style="width: {{ min(abs($usersChange), 100) }}%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Orders Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="luxury-card stat-card"
                        style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3);">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="stat-icon" style="background: rgba(255,193,7,0.1); color: #ffc107;">
                                    <i class="fas fa-box"></i>
                                </div>
                                <span class="badge {{ $ordersChange >= 0 ? 'bg-success' : 'bg-danger' }} trend-badge">
                                    <i
                                        class="fas fa-arrow-{{ $ordersChange >= 0 ? 'up' : 'down' }} me-1"></i>{{ round(abs($ordersChange), 1) }}%
                                </span>
                            </div>
                            <h6 class="text-gold-soft mb-2">Đơn hàng mới</h6>
                            <h4 class="mb-3 text-light">{{ number_format($newOrders) }}</h4>
                            <div class="progress" style="height: 8px; background: rgba(212,175,55,0.1);">
                                <div class="progress-bar bg-warning"
                                    style="width: {{ min(abs($ordersChange), 100) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Revenue Card -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="luxury-card stat-card"
                        style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3);">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="stat-icon" style="background: rgba(13,110,253,0.1); color: #0d6efd;">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <span
                                    class="badge {{ $revenueChange >= 0 ? 'bg-success' : 'bg-danger' }} trend-badge">
                                    <i
                                        class="fas fa-arrow-{{ $revenueChange >= 0 ? 'up' : 'down' }} me-1"></i>{{ round(abs($revenueChange), 1) }}%
                                </span>
                            </div>
                            <h6 class="text-gold-soft mb-2">Doanh thu</h6>
                            <h4 class="mb-3 text-light">${{ $revenue }}</h4>
                            <div class="progress" style="height: 8px; background: rgba(212,175,55,0.1);">
                                <div class="progress-bar bg-primary"
                                    style="width: {{ min(abs($revenueChange), 100) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Section -->
            <div class="row mt-4" style="padding-bottom: 20px;">
                <div class="col-12">
                    <div class="luxury-card"
                        style="background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%); border: 1px solid rgba(212,175,55,0.3);">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="card-title mb-0 text-gold" style="font-family: 'Playfair Display', serif;">
                                    <i class="fas fa-bell me-2"></i> Hoạt động gần đây
                                </h5>
                                <button class="btn btn-outline-gold btn-sm">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                            <div class="list-group list-group-flush">
                                @foreach ($recentActivities as $activity)
                                    <div class="list-group-item border-0 d-flex align-items-center px-0"
                                        style="background: transparent; border-bottom: 1px solid rgba(212,175,55,0.1) !important;">
                                        <div class="avatar-sm rounded-circle p-2 me-3"
                                            style="background: rgba({{ hexdec(substr($activity['icon_color'], 1, 2)) }}, {{ hexdec(substr($activity['icon_color'], 3, 2)) }}, {{ hexdec(substr($activity['icon_color'], 5, 2)) }}, 0.1); color: {{ $activity['icon_color'] }};">
                                            <i class="fas fa-{{ $activity['icon'] }}"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1 text-light">{{ $activity['title'] }}</h6>
                                            <p class="text-gold-soft small mb-0">{{ $activity['description'] }}</p>
                                        </div>
                                        <small class="text-gold-soft">{{ $activity['time'] }}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('admin.layouts.partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý dropdown lọc theo thời gian
        document.querySelectorAll('.period-filter').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const period = this.getAttribute('data-period');
                const periodText = this.textContent.trim();

                // Cập nhật text trên nút dropdown
                const dropdownBtn = document.querySelector('.btn-gold .fa-calendar-alt').parentNode;
                dropdownBtn.querySelector('span').textContent = periodText;

                // Hiển thị trạng thái loading
                const cards = document.querySelectorAll('.stat-card');
                cards.forEach(card => {
                    card.style.opacity = '0.7';
                    card.querySelector('h4').innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                });

                // Gửi AJAX request
                fetch('{{ route("admin.dashboard.filter") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ period: period })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Lỗi kết nối mạng');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        // Hàm helper để cập nhật dữ liệu thẻ
                        const updateCard = (index, value, change, prefix = '') => {
                            const card = document.querySelector(`.stat-card:nth-child(${index})`);
                            card.querySelector('h4').textContent = prefix + value;

                            const badge = card.querySelector('.trend-badge');
                            badge.className = `badge ${change >= 0 ? 'bg-success' : 'bg-danger'} trend-badge`;
                            badge.innerHTML = `<i class="fas fa-arrow-${change >= 0 ? 'up' : 'down'} me-1"></i>${Math.abs(change)}%`;

                            const progressBar = card.querySelector('.progress-bar');
                            progressBar.style.width = `${Math.min(Math.abs(change), 100)}%`;
                        };

                        // Cập nhật tất cả các thẻ
                        updateCard(1, data.data.totalSales, data.data.salesChange, '$');
                        updateCard(2, data.data.activeUsers, data.data.usersChange);
                        updateCard(3, data.data.newOrders, data.data.ordersChange);
                        updateCard(4, data.data.revenue, data.data.revenueChange, '$');
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    // Hiển thị thông báo lỗi
                    const toast = `<div class="toast show position-fixed bottom-0 end-0 m-3" role="alert">
                        <div class="toast-header bg-danger text-white">
                            <strong class="me-auto">Lỗi</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="toast-body">
                            Cập nhật dữ liệu bảng điều khiển thất bại. Vui lòng thử lại.
                        </div>
                    </div>`;
                    document.body.insertAdjacentHTML('beforeend', toast);

                    // Xóa toast sau 5 giây
                    setTimeout(() => {
                        const toasts = document.querySelectorAll('.toast');
                        toasts.forEach(toast => toast.remove());
                    }, 5000);
                })
                .finally(() => {
                    // Khôi phục độ mờ của thẻ
                    cards.forEach(card => {
                        card.style.opacity = '1';
                    });
                });
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.period-filter').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const period = this.dataset.period;

                // Gửi request lên server để lọc theo thời gian
                window.location.href = `?period=${period}`;
            });
        });
    });
    </script>
</body>
</html>
