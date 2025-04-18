<div>
    <!-- We must ship. - Taylor Otwell -->
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        :root {
            --primary: #0a1d37;
            --secondary: #ffd700;
            --accent: #00c2ff;
            --text: #f8f8f8;
            --glass: rgba(255, 255, 255, 0.05);
        }

        body {
            background: linear-gradient(135deg, #0a0e1a 0%, #1a1a2e 100%);
        }

        /* Thanh RGB dài full trang, màu nổi bật */
        #nprogress .bar {
            background: linear-gradient(90deg, red, orange, yellow, green, cyan, blue, violet);
            height: 1.5px;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
        }

        #nprogress .peg {
            display: none;
        }
        /* Màu vàng chủ đạo */


        .text-gold-soft {
            color: rgba(212, 175, 55, 0.7) !important;
        }

        .bg-gold {
            background-color: #d4af37 !important;
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.5), 0 0 15px rgba(212, 175, 55, 0.6);
        }

        .border-gold {
            border-color: rgba(212, 175, 55, 0.3) !important;
            background-color: #121212 !important;
        }

        /* Phân trang */
        .pagination {
            --bs-pagination-padding-x: 1rem;
            --bs-pagination-padding-y: 0.5rem;
            --bs-pagination-font-size: 1rem;
        }

        .page-link {
            margin: 0 0.25rem;
            border-radius: 5px !important;
            min-width: 40px;
            text-align: center;
            transition: all 0.3s ease;
            font-family: 'Playfair Display', serif;
            font-weight: 500;
        }

        /* Hiệu ứng lấp lánh và hoạt ảnh cho nút phân trang */
        .page-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
            animation: shine 1.5s infinite;
        }

        .page-item.active .page-link {
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.4);
            background: linear-gradient(45deg, rgba(212, 175, 55, 0.8), rgba(0, 0, 0, 0.8));
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Hiệu ứng lấp lánh */
        @keyframes shine {
            0% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.8);
            }
            50% {
                box-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
            }
            100% {
                box-shadow: 0 0 10px rgba(212, 175, 55, 0.8);
            }
        }


</head>

<body>
    @include('admin.layouts.partials.nav')

    <div class="container-fluid">
        <div class="row">

            @include('admin.layouts.partials.sidebar')

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4 ">

                @yield('content')

            </main>
        </div>
    </div>
    @include('admin.layouts.partials.footer')



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="js/scripts.js"></script>

    @yield('scripts')
</body>

</html>
