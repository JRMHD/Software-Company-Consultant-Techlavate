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
                        <div class="main-menu">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/services">Services</a></li>
                                <li><a href="/implementation-strategy">Implementation Strategy</a></li>
                                <li><a href="/industries">Industries We Serve</a></li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="btn-area">
                            <a href="/quote" class="header-btn1">Free Quote Request <span><i
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
    </style>
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
            <li><a href="/implementation-strategy">Implementation Strategy</a></li>
            <li><a href="/industries">Industries We Serve</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">Contact</a></li>

        </ul>

        <div class="allmobilesection">
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
