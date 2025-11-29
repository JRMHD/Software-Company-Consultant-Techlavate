<header>
    <div class="header-area homepage1 header header-sticky d-none d-lg-block" id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-elements">
                        <div class="site-logo">
                            <a href="/"><img src="/assets/img/logo/logo1.png" alt="Logo"
                                    style="width: 120px; height: auto;"></a>
                        </div>
                        <div class="main-menu" style="font-size: 14px;">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/services">Services</a></li>
                                <li>
                                    <a href="#" onclick="toggleDesktopDropdown(event)">Solutions <i class="fa-solid fa-chevron-down" style="font-size: 10px; margin-left: 4px;"></i></a>
                                    <div class="dropdown-menu">
                                        <a href="/recruiting">Recruiting Services</a>
                                        <a href="/implementation-strategy">Implementation Strategy</a>
                                        <a href="/industries">Industries We Serve</a>
                                    </div>
                                </li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="btn-area" style="display: flex; gap: 10px;">
                            <a href="/login" class="header-btn2" style="padding: 8px 20px; font-size: 14px; border: 2px solid #4E2FDA; color: #4E2FDA; white-space: nowrap;">Login <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                            <a href="/quote" class="header-btn1" style="padding: 8px 20px; font-size: 14px; white-space: nowrap;">Free Quote <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Get current path
        const currentPath = window.location.pathname;

        // Get all nav links
        document.querySelectorAll('.main-menu ul li a').forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    </script>
    <style>
        .main-menu ul li a.active {
            color: #007bff;
            /* Highlight color */
            font-weight: bold;
            border-bottom: 2px solid #007bff;
            /* Optional underline effect */
        }

        /* Dropdown styles */
        .main-menu ul li {
            position: relative;
        }

        .main-menu ul li .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            padding: 8px 0;
            min-width: 240px;
            display: none;
            z-index: 1000;
            margin-top: 10px;
            border: 1px solid #e5e7eb;
        }

        .main-menu ul li .dropdown-menu.show {
            display: block;
            animation: dropdownFadeIn 0.3s ease;
        }

        @keyframes dropdownFadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .main-menu ul li .dropdown-menu a {
            display: block;
            padding: 12px 20px;
            color: #374151;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            font-weight: 500;
            border-left: 3px solid transparent;
        }

        .main-menu ul li .dropdown-menu a:hover {
            background: linear-gradient(90deg, rgba(78, 47, 218, 0.1) 0%, transparent 100%);
            color: #4E2FDA;
            border-left-color: #4E2FDA;
            padding-left: 24px;
        }

        /* Mobile submenu styles */
        .mobile-submenu li {
            margin: 5px 0;
        }

        .mobile-submenu li a {
            color: #666;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .mobile-submenu li a:hover {
            color: #4E2FDA;
        }
    </style>

    <script>
        function toggleDesktopDropdown(event) {
            event.preventDefault();
            const dropdown = event.target.closest('li').querySelector('.dropdown-menu');
            const isVisible = dropdown.classList.contains('show');

            // Close all other dropdowns first
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
            });

            if (!isVisible) {
                dropdown.classList.add('show');
            }
        }

        function toggleMobileSubmenu(event) {
            event.preventDefault();
            const submenu = event.target.nextElementSibling;
            if (submenu.style.display === 'none' || submenu.style.display === '') {
                submenu.style.display = 'block';
                event.target.querySelector('i').classList.remove('fa-chevron-down');
                event.target.querySelector('i').classList.add('fa-chevron-up');
            } else {
                submenu.style.display = 'none';
                event.target.querySelector('i').classList.remove('fa-chevron-up');
                event.target.querySelector('i').classList.add('fa-chevron-down');
            }
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.main-menu li')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
            }
        });
    </script>
</header>
<!--===== MOBILE HEADER STARTS =======-->
<div class="mobile-header mobile-haeder1 d-block d-lg-none">
    <div class="container-fluid">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="/"><img src="assets/img/logo/logo1.png" alt=""
                            style="width: 120px; height: auto;"></a>
                </div>
                <div class="mobile-nav-icon dots-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-sidebar mobile-sidebar1">
    <div class="logosicon-area">
        <div class="logos">
            <img src="/assets/img/logo/logo1.png" alt="" style="width: 120px; height: auto;">
        </div>
        <div class="menu-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="mobile-nav mobile-nav1">
        <ul class="mobile-nav-list nav-list1">
            <li><a href="/">Home</a></li>
            <li><a href="/services">Services</a></li>
            <li>
                <a href="#" onclick="toggleMobileSubmenu(event)" style="display: flex; justify-content: space-between; align-items: center;">
                    Solutions
                    <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i>
                </a>
                <ul class="mobile-submenu" style="display: none; padding-left: 20px; margin-top: 10px;">
                    <li><a href="/recruiting">Recruiting Services</a></li>
                    <li><a href="/implementation-strategy">Implementation Strategy</a></li>
                    <li><a href="/industries">Industries We Serve</a></li>
                </ul>
            </li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>

        </ul>

        <div class="allmobilesection">
            <a href="/login" class="header-btn2" style="border: 2px solid #4E2FDA; color: #4E2FDA; margin-bottom: 10px; display: block;">Login <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
            <a href="/quote" class="header-btn1">Free Quote Request <span><i
                        class="fa-solid fa-arrow-right"></i></span></a>
            <div class="single-footer">
                <h3>Contact Info</h3>
                <div class="footer1-contact-info">
                    <div class="contact-info-single">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="contact-info-text">
                            <a href="tel:952-353-6368">952-353-6368</a>
                        </div>
                    </div>

                    <div class="contact-info-single">
                        <div class="contact-info-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <a href="mailto:info@techlavate.com">
                                info@techlavate.com</a>
                        </div>
                    </div>

                    <div class="single-footer">
                        <h3>Our Location</h3>

                        <div class="contact-info-single">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="contact-info-text">
                                <a href="mailto:info@techlavate.com">700 Twelve Oaks Center Dr #246, Wayzata, MN
                                    55391</a>
                            </div>
                        </div>

                    </div>
                    <div class="single-footer">
                        <h3>Social Links</h3>

                        <div class="social-links-mobile-menu">
                            <ul>
                                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== MOBILE HEADER ENDS =======-->
<!--===== PRELOADER STARTS =======-->
<div class="preloader">
    <div class="loading-container">
        <div class="loading"></div>
        <div id="loading-icon" style="display: flex; justify-content: center; align-items: center;">
            <img src="/assets/img/logo/preloader.png" alt="">
        </div>
    </div>
</div>
<!--===== PRELOADER ENDS =======-->
