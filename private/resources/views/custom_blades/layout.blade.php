<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ get_option('language_direction', 'ltr') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', e(get_option('site_meta_title', get_option('site_name'))) )</title>
        <meta name="description" content="@yield('description', e(get_option('site_description')) )">
        <meta name="keywords" content="@yield('keywords', e(get_option('site_keywords')) )">
        <link rel="canonical" href="{{ url()->current() }}"/>

        <link rel="alternate" type="application/rss+xml" title="{{ get_option('site_name') }} {{ __('Feed') }}"
            href="{{ route('feed') }}"/>
        @if(request()->route()->getName() === 'category.show')
            <link href="{{ request()->route()->parameter('category')->feed() }}" rel="alternate" type="application/rss+xml"
                title="{{ __(':category-name Category Feed', ['category-name' => request()->route()->parameter('category')->name]) }}"/>
        @endif
        @if(request()->route()->getName() === 'tag.show')
            <link href="{{ request()->route()->parameter('tag')->feed() }}" rel="alternate" type="application/rss+xml"
                title="{{ __(':tag-name Tag Feed', ['tag-name' => request()->route()->parameter('tag')->name]) }}"/>
        @endif
        @if(request()->route()->getName() === 'author.show')
            <link href="{{ route('author.feed', ['username' => request()->route()->parameter('username')]) }}"
                rel="alternate" type="application/rss+xml"
                title="{{ __(':author Author Feed', ['author' => request()->route()->parameter('username')]) }}"/>
        @endif

        <link href='{{ asset(get_style('favicon', '/favicon.ico')) }}' type='image/x-icon' rel='icon'/>
        <link href='{{ asset(get_style('favicon', '/favicon.ico')) }}' type='image/x-icon' rel='shortcut icon'/>
        
        <!----- Font Awesome ------>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!--- Google Font --->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,,500,600,700" rel="stylesheet">
        <!--- Google Arabic Font --->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
        

        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/open-iconic-bootstrap.min.css") }} ">
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/animate.css") }} ">
        
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/owl.carousel.min.css") }} ">
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/owl.theme.default.min.css") }} ">
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/magnific-popup.css") }} ">

        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/aos.css") }} ">

        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/ionicons.min.css") }} ">

        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/bootstrap-datepicker.css") }} ">
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/jquery.timepicker.css") }} ">

        
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/flaticon.css") }} ">
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/icomoon.css") }} ">
        <link rel="stylesheet" href="{{ asset("assets/custom_assets/css/style.css") }} ">
    </head>
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    @if(get_style('logo_image'))
                        <img src="{{ asset(get_style('logo_image')) }}" alt="{{ get_option('site_name') }}" height="50">
                    @else
                        {{ get_option('site_name') }}
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                        <li class="nav-item active"><a href="{{ url('/our_privacy') }}" class="nav-link">Privacy</a></li>
                        <li class="nav-item active"><a href="{{ url('/our_terms') }}" class="nav-link">Terms</a></li>
                        <li class="nav-item active"><a href="{{ url('/page/write-get-paid') }}" class="nav-link">Payout rates</a></li>
                        <div class="top-menu">
                            {!! menu_display(get_style('top_menu'), [
                            'ul_class' => 'list-inline',
                            'li_class' => 'list-inline-item',
                            'a_class' => '',
                            ]) !!}
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

    




        @yield('content')

    

        <footer class="ftco-footer ftco-bg-dark ftco-section">
            <div class="container">
                <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 bg-primary p-4">
                    <h2 class="ftco-heading-2">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            @if(get_style('logo_image'))
                                <img src="{{ asset(get_style('logo_image')) }}" alt="{{ get_option('site_name') }}" height="80" style="border-radius: 10px">
                            @else
                                {{ get_option('site_name') }}
                            @endif
                        </a>
                    </h2>
                    <p>You don't need to have a degree or have finished a course in order to pursue a writing career online. If you can write, go ahead and start your career with us.</p>
                    <ul class="ftco-footer-social list-unstyled mb-0">

                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        
                    </ul>
                    </div>
                </div>
                <div class="col-md text-center">
                    <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Navigational</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}" class="py-2 d-block">Home</a></li>
                            <li><a href="{{ url('/our_privacy') }}" class="py-2 d-block">Privacy</a></li>
                            <li><a href="{{ url('/our_terms') }}" class="py-2 d-block">Terms</a></li>
                            <li><a href="{{ url('/page/write-get-paid') }}" class="py-2 d-block">Payout rates</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Office</h2>
                        <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="mailto:support@writte.me"><span class="icon icon-envelope"></span><span class="text">support@writte.me</span></a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Copyright &copy;
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This Site is made with <i class="icon-heart" style="color: #f00;"></i> by <a href="https://www.facebook.com/PovamiSoftware" target="_blank">Povami Software</a>
                        
                    </p>
                </div>
                </div>
            </div>
        </footer>
    
  

        <!-- Scroll To Top-->
        <div id="scroll-to-top">
            <i class="fas fa-arrow-circle-up" style="color: #221a4a"></i>
        </div>

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script src="{{ asset("assets/custom_assets/js/jquery.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/jquery-migrate-3.0.1.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/popper.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/bootstrap.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/jquery.easing.1.3.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/jquery.waypoints.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/jquery.stellar.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/owl.carousel.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/jquery.magnific-popup.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/aos.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/jquery.animateNumber.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/bootstrap-datepicker.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/scrollax.min.js")}}" ></script>
        <script src="{{ asset("assets/custom_assets/js/main.js")}}" ></script>
            
    </body>
</html>