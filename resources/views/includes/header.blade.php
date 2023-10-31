<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Eaglehills | CRM360 </title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="{{ asset('assets/img/favicon180.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/favicon32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicon16.png') }}" sizes="16x16" type="image/png"> -->

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- chosen css -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/chosen_v1.8.7/chosen.min.css') }}"> -->

    <!-- date range picker -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- swiper carousel css -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/swiper-7.3.1/swiper-bundle.min.css') }}"> -->

    <!-- simple lightbox css -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/simplelightbox/simple-lightbox.min.css')}}"> -->

    <!-- app tour css -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/Product-Tour-Plugin-jQuery/lib.css') }}"> -->
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <!-- Footable table master css -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fooTable/css/footable.bootstrap.min.css') }}">
    <!-- style css for this template -->
    <link href="{{ asset('assets/scss/style.css') }}" rel="stylesheet">

    <!-- Theme Custom Styles -->
    <link href="{{ asset('assets/css/theme_custom_style.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled menu-close" data-sidebarstyle="sidebar-pushcontent">
    <!-- sidebar-pushcontent, sidebar-overlay , sidebar-fullscreen  are classes to switch UI here-->
    <!-- page loader -->
    <div class="container-fluid h-100 position-fixed loader-wrap bg-blur">
        <div class="row justify-content-center h-100">
            <div class="col-auto align-self-center text-center px-5 leaf">
                <div class="">
                    <img src="{{ asset('assets/loader-crm-square.png') }}" class="loader-square_top_logo"/>
                </div>
                <div class="logo-square animated mb-4">
                    <div class="icon-logo">
                        <img src="{{ asset('assets/loader-logo-crm.png') }}" alt="" />
                    </div>
                </div>
                <div class="dotslaoder">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <!-- page loader ends -->

    <!-- Header -->
    <header class="header">
        <!-- Fixed navbar -->
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <div class="sidebar-width">
                    <button class="btn btn-link btn-square menu-btn" type="button">
                        <i class="bi bi-list fs-4"></i>
                    </button>
                    <a class="navbar-brand ms-2" href="{{ route('home') }}">
                        <div class="row">
                            <!-- <div class="col-auto"></div> -->
                            <div class="col ps-0 align-self-center d-none d-sm-block">
                            <img style="width: 150px;margin-top: 5px;" src="{{ asset('assets/crm-logo.png') }}" class="mx-100" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
               
                <div class="ms-auto">
                    <div class="row">
                        <div class="col-auto">
                            <div class="dropdown">
                                <a class="dd-arrow-none dropdown-toggle tempdata" id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <figure class="avatar avatar-40 rounded-circle coverimg vm">
                                                <img src="{{ asset('assets/img/user-1.jpg') }}" alt="" id="userphotoonboarding2" />
                                            </figure>
                                        </div>
                                        <div class="col ps-0 align-self-center d-none d-lg-block">
                                            <p class="mb-0">
                                                <span class="text-dark username">{{ Auth::user()->name }}</span><br>
                                                <small class="small">United Arab Emirates</small>
                                            </p>
                                        </div>
                                        <div class="col ps-0 align-self-center d-none d-lg-block">
                                            <i class="bi bi-chevron-down small vm"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end w-300" aria-labelledby="userprofiledd">
                                    <div class="dropdown-info bg-radial-gradient-theme">
                                        <div class="row">
                                            <div class="col-auto">
                                                <figure class="avatar avatar-50 rounded-circle coverimg vm">
                                                    <img src="{{ asset('assets/img/user-1.jpg') }}" alt="" id="userphotoonboarding3" />
                                                </figure>
                                            </div>
                                            <div class="col align-self-center ps-0">
                                                <h6 class="mb-0"><span class="username">{{ Auth::user()->name }}</span></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div><a class="dropdown-item" href="{{ route('profile.edit') }}">My Profile</a></div>
                                    <div>
                                        <a class="dropdown-item" href="">
                                            <div class="row g-0">
                                                <div class="col align-self-center">My Dashboard</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div><a class="dropdown-item" href="">Account Setting</a></div>
                                    <div>
                                    <form method="POST" id="logout_form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
                                        <a class="dropdown-item user_logout" href="">Logout</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ends -->