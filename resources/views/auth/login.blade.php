<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Title -->
    <title>Login | Techlavate Solutions</title>

    <!-- Meta Description -->
    <meta name="description"
        content="Login to Techlavate Solutions. Empowering businesses with scalable Microsoft solutions.">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/fav-logo1.png') }}" type="image/x-icon">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/owlcarousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/plugins/jquery-3-6-0.min.js') }}"></script>

    <style>
        .login-section {
            padding: 120px 0;
            background-image: url('{{ asset('assets/img/bg/header-bg1.png') }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            height: 50px;
            border-radius: 5px;
            border: 1px solid #e1e1e1;
            padding: 0 20px;
        }

        .form-control:focus {
            border-color: #4E2FDA;
            box-shadow: none;
        }

        .login-btn {
            width: 100%;
            display: inline-block;
            text-align: center;
        }
    </style>
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

    <!--=====HEADER REMOVED=======-->
    <!--=====HEADER END =======-->

    <!--===== LOGIN AREA STARTS =======-->
    <div class="login-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="login-box" data-aos="fade-up" data-aos-duration="1000">
                        <div class="text-center mb-4">
                            <a href="/" class="d-block mb-4">
                                <img src="{{ asset('assets/img/logo/logo1.png') }}" alt="Techlavate Solutions"
                                    style="width: 150px; height: auto;">
                            </a>
                            <h3 class="text-anime-style-3">Welcome Back</h3>
                            <p>Please login to your account</p>
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email" class="mb-2">Email Address</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ old('email') }}" required autofocus autocomplete="username"
                                    placeholder="Enter your email">
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password" class="mb-2">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required
                                    autocomplete="current-password" placeholder="Enter your password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                    <label for="remember_me" class="form-check-label text-sm text-gray-600">Remember
                                        me</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-primary hover:text-dark"
                                        href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                @endif
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="header-btn1 login-btn">
                                    Log in <span><i class="fa-solid fa-arrow-right"></i></span>
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <p class="mb-3">Don't have an account?</p>
                                <a href="{{ route('register') }}" class="header-btn2 w-100 text-center"
                                    style="display: inline-block; padding: 12px 30px; border: 2px solid #4E2FDA; color: #4E2FDA;">
                                    Create Account <span><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== LOGIN AREA ENDS =======-->

    <!--===== FOOTER REMOVED =======-->
    <!--===== FOOTER AREA ENDS =======-->

    <!--===== JS SCRIPT LINK =======-->
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/aos.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counter.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/Splitetext.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/sidebar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owlcarousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap-animation.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
