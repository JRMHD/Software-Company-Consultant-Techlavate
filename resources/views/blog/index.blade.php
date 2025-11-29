<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Title -->
    <title>Blog | Techlavate Solutions - Microsoft Dynamics 365 & Power Platform Insights</title>

    <!-- Meta Description -->
    <meta name="description" content="Explore expert insights, industry trends, and the latest updates on Microsoft Dynamics 365, Power Platform, Business Central, and Power BI from Techlavate Solutions.">

    <!-- Meta Keywords -->
    <meta name="keywords" content="Microsoft Dynamics 365 Blog, Power Platform Insights, Business Central Tips, Power BI Analytics, ERP Blog, CRM Blog, Digital Transformation, Techlavate Solutions">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/blog') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/logo/fav-logo1.png" type="image/x-icon">

    <!-- Open Graph -->
    <meta property="og:title" content="Blog | Techlavate Solutions">
    <meta property="og:description" content="Expert insights on Microsoft Dynamics 365, Power Platform, and Business Intelligence.">
    <meta property="og:image" content="{{ url('/assets/img/logo/fav-logo1.png') }}">
    <meta property="og:url" content="{{ url('/blog') }}">
    <meta property="og:type" content="website">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="/assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/plugins/mobile.css">
    <link rel="stylesheet" href="/assets/css/plugins/owlcarousel.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/sidebar.css">
    <link rel="stylesheet" href="/assets/css/plugins/slick-slider.css">
    <link rel="stylesheet" href="/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/assets/css/main.css">

    <!-- JavaScript -->
    <script src="/assets/js/plugins/jquery-3-6-0.min.js"></script>
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
    <div class="hero1-section-area" style="background-image: url(/assets/img/bg/header-bg1.png);">
        <img src="/assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="header-main-content heading1 text-center">
                        <h5>
                            <img src="/assets/img/logo/logo1.png" alt="" style="width: 30px; height: auto;">
                            Insights & Updates
                        </h5>
                        <h1 class="text-anime-style-3">Latest News & Articles</h1>
                        <p data-aos="fade-up" data-aos-duration="1000">
                            Explore expert insights, industry trends, and the latest updates from Techlavate Solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <!--===== SEARCH & FILTER STARTS =======-->
    <div class="search-filter-area" style="background: #f9fafb; padding: 40px 0; border-bottom: 1px solid #e5e7eb;">
        <div class="container">
            <form method="GET" action="{{ route('blog.index') }}" class="row g-3 align-items-end">
                <div class="col-lg-5 col-md-6">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 8px;">Search Articles</label>
                    <div style="position: relative;">
                        <i class="fa-solid fa-search" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #9ca3af;"></i>
                        <input type="text" name="search" placeholder="Search by title or content..." value="{{ request('search') }}" style="width: 100%; padding: 12px 16px 12px 45px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 15px;">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 8px;">Filter by Category</label>
                    <select name="category" style="width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 15px; background: white;">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="d-flex gap-2">
                        <button type="submit" style="padding: 12px 24px; border-radius: 10px; font-weight: 600; font-size: 14px; border: none; background: #4E2FDA; color: white; flex: 1; cursor: pointer;">
                            <i class="fa-solid fa-filter"></i> Apply
                        </button>
                        @if(request('search') || request('category'))
                            <a href="{{ route('blog.index') }}" style="padding: 12px 24px; border-radius: 10px; font-weight: 600; font-size: 14px; border: none; background: #f3f4f6; color: #374151; flex: 1; text-decoration: none; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid fa-rotate-right"></i> Reset
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--===== SEARCH & FILTER ENDS =======-->

    <!--===== BLOG GRID STARTS =======-->
    <div class="service1-section-area sp9">
        <div class="container">
            @if($posts->count() > 0)
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-6 mb-30" data-aos="zoom-in" data-aos-duration="{{ 800 + ($loop->index * 100) }}">
                            <div class="service-boxarea">
                                <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                <div class="space40"></div>
                                
                                @if($post->featured_image)
                                    <div style="width: 100%; height: 200px; overflow: hidden; border-radius: 10px; margin-bottom: 20px;">
                                        <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @endif
                                
                                @if($post->category)
                                    <div style="display: inline-block; background: rgba(78, 47, 218, 0.1); color: #4E2FDA; padding: 6px 14px; border-radius: 50px; font-size: 12px; font-weight: 600; text-transform: uppercase;">{{ $post->category->name }}</div>
                                @endif
                                
                                <div class="space20"></div>
                                <div style="display: flex; gap: 15px; font-size: 13px; color: #6b7280;">
                                    <span><i class="fa-regular fa-calendar" style="color: #4E2FDA; margin-right: 5px;"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                                    <span><i class="fa-regular fa-clock" style="color: #4E2FDA; margin-right: 5px;"></i> {{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min</span>
                                </div>
                                <div class="space20"></div>
                                <p>{{ $post->excerpt ?: Str::limit(strip_tags($post->body), 120) }}</p>
                                <div class="space30"></div>
                                <a href="{{ route('blog.show', $post->slug) }}" class="learn-more-btn">
                                    Read More <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Simple Pagination --}}
                @if ($posts->hasPages())
                    <div style="display: flex; justify-content: center; margin-top: 50px;">
                        <nav>
                            <ul style="display: inline-flex; gap: 6px; list-style: none; padding: 10px; margin: 0; background: white; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                                @if ($posts->onFirstPage())
                                    <li style="margin: 0;"><span style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; color: #d1d5db; font-size: 20px; cursor: not-allowed;">‹</span></li>
                                @else
                                    <li style="margin: 0;"><a href="{{ $posts->previousPageUrl() }}" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; color: #6b7280; font-size: 20px; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='transparent'">‹</a></li>
                                @endif

                                @foreach(range(1, $posts->lastPage()) as $page)
                                    @if ($page == $posts->currentPage())
                                        <li style="margin: 0;"><span style="display: flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; border-radius: 8px; background: #4E2FDA; color: white; font-size: 14px; font-weight: 600;">{{ $page }}</span></li>
                                    @else
                                        <li style="margin: 0;"><a href="{{ $posts->url($page) }}" style="display: flex; align-items: center; justify-content: center; min-width: 36px; height: 36px; padding: 0 10px; border-radius: 8px; color: #6b7280; font-size: 14px; font-weight: 500; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='transparent'">{{ $page }}</a></li>
                                    @endif
                                @endforeach

                                @if ($posts->hasMorePages())
                                    <li style="margin: 0;"><a href="{{ $posts->nextPageUrl() }}" style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; color: #6b7280; font-size: 20px; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='transparent'">›</a></li>
                                @else
                                    <li style="margin: 0;"><span style="display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; color: #d1d5db; font-size: 20px; cursor: not-allowed;">›</span></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @endif
            @else
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div style="padding: 80px 20px;">
                            <i class="fa-regular fa-newspaper" style="font-size: 80px; color: #d1d5db; margin-bottom: 20px;"></i>
                            <h3 style="font-size: 24px; font-weight: 700; color: #111827; margin-bottom: 10px;">No posts found</h3>
                            <p style="color: #6b7280; font-size: 16px;">Check back later for new updates!</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!--===== BLOG GRID ENDS =======-->

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
