<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Title -->
    <title>{{ $post->meta_title ?: $post->title }} | Techlavate Solutions</title>

    <!-- Meta Description -->
    <meta name="description" content="{{ $post->meta_description ?: Str::limit(strip_tags($post->body), 160) }}">

    <!-- Meta Keywords -->
    <meta name="keywords" content="Microsoft Dynamics 365, Power Platform, {{ $post->category ? $post->category->name : 'Business Solutions' }}, Techlavate Solutions">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/logo/fav-logo1.png" type="image/x-icon">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta property="og:description" content="{{ $post->meta_description ?: Str::limit(strip_tags($post->body), 160) }}">
    <meta property="og:image" content="{{ $post->featured_image ? Storage::url($post->featured_image) : url('/assets/img/logo/fav-logo1.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->meta_title ?: $post->title }}">
    <meta name="twitter:description" content="{{ $post->meta_description ?: Str::limit(strip_tags($post->body), 160) }}">
    <meta name="twitter:image" content="{{ $post->featured_image ? Storage::url($post->featured_image) : url('/assets/img/logo/fav-logo1.png') }}">

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
    <div class="hero1-section-area" style="background-image: url(/assets/img/bg/header-bg1.png); padding: 180px 0 80px;">
        <img src="/assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="header-main-content heading1 text-center">
                        @if($post->category)
                            <h5>
                                <img src="/assets/img/logo/logo1.png" alt="" style="width: 30px; height: auto;">
                                {{ $post->category->name }}
                            </h5>
                        @endif
                        <h1 class="text-anime-style-3">{{ $post->title }}</h1>
                        <div style="display: flex; justify-content: center; gap: 20px; margin-top: 20px; color: rgba(255,255,255,0.9); font-size: 15px;" data-aos="fade-up" data-aos-duration="1000">
                            <span><i class="fa-regular fa-user"></i> {{ $post->author->name }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-calendar"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</span>
                            <span>•</span>
                            <span><i class="fa-regular fa-clock"></i> {{ ceil(str_word_count(strip_tags($post->body)) / 200) }} min read</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== HERO AREA ENDS =======-->

    <!--===== BLOG CONTENT STARTS =======-->
    <div class="about1-section-area sp6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if($post->featured_image)
                        <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 20px 60px rgba(0,0,0,0.1); margin-bottom: 50px;" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" style="width: 100%; height: auto; display: block;">
                        </div>
                    @endif

                    <div class="blog-content-wrapper" data-aos="fade-up" data-aos-duration="1200">
                        <div style="font-size: 18px; line-height: 1.8; color: #374151;">
                            {!! $post->body !!}
                        </div>

                        <!-- Tags & Share -->
                        <div style="margin-top: 60px; padding-top: 40px; border-top: 2px solid #e5e7eb;">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    @if($post->tags->count() > 0)
                                        <div style="display: flex; align-items: center; flex-wrap: wrap; gap: 10px;">
                                            <strong style="color: #111827; font-size: 16px;">Tags:</strong>
                                            @foreach($post->tags as $tag)
                                                <span style="background: #f3f4f6; color: #4b5563; padding: 6px 14px; border-radius: 50px; font-size: 13px; font-weight: 500;">#{{ $tag->name }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div style="display: flex; align-items: center; justify-content: md-end; gap: 10px; flex-wrap: wrap;">
                                        <strong style="color: #111827; font-size: 16px;">Share:</strong>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #1877f2; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $post->title }}" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #000000; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s; font-weight: 700; font-size: 18px;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                                            𝕏
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $post->title }}" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #0077b5; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                                            <i class="fa-brands fa-linkedin-in"></i>
                                        </a>
                                        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}" target="_blank" style="width: 40px; height: 40px; border-radius: 50%; background: #25d366; color: white; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Back to Blog -->
                        <div style="text-align: center; margin-top: 50px;">
                            <a href="{{ route('blog.index') }}" class="header-btn1">
                                <i class="fa-solid fa-arrow-left"></i> Back to Blog
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===== BLOG CONTENT ENDS =======-->

    <!--===== RELATED POSTS STARTS =======-->
    @if($relatedPosts->count() > 0)
        <div class="service1-section-area" style="background: #f9fafb; padding: 80px 0;">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 style="font-size: 36px; font-weight: 700; color: #111827; margin-bottom: 15px;">Related Articles</h2>
                        <p style="font-size: 16px; color: #6b7280;">Explore more insights from the same category</p>
                    </div>
                </div>
                <div class="row">
                    @foreach($relatedPosts as $related)
                        <div class="col-lg-4 col-md-6 mb-30" data-aos="fade-up" data-aos-duration="{{ 800 + ($loop->index * 100) }}">
                            <div class="service-boxarea">
                                <a href="{{ route('blog.show', $related->slug) }}">{{ $related->title }}</a>
                                <div class="space40"></div>
                                
                                @if($related->featured_image)
                                    <div style="width: 100%; height: 200px; overflow: hidden; border-radius: 10px; margin-bottom: 20px;">
                                        <img src="{{ Storage::url($related->featured_image) }}" alt="{{ $related->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @endif
                                
                                @if($related->category)
                                    <div style="display: inline-block; background: rgba(78, 47, 218, 0.1); color: #4E2FDA; padding: 6px 14px; border-radius: 50px; font-size: 12px; font-weight: 600; text-transform: uppercase;">{{ $related->category->name }}</div>
                                @endif
                                
                                <div class="space20"></div>
                                <div style="display: flex; gap: 15px; font-size: 13px; color: #6b7280;">
                                    <span><i class="fa-regular fa-calendar" style="color: #4E2FDA; margin-right: 5px;"></i> {{ $related->published_at ? $related->published_at->format('M d, Y') : $related->created_at->format('M d, Y') }}</span>
                                    <span><i class="fa-regular fa-clock" style="color: #4E2FDA; margin-right: 5px;"></i> {{ ceil(str_word_count(strip_tags($related->body)) / 200) }} min</span>
                                </div>
                                <div class="space20"></div>
                                <p>{{ $related->excerpt ?: Str::limit(strip_tags($related->body), 120) }}</p>
                                <div class="space30"></div>
                                <a href="{{ route('blog.show', $related->slug) }}" class="learn-more-btn">
                                    Read More <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!--===== RELATED POSTS ENDS =======-->

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

    <style>
        .blog-content-wrapper p { margin-bottom: 25px; }
        .blog-content-wrapper h2 { font-size: 32px; font-weight: 700; color: #111827; margin: 40px 0 20px; }
        .blog-content-wrapper h3 { font-size: 26px; font-weight: 700; color: #111827; margin: 35px 0 18px; }
        .blog-content-wrapper ul, .blog-content-wrapper ol { margin-bottom: 25px; padding-left: 20px; }
        .blog-content-wrapper li { margin-bottom: 10px; }
        .blog-content-wrapper blockquote {
            border-left: 5px solid #4E2FDA;
            padding: 20px 30px;
            background: #f9fafb;
            border-radius: 0 10px 10px 0;
            font-style: italic;
            font-size: 20px;
            color: #111827;
            margin: 30px 0;
        }
        .blog-content-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 30px 0;
        }
    </style>

</body>

</html>
