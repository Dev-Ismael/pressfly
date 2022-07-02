<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ get_option('language_direction', 'ltr') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description') )">
    <meta name="keywords" content="@yield('keywords', e(get_option('site_keywords')) )">
    <link rel="canonical" href="{{ url()->current() }}"/>

    <!----- Favicon ----->
    <link href="https://i.ibb.co/xz62MK4/favicon.png" type="image/x-icon" rel="icon">
    <link href="https://i.ibb.co/xz62MK4/favicon.png" type="image/x-icon" rel="shortcut icon">

    @if(get_option('language_direction', 'ltr') === 'rtl')
        <link href="https://cdn.jsdelivr.net/gh/RTLCSS/bootstrap@4.2.1-rtl/dist/css/rtl/bootstrap.min.css"
              rel="stylesheet">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    @endif
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/auth.css?v=' . APP_VERSION) }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom_auth_style.css') }}" rel="stylesheet">

    @stack('header')
</head>
<body>


<div class="purble_background"></div>

<div class="auth">
    <div class="auth-title">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="https://i.ibb.co/fCt12Nx/Image-1.png" alt="Alasyma.com" height="120" style="border-radius: 10px">
        </a>
    </div>

    <div class="auth-content">
        @include('_partials.flash_message')

        @yield('content')
    </div>
</div>

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
