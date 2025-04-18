<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky">
        <ul class="nav flex-column">

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://127.0.0.1:8000/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/products">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-shopping-bag">
                        <path
                            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h8.64a2 2 0 0 0 2-1.61L23 6H6"></path>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <span class="ml-2">Products</span>
                </a>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-folder">
                        <path
                            d="M3 7V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V7C21 5.9 20.1 5 19 5H11L9 3H5C3.9 3 3 3.9 3 5V7Z">
                        </path>
                    </svg>
                    <span class="ml-2">Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/banners">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-image">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                        <polyline points="21 15 16 10 5 21"></polyline>
                    </svg>
                    <span class="ml-2">Banners</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/users/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="ml-2">Customers</span>
                </a>
            </li>

        </ul>
    </div>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let navLinks = document.querySelectorAll(".nav-link");
        let currentPath = window.location.pathname; // Lấy đường dẫn hiện tại

        navLinks.forEach(link => {
            let linkPath = new URL(link.href).pathname; // Lấy đường dẫn từ href

            if (currentPath === linkPath) {
                link.classList.add("active"); // Thêm class active
            } else {
                link.classList.remove("active"); // Đảm bảo các link khác không bị active
            }
        });
    });
</script>
