<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page Not Found (404) | Microsoft Dynamics & ERP Experts - Techlavate</title>

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="/assets/img/logo/fav-logo1.png" type="image/x-icon" />

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/aos.css" />
    <link rel="stylesheet" href="/assets/css/plugins/fontawesome.css" />
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup.css" />
    <link rel="stylesheet" href="/assets/css/plugins/mobile.css" />
    <link rel="stylesheet" href="/assets/css/plugins/owlcarousel.min.css" />
    <link rel="stylesheet" href="/assets/css/plugins/sidebar.css" />
    <link rel="stylesheet" href="/assets/css/plugins/slick-slider.css" />
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />

    <!--=====  JS SCRIPT LINK =======-->
    <script src="/assets/js/plugins/jquery-3-6-0.min.js"></script>

    <script>
        // Countdown and redirect script
        let countdown = 10;

        function updateCounter() {
            document.getElementById('countdown').innerText = countdown;
            if (countdown === 0) {
                window.location.href = '/';
            } else {
                countdown--;
                setTimeout(updateCounter, 1000);
            }
        }
        window.onload = updateCounter;
    </script>
</head>

<body class="homepage1-body">

    <!--===== PROGRESS STARTS=======-->
    <div class="paginacontainer">
        <div class="progress-wrap">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </div>
    <!--===== PROGRESS ENDS=======-->

    <!--=====HEADER START=======-->
    @include('header')
    <!--=====HEADER END =======-->

    <!--===== HERO AREA STARTS =======-->
    <div class="about-header-area"
        style="background-image: url(assets/img/bg/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <img src="/assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1" />
        <img src="/assets/img/elements/star2.png" alt="" class="star2 keyframe5" />
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="about-inner-header heading9 text-center">
                        <h1>404 Error</h1>
                        <a href="/">Home <i class="fa-solid fa-angle-right"></i> <span>404 Error</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <!--===== ERROR AREA STARTS =======-->
    <div class="error-section-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="heading2 text-center">
                        <img src="/assets/img/all-images/error-img1.png" alt="" />
                        <div class="space50"></div>
                        <h2> Sorry! Page Not Found!</h2>
                        <div class="space16"></div>
                        <p>
                            Sorry, the page you are looking for doesn’t exist or has
                            <br class="d-lg-block d-none" /> been moved. Here are some helpful links.
                        </p>
                        <p>
                            Redirecting to home in <span id="countdown">10</span> seconds...
                        </p>
                        <div class="space24"></div>
                        <div class="btn-area1">
                            <a href="/" class="header-btn1">Back To Home <span><i
                                        class="fa-solid fa-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== ERROR AREA ENDS =======-->

    <!--===== FOOTER AREA STARTS =======-->
    @include('footer')
    <!--===== FOOTER AREA ENDS =======-->

    <!--===== JS SCRIPT LINK =======-->
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/fontawesome.js"></script>
    <script src="/assets/js/plugins/aos.js"></script>
    <script src="/assets/js/plugins/counter.js"></script>
    <script src="/assets/js/plugins/gsap.min.js"></script>
    <script src="/assets/js/plugins/ScrollTrigger.min.js"></script>
    <script src="/assets/js/plugins/Splitetext.js"></script>
    <script src="/assets/js/plugins/sidebar.js"></script>
    <script src="/assets/js/plugins/magnific-popup.js"></script>
    <script src="/assets/js/plugins/mobilemenu.js"></script>
    <script src="/assets/js/plugins/owlcarousel.min.js"></script>
    <script src="/assets/js/plugins/gsap-animation.js"></script>
    <script src="/assets/js/plugins/nice-select.js"></script>
    <script src="/assets/js/plugins/waypoints.js"></script>
    <script src="/assets/js/plugins/slick-slider.js"></script>
    <script src="/assets/js/plugins/circle-progress.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
