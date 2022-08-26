<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Writte.Me</title>
    <meta name="description" content="You don't need to have a degree or have finished a course in order to pursue a writing career online. If you can write , go ahead and start your career with us. This is a perfect opportunity for freelance writers and just about anybody who can write that just don’t have time for a commute to a dead end, part-time job. Or, for anyone for wants to sit in their pajamas and work at home! ">
    <meta name="keywords" content="earn money , write article , earn money online , writte.me , writing management platform , freelancer writing , writing topics , writing a paragraph	 , earn money from writing articles , earn money from writing blogs , earn money from writing uk , earn money from writing work , earn money writing articles online india  , earn money writing articles online uk  ,  earn money writing book reviews  , earn money writing blog posts ,  earn money from home by writing , earn money from content writing , making money from creative writing , earn money in writing , can i make money from writing , can i make money from writing a blog">
    <link rel="canonical" href="{{ url()->current() }}"/>

    
    <!------- FontAwesome  ------->
    <script src="https://kit.fontawesome.com/bc98e6aa51.js" crossorigin="anonymous"></script>


    <!-----FavIcon----->
    <link href='https://i.ibb.co/BztsWqJ/favicon.png' type='image/x-icon' rel='icon'/>
    <link href='https://i.ibb.co/BztsWqJ/favicon.png' type='image/x-icon' rel='shortcut icon'/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.10/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.0.0-rc.4/dist/css/adminlte.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/claviska/jquery-minicolors@2.3.4/jquery.minicolors.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/app.css?v=' . APP_VERSION) }}">

    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/custom_admin_style.css') }}">


    @stack('header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <!------ session links ------->
            @if ( Auth::user()->role == "admin" )
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('member.dashboard') }}">{{ __('Member Area') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Administration Area') }}</a>
                </li>
            @endif
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-user-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Logout') }}
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        
        <div class="text-center text-white mt-2">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="https://i.ibb.co/SwxWHNN/logo.png" alt="Writte.Me" height="80" >
            </a>
        </div>
        

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item has-treeview">
                        <a class="nav-link" href="#">
                            <i class="nav-icon far fa-file-alt"></i>
                            <p>
                                <?= __(' Articles') ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- <li class="nav-item"><a class="nav-link" href="{{ route('moderator.articles.index') }}">
                                    <i class="nav-icon fa fa-angle-right"></i>
                                    <p>{{ __('List') }}</p></a></li> --}}
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('moderator.articles.indexNewPending') }}">
                                    <i class="nav-icon fa fa-angle-right"></i>
                                    <p>{{ __('New Pending') }}</p></a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('moderator.articles.indexUpdatePending') }}">
                                    <i class="nav-icon fa fa-angle-right"></i>
                                    <p><?= __('Edit Pending') ?></p></a></li>
                            <li class="nav-item"><a class="nav-link"
                                                    href="{{ route('moderator.articles.indexUpdateNeedImprovement') }}">
                                    <i class="nav-icon fa fa-angle-right"></i>
                                    <p><?= __('Edit Improvement Pending') ?></p></a></li>
                            <li class="nav-item"><a class="nav-link"
                                        href="{{ route('moderator.articles.indexNeedImprovement') }}">
                            <i class="nav-icon fa fa-angle-right"></i>
                            <p><?= __('Need Improvements') ?></p></a></li>
                        </ul>
                    </li>

                   

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="mb-2 text-dark">
                    <i class="fas fa-user-edit" style="color: #140850;"></i>
                    Moderator
                    {{ ucfirst( Auth::user()->username ) }}
                </h1>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @if (version_compare(PHP_VERSION, '7.2.0') < 0)
                    <div class="alert alert-danger" role="alert">
                        <?= __("Writte.Me will work only on PHP <b>7.2.0</b> or higher starting from the next update so please ask your hosting company to upgrade the PHP version as soon as possible.") ?>
                    </div>
                @endif

                @include('_partials.flash_message')

                @yield('content')

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

        <!-- Default to the left -->
        <strong style="color: #000; font-weight:400">
            All Right Reversed &copy; {{ now()->format("Y") }} | This Site is made with 
            <i class="fas fa-heart" style="color: #f00;"></i> 
            <a href="https://www.facebook.com/PovamiSoftware" target="_blank">Povami Software</a> .
        </strong>
    </footer>




    <!-- Scroll To Top-->
    <div id="scroll-to-top">
        <i class="fas fa-arrow-circle-up" style="color: #6a6298"></i>
    </div>

    <!-- fixed icons-->
    <div id="fixed-icons">
        <a target="_blank" href="https://www.facebook.com/Writte-Me-104654531613450">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUed9WLGfVYS4GElOhDWNIP9heqM7BEnUnRA&usqp=CAU" alt="face-icon">
        </a>
    </div>




</div>

<!-- Bootstrap and necessary plugins-->
<script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-ui-dist@1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.10/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.0-rc.4/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/claviska/jquery-minicolors@2.3.4/jquery.minicolors.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/rguliev/conditionize2.js@2.0.0/jquery.conditionize2.min.js"></script>
<script src="{{ asset('assets/dashboard/js/app.js?v=' . APP_VERSION) }}"></script>

@stack('footer')

</body>
</html>
