<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo/fav-logo1.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Sora', sans-serif;
        }

        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .admin-sidebar {
            width: 280px;
            background: #fff;
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 50;
            transition: transform 0.3s ease;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-menu {
            padding: 20px 0;
            flex: 1;
            overflow-y: auto;
        }

        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid #f3f4f6;
            background: #f9fafb;
        }

        /* Main Content Styles */
        .admin-main {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
            min-width: 0;
            transition: margin-left 0.3s ease;
        }

        .admin-topbar {
            background: #fff;
            height: 70px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 40;
        }

        .admin-content {
            padding: 30px;
            flex: 1;
        }

        /* Nav Links */
        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #6b7280; /* Gray-500 */
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            font-weight: 500;
            border-radius: 10px;
            margin: 5px 15px;
            border-left: none; /* Remove old border */
        }

        .nav-item:hover {
            background: #f3f4f6;
            color: #4E2FDA;
            transform: translateX(3px);
        }

        .nav-item.active {
            background: rgba(78, 47, 218, 0.1);
            color: #4E2FDA;
            font-weight: 600;
        }

        .nav-item i {
            width: 24px;
            margin-right: 12px;
            font-size: 18px;
            transition: color 0.2s;
        }

        .nav-item:hover i,
        .nav-item.active i {
            color: #4E2FDA;
        }

        .nav-badge {
            margin-left: auto;
            background: #e5e7eb;
            color: #6b7280;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 12px;
            min-width: 24px;
            text-align: center;
        }

        .nav-item.active .nav-badge {
            background: rgba(78, 47, 218, 0.2);
            color: #4E2FDA;
        }


        /* Mobile Toggle */
        .mobile-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: #4b5563;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.active {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .sidebar-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 45;
                display: none;
            }

            .sidebar-overlay.active {
                display: block;
            }
        }
        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #111827;
            color: #e5e7eb;
        }

        body.dark-mode .admin-sidebar {
            background: #1f2937;
            border-right-color: #374151;
        }

        body.dark-mode .sidebar-header {
            background: #1f2937; /* Dark background for header */
            border-bottom-color: #374151;
        }

        /* Styled Logo Container for Dark Mode */
        .logo-container {
            display: inline-block;
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        body.dark-mode .logo-container {
            background: #fff;
            padding: 8px 15px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        body.dark-mode .sidebar-footer {
            border-color: #374151;
            background: #1f2937;
        }

        body.dark-mode .sidebar-footer {
            background: #111827;
        }

        body.dark-mode .admin-topbar {
            background: #1f2937;
            border-bottom-color: #374151;
        }

        body.dark-mode .nav-item {
            color: #9ca3af; /* Gray-400 */
        }

        body.dark-mode .nav-item:hover {
            background: #374151; /* Gray-700 */
            color: #fff;
        }

        body.dark-mode .nav-item.active {
            background: rgba(78, 47, 218, 0.2);
            color: #c4b5fd; /* Light purple */
        }

        body.dark-mode .nav-item:hover i {
            color: #fff;
        }

        body.dark-mode .nav-item.active i {
            color: #c4b5fd;
        }

        body.dark-mode .text-dark {
            color: #e5e7eb !important;
        }

        body.dark-mode .text-muted {
            color: #9ca3af !important;
            color: #9ca3af !important;
        }

        body.dark-mode .bg-white {
            background-color: #1f2937 !important;
            color: #e5e7eb;
        }

        body.dark-mode .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.5) !important;
        }

        /* Clock Styles */
        .admin-clock {
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 16px;
            color: #4E2FDA;
            background: rgba(78, 47, 218, 0.1);
            padding: 5px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        body.dark-mode .admin-clock {
            color: #c4b5fd; /* Lighter purple for dark mode */
            background: rgba(78, 47, 218, 0.3);
        }

        /* Toggle Animation */
        #theme-toggle {
            transition: transform 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
        }
        
        #theme-toggle:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="admin-wrapper" x-data="{ sidebarOpen: false }">
        <!-- Sidebar Overlay -->
        <div class="sidebar-overlay" :class="{ 'active': sidebarOpen }" @click="sidebarOpen = false"></div>

        <!-- Sidebar -->
        @include('layouts.admin-navigation')

        <!-- Main Content -->
        <div class="admin-main">
            <!-- Top Bar -->
            <header class="admin-topbar">
                <!-- Left: Mobile Toggle -->
                <div class="d-flex align-items-center">
                    <div class="mobile-toggle" @click="sidebarOpen = !sidebarOpen">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>

                <!-- Center: Clock & Theme Toggle -->
                <div class="d-flex align-items-center gap-4 position-absolute start-50 translate-middle-x">
                    <!-- Clock -->
                    <div class="admin-clock d-none d-md-flex" id="clock-display">
                        <i class="fa-regular fa-clock"></i>
                        <span id="time-text">Loading...</span>
                        <span id="location-text" style="font-size: 12px; opacity: 0.8; margin-left: 5px;"></span>
                    </div>

                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="btn btn-link text-dark p-0" style="font-size: 20px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;" title="Toggle Theme">
                        <i class="fa-regular fa-moon" id="theme-icon"></i>
                    </button>
                </div>

                <!-- Right: User Profile -->
                <div class="d-flex align-items-center gap-4">
                    <div class="text-end d-none d-sm-block">
                        <div class="fw-bold text-dark">{{ Auth::user()->name }}</div>
                        <div class="small text-muted" style="font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px;">
                            {{ Auth::user()->role }}
                        </div>
                    </div>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="d-flex align-items-center border-0 bg-transparent p-0 gap-2" style="cursor: pointer;">
                                <div class="avatar-circle" style="width: 40px; height: 40px; background: #4E2FDA; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 18px;">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <i class="fa-solid fa-angle-down text-muted small"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('admin.users.show', auth()->user())">
                                <i class="fa-regular fa-user me-2"></i> {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fa-solid fa-arrow-right-from-bracket me-2"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>

            <!-- Page Content -->
            <main class="admin-content">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/plugins/jquery-3-6-0.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        // Clock Functionality
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', { 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit',
                hour12: true 
            });
            
            // Get Timezone/Location
            const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            const city = timeZone.split('/')[1] || timeZone;
            
            document.getElementById('time-text').textContent = timeString;
            document.getElementById('location-text').textContent = `(${city.replace('_', ' ')})`;
        }
        
        setInterval(updateClock, 1000);
        updateClock(); // Initial call

        // Dark Mode Functionality
        const themeToggle = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const body = document.body;

        // Check local storage
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'dark') {
            body.classList.add('dark-mode');
            themeIcon.classList.remove('fa-moon');
            themeIcon.classList.add('fa-sun');
        }

        themeToggle.addEventListener('click', () => {
            // Animation
            themeToggle.style.transform = 'rotate(360deg)';
            setTimeout(() => {
                themeToggle.style.transform = 'none';
            }, 500);

            body.classList.toggle('dark-mode');
            
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                localStorage.setItem('theme', 'light');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        });
    </script>

</html>
