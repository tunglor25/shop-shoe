<div id="luxury-nav-isolated">
    <!-- CSS chỉ áp dụng cho navbar này -->
    @once
    <style>
        :root {
            --gold-color: #D4AF37;
            --dark-bg: #1a1a1a;
            --light-gold: #f8e6c0;
        }

        .footer {
            background: linear-gradient(to right, var(--dark-bg), #2c3e50);
            color: #ffffff;
            padding: 70px 0 30px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(to right, var(--gold-color), var(--light-gold));
        }

        .footer-logo {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(45deg, var(--gold-color), var(--light-gold));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .footer-about {
            color: #a4b5c6;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .footer h5 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 25px;
            position: relative;
        }

        .footer h5::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 30px;
            height: 2px;
            background: var(--gold-color);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #a4b5c6;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--gold-color);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icon {
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--gold-color);
            transform: translateY(-3px);
            color: #fff;
        }

        .footer-newsletter {
            position: relative;
            margin-top: 20px;
        }

        .footer-newsletter input {
            padding: 12px 15px;
            border-radius: 25px;
            border: none;
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            outline: none;
            padding-right: 50px;
        }

        .footer-newsletter input::placeholder {
            color: #a4b5c6;
        }

        .newsletter-btn {
            position: absolute;
            right: 5px;
            top: 5px;
            bottom: 5px;
            width: 40px;
            border-radius: 50%;
            background: var(--gold-color);
            border: none;
            color: #fff;
            transition: all 0.3s ease;
        }

        .newsletter-btn:hover {
            background: var(--light-gold);
        }

        .footer-bottom {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: #a4b5c6;
        }

        .footer-bottom-links {
            list-style: none;
            padding: 0;
            margin: 15px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer-bottom-links a {
            color: #a4b5c6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: var(--gold-color);
        }

        @media (max-width: 768px) {
            .footer-section {
                margin-bottom: 40px;
            }
        }
    </style>
    @endonce

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 footer-section">
                    <div class="footer-logo">SOLEMATE</div>
                    <p class="footer-about">SOLEMATE – Mỗi đôi giày là một câu chuyện đẹp, mỗi bước đi là một trải nghiệm sang trọng</p>
                    <div class="social-links">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-section">
                    <h5>Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-section">
                    <h5>Support</h5>
                    <ul class="footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Contact Support</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 footer-section">
                    <h5>Newsletter</h5>
                    <p class="footer-about">Subscribe to our newsletter for updates, news, and exclusive offers.</p>
                    <div class="footer-newsletter">
                        <input type="email" placeholder="Enter your email">
                        <button class="newsletter-btn">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <ul class="footer-bottom-links">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                </ul>
                <p style="font-weight: bold; letter-spacing: 1px; font-family: 'Playfair Display', serif;">
                    © 2024 SOLEMATE | BẢN QUYỀN THUỘC VỀ
                    <a href="#" style="
                        text-decoration: none;
                        font-weight: bold;
                        background: linear-gradient(45deg, #D4AF37, #f8e6c0);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        transition: all 0.3s ease;">
                        TUNGLOR
                    </a>
                </p>

            </div>
        </div>
    </footer>

    <!-- JS riêng cho navbar -->
    @once
        <!-- Bootstrap 5 JS Bundle với Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Thêm hiệu ứng scroll cho navbar
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.luxury-navbar');
                if (window.scrollY > 50) {
                    navbar.style.boxShadow = '0 2px 20px rgba(212, 175, 55, 0.3)';
                    navbar.style.paddingTop = '0.5rem';
                    navbar.style.paddingBottom = '0.5rem';
                } else {
                    navbar.style.boxShadow = '0 2px 15px rgba(212, 175, 55, 0.2)';
                    navbar.style.paddingTop = '1rem';
                    navbar.style.paddingBottom = '1rem';
                }
            });
        </script>
    @endonce
</div>
