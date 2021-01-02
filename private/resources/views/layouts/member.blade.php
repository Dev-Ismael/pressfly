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

    <link href='{{ asset(get_style('favicon', '/favicon.ico')) }}' type='image/x-icon' rel='icon'/>
    <link href='{{ asset(get_style('favicon', '/favicon.ico')) }}' type='image/x-icon' rel='shortcut icon'/>

    @if(get_option('language_direction', 'ltr') === 'rtl')
        <link href="https://cdn.jsdelivr.net/gh/RTLCSS/bootstrap@4.2.1-rtl/dist/css/rtl/bootstrap.min.css"
              rel="stylesheet">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/selection-sharer@1.1.0/dist/selection-sharer.css">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css?v=' . APP_VERSION) }}" rel="stylesheet">
    @if(get_option('language_direction', 'ltr') === 'rtl')
        <link href="{{ asset('assets/css/rtl.css?v=' . APP_VERSION) }}" rel="stylesheet">
    @endif

    <!---- Add Custom Style ----->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custom_member_style.css') }}">


    @include('_partials.header_css')

    

    @stack('header')
</head>
<body
    class="{{ str_replace('.', '-', request()->route()->getAction()['as']) }} {{ get_option('language_direction', 'ltr') }} @stack('body_class')">

@include('_partials.flash_message_toast')



<div class="header">
    <div class="container">
        <div class="wrap-inner">
            <div class="logo">
                <a href="{{ url('/') }}">
                    @if(get_style('logo_image'))
                        <img src="{{ asset(get_style('logo_image')) }}" alt="{{ get_option('site_name') }}">
                    @else
                        {{ get_option('site_name') }}
                    @endif
                </a>
            </div>
            <div class="top-banner">
                <?= applyShortCodes('[ads id="' . get_style('header_ad') . '"]') ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-3">
            @if(auth()->check() && auth()->user()->role === 'admin')
                <button type="button" class="btn btn-primary btn-block mb-3"
                        onclick="window.location.href='{{ route('admin.dashboard') }}'">
                    {{ __('Administration Area') }}
                </button>
            @endif

            <div class="member-menu list-group">
                <a href="{{ route('member.dashboard') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-tachometer-alt"></i> {{ __('Dashboard') }}
                </a>
                <a href="{{ route('member.feed') }}" class="list-group-item list-group-item-action">
                    <i class="far fa-newspaper"></i> {{ __('Feed') }}
                </a>
                <a href="{{ route('member.articles.index') }}" class="list-group-item list-group-item-action">
                    <i class="far fa-file-alt"></i> {{ __('My Articles') }}
                </a>
                <a href="{{ route('member.articles.create') }}" class="list-group-item list-group-item-action">
                    <i class="far fa-plus-square"></i> {{ __('Add Article') }}
                </a>
                <a href="{{ route('member.withdraws.index') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-hand-holding-usd"></i> {{ __('Withdraw') }}
                </a>
                @if((bool)get_option('enable_referrals', 1))
                    <a href="{{ route('member.referrals') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-exchange-alt"></i> {{ __('Referrals') }}
                    </a>
                @endif
                <a href="{{ route('member.settings') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-cogs"></i> {{ __('Settings') }}
                </a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>
            </div>
        </div>
        <div class="col-sm-9">
            @include('_partials.flash_message')
            @yield('content')
        </div>
    </div>
</main>

<footer class="footer">
    
    <div class="container">
        <div class="row">
            <div class="col text-left">
                <strong style="color: #fff; font-weight:400">
                    All Right Reversed &copy; {{ now()->format("Y") }} | This Site is made with 
                    <i class="fas fa-heart" style="color: #f00;"></i> 
                    <a href="https://www.facebook.com/PovamiSoftware" target="_blank">Povami Software</a> .
                </strong>
            </div>
            <div class="col text-right">
                <div class="footer-menu">
                    {!! menu_display(get_style('footer_menu'), [
                    'ul_class' => 'list-inline mb-0',
                    'li_class' => 'list-inline-item',
                    'a_class' => '',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>

</footer>

@include('_partials.js_vars')

<script data-cfasync="false" src="{{ asset('assets/js/ads.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/selection-sharer@1.1.0/dist/selection-sharer.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ppowalowski/stickUp2@2.3.2/build/js/stickUp.min.js"></script>

<script src="{{ asset('assets/js/app.js?v=' . APP_VERSION) }}"></script>


@stack('footer')

</body>
</html>
