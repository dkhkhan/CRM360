<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>AdminUX - Admin, Dashboard, Web Application HTML template, UI kit, UI templates</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/favicon180.png" sizes="180x180">
    <link rel="icon" href="assets/img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="assets/img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- chosen css -->
    <link rel="stylesheet" href="assets/vendor/chosen_v1.8.7/chosen.min.css">

    <!-- date range picker -->
    <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="assets/vendor/swiper-7.3.1/swiper-bundle.min.css">

    <!-- simple lightbox css -->
    <link rel="stylesheet" href="assets/vendor/simplelightbox/simple-lightbox.min.css">

    <!-- app tour css -->
    <link rel="stylesheet" href="assets/vendor/Product-Tour-Plugin-jQuery/lib.css">

    <!-- style css for this template -->
    <link href="assets/scss/style.css" rel="stylesheet">
    <style rel="stylesheet" type="text/css">
        .card-pluse-animation{
            animation: mypulse !important;
            animation-duration: 2s !important;
            animation-delay: 2s !important;
            animation-iteration-count: infinite !important;
        }
        .my-red-card{
            background-color:rgba(var(--adminux-theme-rgb), 0.9) !important;
            animation : mycolor;
            animation-duration : 2s;
            animation-delay : 2s;
            animation-iteration-count : infinite;  
        } 
        .my-smallchart{
            height: 25px !important;
            width : 50px !important;
        }
        .my-text-animation{
            animation: myTextpulse !important;
            animation-duration: 2s !important;
            animation-delay: 2s !important;
            animation-iteration-count: infinite !important;
        }
        .my-title-text-animation{
            animation: myTitleTextpulse !important;
            animation-duration: 2s !important;
            animation-delay: 2s !important;
            animation-iteration-count: infinite !important;
        }
        @keyframes mypulse{
            0% {
                transform: scale3d(1,1,1);
            }
            50% {
                transform: scale3d(1.05,1.05,1.05);
            }
            100% {
                transform: scale3d(1,1,1);

            }
        }
        @keyframes myTextpulse{
            0% {
                opacity: 1;
            }
            50% {
                opacity : 0.5;
            }
            100% {
                opacity : 1;

            }
        }
        @keyframes myTitleTextpulse{
            0% {
                opacity: 0.5;
            }
            50% {
                opacity : 1;
            }
            100% {
                opacity : 0.5;

            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100 sidebar-pushcontent sidebar-filled" data-sidebarstyle="sidebar-pushcontent">
    <!-- sidebar-pushcontent, sidebar-overlay , sidebar-fullscreen  are classes to switch UI here-->

    <!-- page loader -->
    <div class="container-fluid h-100 position-fixed loader-wrap bg-blur">
        <div class="row justify-content-center h-100">
            <div class="col-auto align-self-center text-center px-5 leaf">
                <h2 class="mb-1">Admin<b class="fw-bold">UX</b></h2>
                <h6 class="mb-4 text-secondary">Admin Dashboard UIUX</h6>
                <div class="logo-square animated mb-4">
                    <div class="icon-logo">
                        <img src="assets/img/logo-icon.png" alt="" />
                    </div>
                </div>
                <p class="text-secondary small">Petal of flower being ready to <span class="text-gradient">blossom</span></p>

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
                    <a class="navbar-brand ms-2" href="home.html">
                        <div class="row">
                            <div class="col-auto"><span class="logo-icon"><img src="assets/img/logo-icon.png" class="mx-100" alt="" /></span></div>
                            <div class="col ps-0 align-self-center d-none d-sm-block">
                                <h5 class="fw-normal text-dark mb-0">AdminUX</h5>
                                <p class="small text-secondary">Admin App UI</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="search-header d-none d-xl-block">
                    <div class="input-group input-group-md w-300">
                        <span class="input-group-text text-theme"><i class="bi bi-search"></i></span>
                        <input class="form-control pe-0" type="search" placeholder="Type something here..." id="searchglobal">
                        <div class="dropdown input-group-text">
                            <button class="btn btn-link dd-arrow-none dropdown-toggle" type="button" id="searchfilter" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-sliders"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end dropdown-dontclose mt-2 w-300" aria-labelledby="searchfilter">
                                <ul class="nav nav-adminux" id="searchtab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="searchall-tab" data-bs-toggle="tab" data-bs-target="#searchall" type="button" role="tab" aria-controls="searchall" aria-selected="true">All</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="searchorders-tab" data-bs-toggle="tab" data-bs-target="#searchorders" type="button" role="tab" aria-controls="searchorders" aria-selected="false">Orders</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="searchcontacts-tab" data-bs-toggle="tab" data-bs-target="#searchcontacts" type="button" role="tab" aria-controls="searchcontacts" aria-selected="false">Contacts</button>
                                    </li>
                                </ul>
                                <div class="tab-content py-3" id="searchtabContent">
                                    <div class="tab-pane fade show active" id="searchall" role="tabpanel" aria-labelledby="searchall-tab">
                                        <div class="dropdown-item mb-3">
                                            <div class="input-group input-group-md rounded">
                                                <span class="input-group-text text-theme"><i class="bi bi-code-square"></i></span>
                                                <select class="form-control simplechosen">
                                                    <option>Successful Order</option>
                                                    <option>Full-filled Order</option>
                                                    <option>Rejected Order</option>
                                                    <option>Delivery Staff</option>
                                                    <option>PM Employees</option>
                                                </select>
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush bg-none">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Search apps</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch1">
                                                            <label class="form-check-label" for="searchswitch1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Include Pages</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch2" checked>
                                                            <label class="form-check-label" for="searchswitch2"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Internet resource</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch3" checked>
                                                            <label class="form-check-label" for="searchswitch3"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">News and Blogs</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch4">
                                                            <label class="form-check-label" for="searchswitch4"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="searchorders" role="tabpanel" aria-labelledby="searchorders-tab">
                                        <div class="dropdown-item mb-3">
                                            <div class="input-group input-group-md rounded">
                                                <span class="input-group-text text-theme"><i class="bi bi-box"></i></span>
                                                <select class="form-control" id="searchfilterlist" multiple>
                                                    <option value="San Francisco">San Francisco</option>
                                                    <option value="New York">New York</option>
                                                    <option value="Seattle" selected>Seattle</option>
                                                    <option value="Los Angeles">Los Angeles</option>
                                                    <option value="Chicago">Chicago</option>
                                                    <option value="India">India</option>
                                                    <option value="Sydney">Sydney</option>
                                                    <option value="London">London</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Los Angeles">Los Angeles</option>
                                                    <option value="Chicago">Chicago</option>
                                                    <option value="India">India</option>
                                                </select>
                                            </div>
                                            <div class="invalid-feedback">You have already selected maximum option allowed.(This is Configurable)</div>
                                        </div>
                                        <ul class="list-group list-group-flush bg-none">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Show order ID</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch5">
                                                            <label class="form-check-label" for="searchswitch5"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">International Order</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch6" checked>
                                                            <label class="form-check-label" for="searchswitch6"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Taxable Product</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch7" checked>
                                                            <label class="form-check-label" for="searchswitch7"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Published Product</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch8">
                                                            <label class="form-check-label" for="searchswitch8"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="searchcontacts" role="tabpanel" aria-labelledby="searchcontacts-tab">
                                        <div class="dropdown-item mb-3">
                                            <div class="input-group input-group-md rounded">
                                                <span class="input-group-text text-theme"><i class="bi bi-person-lines-fill"></i></span>
                                                <input class="form-control" type="search" placeholder="Contact Include">
                                            </div>
                                        </div>
                                        <ul class="list-group list-group-flush bg-none">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Have email ID</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch9">
                                                            <label class="form-check-label" for="searchswitch9"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Have phone number</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch10" checked>
                                                            <label class="form-check-label" for="searchswitch10"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Photo available</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch11" checked>
                                                            <label class="form-check-label" for="searchswitch11"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col">Referral</div>
                                                    <div class="col-auto">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="searchswitch12">
                                                            <label class="form-check-label" for="searchswitch12"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="row">
                                        <div class="col"><button class="btn btn-outline-secondary border">Reset</button></div>
                                        <div class="col-auto">
                                            <button class="btn btn-theme">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="input-group-text d-flex d-xl-none" id="searchclose"><i class="bi bi-x-lg vm"></i></span>
                    </div>
                    <div class="dropdown-menu dropdown-dontclose mt-2 mw-600 w-auto" id="searchresultglobal">
                        <ul class="nav nav-adminux" id="searchtab1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="searchall1-tab" data-bs-toggle="tab" data-bs-target="#searchall1" type="button" role="tab" aria-controls="searchall1" aria-selected="true">All <span class="badge rounded-pill bg-success ml-2 vm">12</span></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="searchorders1-tab" data-bs-toggle="tab" data-bs-target="#searchorders1" type="button" role="tab" aria-controls="searchorders1" aria-selected="false">Orders <span class="badge rounded-pill bg-primary ml-2 vm">8</span></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="searchcontacts1-tab" data-bs-toggle="tab" data-bs-target="#searchcontacts1" type="button" role="tab" aria-controls="searchcontacts1" aria-selected="false">Contacts <span class="badge rounded-pill bg-warning ml-2 vm">4</span></button>
                            </li>
                        </ul>
                        <div class="tab-content py-3" id="searchtabContent1">
                            <div class="tab-pane fade show active mh-500 overflow-y-auto" id="searchall1" role="tabpanel" aria-labelledby="searchall1-tab">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col align-self-center">
                                            <h6>Application</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-outline-secondary border">View all</a>
                                        </div>
                                    </div>
                                    <div class="row g-0 text-center mb-3">
                                        <div class="col-4 col-sm-2 col-md-2">
                                            <a class="dropdown-item square-item" href="app-finance.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-bank fs-4"></i>
                                                </div>
                                                <p class="mb-0">Finance</p>
                                                <p class="fs-12 text-muted">Accounting</p>
                                            </a>
                                        </div>
                                        <div class="col-4 col-sm-2 col-md-2">
                                            <a class="dropdown-item square-item" href="app-network.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-globe fs-4"></i>
                                                </div>
                                                <p class="mb-0">Network</p>
                                                <p class="fs-12 text-muted">Stabilize</p>
                                            </a>
                                        </div>
                                        <div class="col-4 col-sm-2 col-md-2">
                                            <a class="dropdown-item square-item" href="app-ecommerce.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-box fs-4"></i>
                                                </div>
                                                <p class="mb-0">Inventory</p>
                                                <p class="fs-12 text-muted">Assuring</p>
                                            </a>
                                        </div>
                                        <div class="col-4 col-sm-2 col-md-2">
                                            <a class="dropdown-item square-item" href="app-project.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-folder fs-4"></i>
                                                </div>
                                                <p class="mb-0">Project</p>
                                                <p class="fs-12 text-muted">Management</p>
                                            </a>
                                        </div>
                                        <div class="col-4 col-sm-2 col-md-2">
                                            <a class="dropdown-item square-item" href="app-social.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-people fs-4"></i>
                                                </div>
                                                <p class="mb-0">Social</p>
                                                <p class="fs-12 text-muted">Tracking</p>
                                            </a>
                                        </div>
                                        <div class="col-4 col-sm-2 col-md-2">
                                            <a class="dropdown-item square-item" href="app-learning.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-journal-bookmark fs-4"></i>
                                                </div>
                                                <p class="mb-0">Learning</p>
                                                <p class="fs-12 text-muted">Make-easy</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col align-self-center">
                                            <h6>Orders Placed</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-outline-secondary border">View all</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-bag fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0021 by John Merchant</a>
                                                    <p class="text-truncate text-secondary small">2 items, $250.00, 09 December 2021</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-basket fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0026 by Will Smith</a>
                                                    <p class="text-truncate text-secondary small">4 items, $530.00, 18 December 2021</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-cart fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0030 by Switty David</a>
                                                    <p class="text-truncate text-secondary small">1 items, $50.00, 20 December 2021</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-cart4 fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0041 by Mr.Walk Wolf</a>
                                                    <p class="text-truncate text-secondary small">3 items, $130.00, 16 December 2021</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col align-self-center">
                                            <h6>Contacts</h6>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-outline-secondary border">View all</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-2.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">Ms. Switty David</a>
                                                    <p class="text-truncate text-secondary small">US, UK Recruiter</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-3.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">Dyna Roosevelt</a>
                                                    <p class="text-truncate text-secondary small">Marketing Head at Linmongas</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-4.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">Mr. Freddy Johnson</a>
                                                    <p class="text-truncate text-secondary small">Project Manager</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-1.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">The Maxartkiller</a>
                                                    <p class="text-truncate text-secondary small">CEO Maxartkiller</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="searchorders1" role="tabpanel" aria-labelledby="searchorders1-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-bag fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0021 by John Merchant</a>
                                                    <p class="text-truncate text-secondary small">2 items, $250.00, 09 December 2021</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-basket fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0026 by Will Smith</a>
                                                    <p class="text-truncate text-secondary small">4 items, $530.00, 18 December 2021</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-cart fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0030 by Switty David</a>
                                                    <p class="text-truncate text-secondary small">1 items, $50.00, 20 December 2021</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme">
                                                        <i class="bi bi-cart4 fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">#EDR0041 by Mr.Walk Wolf</a>
                                                    <p class="text-truncate text-secondary small">3 items, $130.00, 16 December 2021</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="searchcontacts1" role="tabpanel" aria-labelledby="searchcontacts1-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-2.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">Ms. Switty David</a>
                                                    <p class="text-truncate text-secondary small">US, UK Recruiter</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-3.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">Dyna Roosevelt</a>
                                                    <p class="text-truncate text-secondary small">Marketing Head at Linmongas</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="row mb-3">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-4.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">Mr. Freddy Johnson</a>
                                                    <p class="text-truncate text-secondary small">Project Manager</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-50 rounded bg-light-theme coverimg">
                                                        <img src="assets/img/user-1.jpg" alt="" />
                                                    </div>
                                                </div>
                                                <div class="col-8 ps-0 align-self-center">
                                                    <a href="#" class="text-truncate">The Maxartkiller</a>
                                                    <p class="text-truncate text-secondary small">CEO Maxartkiller</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-expand-xl d-none d-xxxl-block ms-3">
                    <div class="collapse navbar-collapse" id="mainheaderNavbar">
                        <ul class="nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dd-arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Pages</a>
                                <div class="dropdown-menu">
                                    <div><a class="dropdown-item" href="profile.html">Profile</a></div>
                                    <div class="dropdown open-right dropdown-dontclose">
                                        <a class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                            Company <span class="arrow bi bi-chevron-right"></span>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div><a class="dropdown-item active" href="company-profile.html">Company Profile</a></div>
                                            <div><a class="dropdown-item" href="company-branding.html">Branding</a></div>
                                            <div><a class="dropdown-item" href="company-userroles.html">User Roles </a></div>
                                            <div><a class="dropdown-item" href="company-resources.html">Resources</a></div>
                                        </div>
                                    </div>
                                    <div><a class="dropdown-item" href="management.html">Management</a></div>
                                    <div><a class="dropdown-item" href="career.html">Career</a></div>
                                    <div><a class="dropdown-item" href="forum.html">Forum</a></div>
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <div><a class="dropdown-item" href="help-center.html">Help Center</a></div>
                                    <div><a class="dropdown-item" href="onboarding.html">Onboarding</a></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dd-arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Components</a>
                                <div class="dropdown-menu w-500">
                                    <div class="dropdown-title mb-3">
                                        <p>Creative & Unique Components</p>
                                        <p class="text-secondary small">Our components are flexible to adopt. Use these to create new page, make UI template design unique and consistent.</p>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                            <div><a class="dropdown-item" href="component-cards.html"><i class="bi bi-card-heading me-2"></i>Cards</a></div>
                                            <div><a class="dropdown-item" href="component-charts.html"><i class="bi bi-bar-chart me-2"></i>Charts</a></div>
                                            <div><a class="dropdown-item" href="component-events.html"><i class="bi bi-calendar-event me-2"></i>Events</a></div>
                                            <div><a class="dropdown-item" href="component-files.html"><i class="bi bi-folder me-2"></i>Files</a></div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                            <div><a class="dropdown-item" href="component-summary.html"><i class="bi bi-card-text me-2"></i>Summary</a></div>
                                            <div><a class="dropdown-item" href="component-news.html"><i class="bi bi-newspaper me-2"></i>News</a></div>
                                            <div><a class="dropdown-item" href="component-rating.html"><i class="bi bi-star me-2"></i>Rating</a></div>
                                            <div><a class="dropdown-item" href="component-users.html"><i class="bi bi-person-circle me-2"></i>Users</a></div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                            <div><a class="dropdown-item" href="component-progress.html"><i class="bi bi-clock-history me-2"></i>Progress</a></div>
                                            <div><a class="dropdown-item" href="component-pricing.html"><i class="bi bi-tag me-2"></i>Pricing</a></div>
                                            <div><a class="dropdown-item" href="component-media.html"><i class="bi bi-film me-2"></i>Media</a></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dd-arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Supportive</a>
                                <div class="dropdown-menu w-500">
                                    <div class="dropdown-title mb-3">
                                        <p>Supportive & Helpful Pages</p>
                                        <p class="text-secondary small">Do not make your user lost somewhere else from where they can't come back. Make important journey flawless.</p>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                            <div><a class="dropdown-item" href="supportive-signin.html"><i class="bi bi-person me-2 text-theme"></i>Sign in</a></div>
                                            <div><a class="dropdown-item" href="supportive-signup.html"><i class="bi bi-person-plus me-2 text-theme"></i>Sign up</a></div>
                                            <div><a class="dropdown-item" href="supportive-password.html"><i class="bi bi-key me-2 text-theme"></i>Password</a></div>
                                            <div><a class="dropdown-item" href="supportive-verify.html"><i class="bi bi-person-check me-2 text-theme"></i>Verify</a></div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                            <div><a class="dropdown-item" href="supportive-maintenance.html"><i class="bi bi-gear me-2"></i>Maintenance</a></div>
                                            <div><a class="dropdown-item" href="supportive-comingsoon.html"><i class="bi bi-alarm me-2"></i>Coming Soon</a></div>
                                            <div><a class="dropdown-item" href="supportive-error.html"><i class="bi bi-bug me-2"></i>Error</a></div>
                                            <div><a class="dropdown-item" href="supportive-onboarding.html"><i class="bi bi-emoji-smile me-2"></i>Onboarding</a></div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                            <div><a class="dropdown-item" href="supportive-wizard.html"><i class="bi bi-list-nested me-2"></i>Wizard</a></div>
                                            <div><a class="dropdown-item" href="supportive-search.html"><i class="bi bi-search me-2"></i>Search</a></div>
                                            <div><a class="dropdown-item" href="supportive-contact.html"><i class="bi bi-envelope me-2"></i>Contact</a></div>
                                            <div><a class="dropdown-item" href="supportive-timeline.html"><i class="bi bi-calendar-week me-2"></i>Timeline</a></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ms-auto">
                    <div class="row">
                        <div class="col-auto align-self-center d-none d-xxxl-block">
                            <div class="dropdown">
                                <a class="dd-arrow-none dropdown-toggle tempdata" id="selectCity" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                    <img src="assets/img/cloud-sun.png" alt="" class="vm me-2 tempimage" id="tempimage" />
                                    <span class="fw-bold text-dark" id="temperature">46</span><span class="text-uppercase small"> <sup>0</sup>C</span>
                                    <span class="fw-normal d-none" id="city">New York</span> <i class="bi bi-pencil small ms-1 vm"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="selectCity" id="citychange">
                                    <li><a class="dropdown-item" data-value="New York">New York</a></li>
                                    <li><a class="dropdown-item" data-value="London">London</a></li>
                                    <li><a class="dropdown-item" data-value="Qatar">Qatar</a></li>
                                    <li><a class="dropdown-item" data-value="Delhi">Delhi</a></li>
                                    <li><a class="dropdown-item" data-value="Sydney">Sydney</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-auto align-self-center px-0 d-none d-xxxl-block">
                            <i class="bi bi-three-dots-vertical opacity-3 text-secondary"></i>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-square btn-link search-btn d-inline-block d-xl-none " id="searchtoggle">
                                <i class="bi bi-search"></i>
                            </button>
                            <div class="dropdown d-none d-lg-inline-block">
                                <button type="button" class="btn btn-link text-center" id="language" data-bs-toggle="dropdown" aria-expanded="false"><small class="vm">EN</small> <i class="bi bi-translate"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item active" data-value="EN">EN - English</a></li>
                                    <li><a class="dropdown-item" data-value="FR">FR - French</a></li>
                                    <li><a class="dropdown-item" data-value="CH">CH - Chinese</a></li>
                                    <li><a class="dropdown-item" data-value="HI">HI - Hindi</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-square btn-link text-center d-none d-sm-inline-block" id="addtohome" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Install PWA"><i class="bi bi-cloud-download"></i></button>
                            <button type="button" class="btn btn-square btn-link text-center d-none d-lg-inline-block" id="gofullscreen" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Fullscreen"><i class="bi bi-fullscreen"></i></button>
                            <div class="d-inline-block dropdown">
                                <a class="btn btn-square btn-link text-center dd-arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="bi bi-grid"></i></a>
                                <div class="dropdown-menu dropdown-menu-center w-300">
                                    <div class="dropdown-info text-center bg-theme bg-radial-gradient-theme">
                                        <h6 class="mb-0">Applications</h6>
                                        <p class="text-muted small">Make your app innovative</p>
                                    </div>
                                    <div class="row g-0 text-center mb-3">
                                        <div class="col-4">
                                            <a class="dropdown-item square-item" href="app-finance.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-bank fs-4"></i>
                                                </div>
                                                <p class="mb-0">Finance</p>
                                                <p class="fs-12 text-muted">Accounting</p>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="dropdown-item square-item" href="app-network.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-globe fs-4"></i>
                                                </div>
                                                <p class="mb-0">Network</p>
                                                <p class="fs-12 text-muted">Stabilize</p>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="dropdown-item square-item" href="app-ecommerce.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-box fs-4"></i>
                                                </div>
                                                <p class="mb-0">Inventory</p>
                                                <p class="fs-12 text-muted">Assuring</p>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="dropdown-item square-item" href="app-project.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-folder fs-4"></i>
                                                </div>
                                                <p class="mb-0">Project</p>
                                                <p class="fs-12 text-muted">Management</p>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="dropdown-item square-item" href="app-social.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-people fs-4"></i>
                                                </div>
                                                <p class="mb-0">Social</p>
                                                <p class="fs-12 text-muted">Tracking</p>
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a class="dropdown-item square-item" href="app-learning.html">
                                                <div class="avatar avatar-40 rounded mb-2">
                                                    <i class="bi bi-journal-bookmark fs-4"></i>
                                                </div>
                                                <p class="mb-0">Learning</p>
                                                <p class="fs-12 text-muted">Make-easy</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center"><a class="btn btn-link text-center" href="#">View all <i class="bi bi-arrow-right"></i></a></div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-square btn-link text-center d-none d-sm-inline-block" id="showChat" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat & Support">
                                <span class="bi bi-chat-right-dots position-relative">
                                    <span class="badge position-absolute top-0 start-100 translate-middle bg-theme textw-white rounded">
                                        <span class="fs-10">9+</span> <span class="visually-hidden">New alerts</span>
                                    </span>
                                </span>
                            </button>
                            <button type="button" class="btn btn-square btn-link text-center" id="showNotification" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Notifications">
                                <span class="bi bi-bell position-relative">
                                    <span class="position-absolute top-0 start-100 p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </span>
                            </button>
                        </div>
                        <div class="col-auto align-self-center px-0  d-none d-xxxl-block">
                            <i class="bi bi-three-dots-vertical opacity-3 text-secondary"></i>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown">
                                <a class="dd-arrow-none dropdown-toggle tempdata" id="userprofiledd" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <figure class="avatar avatar-40 rounded-circle coverimg vm">
                                                <img src="assets/img/user-1.jpg" alt="" id="userphotoonboarding2" />
                                            </figure>
                                        </div>
                                        <div class="col ps-0 align-self-center d-none d-lg-block">
                                            <p class="mb-0">
                                                <span class="text-dark username">Maxartkiller</span><br>
                                                <small class="small">United States</small>
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
                                                    <img src="assets/img/user-1.jpg" alt="" id="userphotoonboarding3" />
                                                </figure>
                                            </div>
                                            <div class="col align-self-center ps-0">
                                                <h6 class="mb-0"><span class="username">Maxartkiller</span></h6>
                                                <p class="text-muted small">Balance: $100.00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div><a class="dropdown-item" href="profile.html">My Profile</a></div>
                                    <div>
                                        <a class="dropdown-item" href="index.html">
                                            <div class="row g-0">
                                                <div class="col align-self-center">My Dashboard</div>
                                                <div class="col-auto">
                                                    <figure class="avatar avatar-20 coverimg rounded-circle">
                                                        <img src="assets/img/user-2.jpg" alt="" />
                                                    </figure>
                                                    <figure class="avatar avatar-20 coverimg rounded-circle">
                                                        <img src="assets/img/user-3.jpg" alt="" />
                                                    </figure>
                                                    <figure class="avatar avatar-20 coverimg rounded-circle">
                                                        <img src="assets/img/user-4.jpg" alt="" />
                                                    </figure>
                                                    <div class="avatar avatar-20 bg-theme rounded-circle">
                                                        <small class="fs-10 vm">9+</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown open-left dropdown-dontclose">
                                        <a class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                            <div class="row">
                                                <div class="col">Subscription</div>
                                                <div class="col-auto pe-0">
                                                    <p class="small text-success">Upgrade</p>
                                                </div>
                                                <div class="col-auto ps-0"><span class="arrow bi bi-chevron-right"></span></div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div><a class="dropdown-item" href="subscription.html">Plan</a></div>
                                            <div><a class="dropdown-item" href="your-earning.html">Earning</a></div>
                                            <div><a class="dropdown-item" href="your-payment.html">Payment</a></div>
                                            <div><a class="dropdown-item" href="your-statement.html">Statement</a></div>
                                        </div>
                                    </div>
                                    <div class="dropdown open-left dropdown-dontclose">
                                        <a class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                                            <div class="row">
                                                <div class="col">Language</div>
                                                <div class="col-auto pe-0"><small class="vm">EN - English</small> <i class="bi bi-translate"></i></div>
                                                <div class="col-auto ps-0"><span class="arrow bi bi-chevron-right"></span></div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <div><a class="dropdown-item active" data-value="EN">EN - English</a></div>
                                            <div><a class="dropdown-item" data-value="FR">FR - French</a></div>
                                            <div><a class="dropdown-item" data-value="CH">CH - Chinese</a></div>
                                            <div><a class="dropdown-item" data-value="HI">HI - Hindi</a></div>
                                        </div>
                                    </div>
                                    <div><a class="dropdown-item" href="your-settings.html">Account Setting</a></div>
                                    <div><a class="dropdown-item" href="login.html">Logout</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header ends -->

    <!-- Sidebar -->
    <div class="sidebar-wrap">
        <div class="sidebar">
            <div class="container">
                <div class="row mb-4">
                    <div class="col align-self-center">
                        <h6>Main navigation</h6>
                    </div>
                    <div class="col-auto">
                        <a class="" data-bs-toggle="collapse" data-bs-target="#usersidebarprofile" aria-expanded="false" role="button" aria-controls="usersidebarprofile">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    </div>
                </div>

                <!-- user information -->
                <div class="row text-center collapse " id="usersidebarprofile">
                    <div class="col-12">
                        <div class="avatar avatar-100 rounded-circle shadow-sm mb-3 bg-white">
                            <figure class="avatar avatar-90 rounded-circle coverimg">
                                <img src="assets/img/user-1.jpg" alt="" id="userphotoonboarding">
                            </figure>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <h6 class="mb-1" id="usernamedisplay">The Maxartkiller</h6>
                        <p class="text-secondary small">United States</p>
                    </div>
                </div>

                <!-- user menu navigation -->
                <div class="row mb-4">
                    <div class="col-12 px-0">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="home.html">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                                    <div class="col">Home</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-coin"></i></div>
                                    <div class="col">Finance</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="finance-dashboard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-speedometer2"></i>
                                            </div>
                                            <div class="col align-self-center">Finance Dashboard</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="finance-crypto.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-currency-bitcoin"></i>
                                            </div>
                                            <div class="col align-self-center">Crypto</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="finance-banks.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-bank"></i>
                                            </div>
                                            <div class="col align-self-center">Banks</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="finance-wallet.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-wallet2"></i>
                                            </div>
                                            <div class="col align-self-center">Wallet</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="finance-rewards.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-award"></i>
                                            </div>
                                            <div class="col align-self-center">Rewards</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-hdd-network"></i></div>
                                    <div class="col">Network</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="network-dashboard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-grid"></i>
                                            </div>
                                            <div class="col align-self-center">Network Dashboard</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="network-performance.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-speedometer"></i>
                                            </div>
                                            <div class="col align-self-center">Performance</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="network-devices.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-pc-display-horizontal"></i>
                                            </div>
                                            <div class="col align-self-center">Devices</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-boxes"></i></div>
                                    <div class="col">Inventory</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="inventory-dashboard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-box"></i>
                                            </div>
                                            <div class="col align-self-center">Inventory Dash</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="inventory-stock.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-clipboard-check"></i>
                                            </div>
                                            <div class="col align-self-center">Stock</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="inventory-orders.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-bag-check"></i>
                                            </div>
                                            <div class="col align-self-center">Orders</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-people"></i></div>
                                    <div class="col">Social</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="social-dashboard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-bullseye"></i>
                                            </div>
                                            <div class="col align-self-center">Social Dashboard</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="social-analytics.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart"></i>
                                            </div>
                                            <div class="col align-self-center">Analytics</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="social-schedule.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-calendar-week"></i>
                                            </div>
                                            <div class="col align-self-center">Schedule</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-folder"></i></div>
                                    <div class="col">Project</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="project-dashboard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-file-post"></i>
                                            </div>
                                            <div class="col align-self-center">Project Dashboard</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="project-projects.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-folder-check"></i>
                                            </div>
                                            <div class="col align-self-center">Projects</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-book"></i></div>
                                    <div class="col">Learning</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="learning-dashboard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-box"></i>
                                            </div>
                                            <div class="col align-self-center">Learning Dashboard</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="learning-courses.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-award"></i>
                                            </div>
                                            <div class="col align-self-center">Courses</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="learning-institutes.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-building"></i>
                                            </div>
                                            <div class="col align-self-center">Institutions</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- applications -->
                <div class="row mb-3">
                    <div class="col align-self-center">
                        <h6>Applications</h6>
                    </div>
                    <div class="col-auto">
                        <div class="dropdown">
                            <a class="text-theme dd-arrow-none dropdown-toggle" id="sidebaredits" data-bs-display="display" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="bi bi-sliders"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-dontclose mt-2 w-200" aria-labelledby="sidebaredits">
                                <ul class="list-group list-group-flush bg-none">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">Email</div>
                                            <div class="col-auto pe-0">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="sidebaredits1" checked>
                                                    <label class="form-check-label" for="sidebaredits1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">Explorer</div>
                                            <div class="col-auto pe-0">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="sidebaredits2" checked>
                                                    <label class="form-check-label" for="sidebaredits2"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">Calendar</div>
                                            <div class="col-auto pe-0">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="sidebaredits3" checked>
                                                    <label class="form-check-label" for="sidebaredits3"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">Chat</div>
                                            <div class="col-auto pe-0">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="sidebaredits4" checked>
                                                    <label class="form-check-label" for="sidebaredits4"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">Support</div>
                                            <div class="col-auto pe-0">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="sidebaredits5">
                                                    <label class="form-check-label" for="sidebaredits5"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 px-0">
                        <ul class="nav nav-pills nav-iconic">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="app-email.html">
                                    <div class="avatar avatar-36 icon"><i class="bi bi-envelope"></i></div>
                                    <div class="col">Email</div>
                                    <div class="col-auto align-self-center">
                                        <figure class="avatar avatar-24 coverimg rounded-circle">
                                            <img src="assets/img/user-2.jpg" alt="" />
                                        </figure>
                                        <figure class="avatar avatar-24 coverimg rounded-circle">
                                            <img src="assets/img/user-3.jpg" alt="" />
                                        </figure>
                                        <figure class="avatar avatar-24 bg-light-theme rounded-circle">
                                            <small class="fs-10 vm">9+</small>
                                        </figure>
                                    </div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="app-explorer.html">
                                    <div class="avatar avatar-36 icon">
                                        <span class="bi bi-folder position-relative">
                                            <span class="position-absolute top-0 start-100 p-1 bg-danger border border-light rounded-circle">
                                                <span class="visually-hidden">New alerts</span>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col">Explorer</div>
                                    <div class="arrow">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="app-calendar.html">
                                    <div class="avatar avatar-36 icon"><i class="bi bi-calendar-event"></i></div>
                                    <div class="col">Calendar</div>
                                    <div class="col-auto">
                                        <figure class="avatar avatar-24 rounded-circle bg-theme ">
                                            <i class="bi bi-calendar-event fs-10 vm"></i>
                                        </figure>
                                    </div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- user secondary menu navigation -->
                <h6>Pages</h6>
                <div class="row mb-4">
                    <div class="col-12 px-0">
                        <ul class="nav nav-pills">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-person-circle"></i></div>
                                    <div class="col">Profile</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="profile.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-briefcase"></i>
                                            </div>
                                            <div class="col align-self-center">Professional</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="profile-social.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                            </div>
                                            <div class="col align-self-center">Social</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="profile-analytics.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart"></i>
                                            </div>
                                            <div class=" col align-self-center">Analytical</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-building"></i></div>
                                    <div class="col">Company</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="company-profile.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-easel2"></i>
                                            </div>
                                            <div class="col align-self-center">Company Profile</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="company-branding.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-palette"></i>
                                            </div>
                                            <div class="col align-self-center">Branding</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="company-userroles.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                            </div>
                                            <div class="col align-self-center">User Roles</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="company-resources.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-journal-bookmark"></i>
                                            </div>
                                            <div class="col align-self-center">Resources</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="management.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-stopwatch"></i>
                                            </div>
                                            <div class="col align-self-center">Management</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="career.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-file-earmark-person"></i>
                                            </div>
                                            <div class="col align-self-center">Career</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="help-center.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-life-preserver"></i>
                                            </div>
                                            <div class="col align-self-center">Help Center</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="contact-us.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-envelope"></i>
                                            </div>
                                            <div class="col align-self-center">Contact us</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-question-circle"></i></div>
                                    <div class="col">Forum</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="forum.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-question-circle"></i>
                                            </div>
                                            <div class="col align-self-center">Forum</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="forum-details.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                            </div>
                                            <div class="col align-self-center">Forum Details</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-window-stack"></i></div>
                                    <div class="col">Supportive Pages</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-signin.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-person"></i>
                                            </div>
                                            <div class="col align-self-center">Sign in</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-signup.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-person-plus"></i>
                                            </div>
                                            <div class="col align-self-center">Sign up</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-password.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-key"></i>
                                            </div>
                                            <div class="col align-self-center">Change Password</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-verify.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-person-check"></i>
                                            </div>
                                            <div class="col align-self-center">Verify</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-maintenance.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-gear"></i>
                                            </div>
                                            <div class="col align-self-center">Maintenance</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-comingsoon.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-alarm"></i>
                                            </div>
                                            <div class="col align-self-center">Coming soon</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-error.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-exclamation-circle"></i>
                                            </div>
                                            <div class="col align-self-center">Error</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-onboarding.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-emoji-smile"></i>
                                            </div>
                                            <div class="col align-self-center">Onboarding</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-search.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-search"></i>
                                            </div>
                                            <div class="col align-self-center">Search</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-contact.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-envelope"></i>
                                            </div>
                                            <div class="col align-self-center">Contact</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-timeline.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-calendar-week"></i>
                                            </div>
                                            <div class="col align-self-center">Timeline</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="false" data-bs-display="static" href="#" role="button" aria-expanded="false">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-layers"></i></div>
                                    <div class="col">Components</div>
                                    <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i class="bi bi-chevron-up minus"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-cards.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-card-list"></i>
                                            </div>
                                            <div class="col align-self-center">Cards</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-forms.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-input-cursor-text"></i>
                                            </div>
                                            <div class="col align-self-center">Forms</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-charts.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-bar-chart"></i>
                                            </div>
                                            <div class="col align-self-center">Charts</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-events.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-calendar-event"></i>
                                            </div>
                                            <div class=" col align-self-center">Events</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-files.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-folder"></i>
                                            </div>
                                            <div class="col align-self-center">Files</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-summary.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-list"></i>
                                            </div>
                                            <div class="col align-self-center">Summary</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-news.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-newspaper"></i>
                                            </div>
                                            <div class=" col align-self-center">News</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-rating.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-star"></i>
                                            </div>
                                            <div class="col align-self-center">Ratings</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-users.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-people"></i>
                                            </div>
                                            <div class="col align-self-center">Users</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-progress.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-clock-history"></i>
                                            </div>
                                            <div class=" col align-self-center">Progress</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="component-pricing.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-cash-stack"></i>
                                            </div>
                                            <div class="col align-self-center">Pricing</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link" href="supportive-wizard.html">
                                            <div class="avatar avatar-40 icon"><i class="bi bi-list-nested"></i>
                                            </div>
                                            <div class=" col align-self-center">Wizards</div>
                                            <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Quick links -->
                <div class="row mb-3">
                    <div class="col align-self-center">
                        <h6>Quick Links</h6>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 px-0">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="get-started.html">
                                    <div class="avatar avatar-40 icon"><i class="bi bi-journal-code"></i></div>
                                    <div class="col">Documentation</div>
                                    <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Sidebar ends -->

    <!-- Begin page content -->
    <main class="main mainheight">
        <!-- page title bar -->
        <div class="container-fluid mb-4 title-bg">
            <div class="row align-items-center page-title">
                <div class="col-12 col-md mb-2 mb-sm-0">
                    <h5 class="mb-0">My Dashboard</h5>
                    <p class="text-secondary">This is your personal intranet</p>
                </div>
                <div class="col col-sm-auto">
                    <div class="input-group input-group-md">
                        <input type="text" class="form-control bg-none px-0" value="" id="titlecalendar" />
                        <span class="input-group-text text-secondary bg-none" id="titlecalandershow"><i class="bi bi-calendar-event"></i></span>
                    </div>
                </div>
                <div class="col-auto ps-0 position-relative">
                    <div class="dropdown d-inline-block">
                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" href="#" role="button" id="filterintitle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <i class="bi bi-filter"></i>
                        </a>
                        <div class="dropdown-menu w-300" aria-labelledby="filterintitle">
                            <div class="dropdown-item">
                                <div class="input-group input-group-md rounded">
                                    <span class="input-group-text text-theme"><i class="bi bi-box"></i></span>
                                    <select class="form-control" id="titltfilterlist" multiple>
                                        <option value="San Francisco">San Francisco</option>
                                        <option value="New York">New York</option>
                                        <option value="London">London</option>
                                        <option value="Chicago">Chicago</option>
                                        <option value="India" selected>India</option>
                                        <option value="Sydney">Sydney</option>
                                        <option value="Seattle">Seattle</option>
                                        <option value="Los Angeles">Los Angeles</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Los Angeles">Los Angeles</option>
                                        <option value="Chicago">Chicago</option>
                                        <option value="India">India</option>
                                    </select>
                                </div>
                                <div class="invalid-feedback">You have already selected maximum option allowed. (This is Configurable)</div>
                            </div>
                            <div class="dropdown-item">
                                <h6 class="mb-0">Orders:</h6>
                                <p class="text-secondary small">1256 orders last week</p>
                            </div>
                            <ul class="list-group list-group-flush bg-none mb-2">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Online Orders</div>
                                        <div class="col-auto">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="titleswitch1">
                                                <label class="form-check-label" for="titleswitch1"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">Offline Orders</div>
                                        <div class="col-auto">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="titleswitch2" checked="">
                                                <label class="form-check-label" for="titleswitch2"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="dropdown-item">
                                <div class="row">
                                    <div class="col"><button class="btn btn-outline-secondary border ddclose">cancel</button></div>
                                    <div class="col-auto">
                                        <button class="btn btn-theme">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="help-center.html" class="btn btn-link btn-square text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Support" id="stylise">
                        <i class="bi bi-life-preserver"></i>
                    </a>
                    <a href="personalization.html" class="btn btn-link btn-square text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Personalize">
                        <i class="bi bi-palette"></i>
                    </a>
                    <a href="../app-pricing.html" class="btn btn-link btn-square text-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Buy this">
                        <span class="bi bi-basket position-relative">
                            <span class="position-absolute top-0 start-100 p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- welcome bar -->
        <div class="container mb-4">
            <div class="row">
                <div class="col-12 rounded">
                    <div class="row align-items-center">

                        <!-- welcome message -->
                        <div class="col-12 col-md py-3 py-md-5">
                            <h2 class="fw-light mb-0 text-secondary">Welcome,</h2>
                            <h1 class="display-3 username ">Maxartkiller</h1>

                            <!-- Swiper daily quote -->
                            <div class="swiper dailyquote mt-4">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <i class="bi bi-calendar-event h6 avatar avatar-40 rounded-circle bg-light-theme"></i>
                                            </div>
                                            <div class="col">
                                                <a href="profile.html" class="tag mb-2 me-2">
                                                    <figure class="avatar avatar-30 rounded-circle me-1 coverimg"><img src="assets/img/user-4.jpg" alt=""></figure> James Wang <i class="bi bi-chat-right-dots vm ms-2"></i>
                                                </a>
                                                <a href="profile.html" class="tag mb-2 me-2">
                                                    <figure class="avatar avatar-30 rounded-circle me-1 coverimg"><img src="assets/img/user-2.jpg" alt=""></figure> Millie Tyson <i class="bi bi-chat-right-dots vm ms-2"></i>
                                                </a>
                                                <p class="lead">Your 5 partner and our CEO's <span class="text-gradient">birthday</span> today.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <i class="bi bi-quote h5 avatar avatar-40 rounded-circle bg-light-theme"></i>
                                            </div>
                                            <div class="col">
                                                <h5 class="fw-normal text-gradient">Winners don't do different things, they do things differently</h5>
                                                <p class="fw-light">Shiv Khera <cite title=" Source Title">You Can Win: A Step by Step Tool for Top Achievers</cite>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- rank and progress -->
                        <div class="col-auto ml-auto py-3 py-md-5 align-self-center">
                            <div class="row mb-4">
                                <div class="col col-md col-lg-auto mnw-100 text-center">
                                    <i class="bi bi-trophy h5 avatar avatar-50 bg-radial-gradient theme-yellow text-white rounded-circle mb-2"></i>
                                    <h3 class="increamentcount mb-0">2586</h3>
                                    <p class="small text-secondary">Level 3</p>
                                </div>
                                <div class="col col-md col-lg-auto mnw-100 text-center">
                                    <i class="bi bi-award h5 avatar avatar-50 bg-radial-gradient theme-red text-white rounded-circle mb-2"></i>
                                    <h3 class="increamentcount mb-0">1583</h3>
                                    <p class="small text-secondary">Your Rank</p>
                                </div>
                                <div class="col col-md col-lg-auto mnw-100 text-center">
                                    <i class="bi bi-clipboard-check h5 avatar avatar-50 bg-radial-gradient theme-teal text-white rounded-circle mb-2"></i>
                                    <h3 class="increamentcount mb-0">1356</h3>
                                    <p class="small text-secondary">Tasks Done</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="bi bi-star h5 avatar avatar-50 bg-warning text-white rounded-circle"></i>
                                </div>
                                <div class="col ps-0">
                                    <p>Earn 500 points</p>
                                    <div class="progress h-5 mb-1 bg-light-theme">
                                        <div class="progress-bar bg-theme" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-secondary small"><a href="edit-profile.html">Complete your profile</a></p>
                                </div>
                            </div>
                        </div>

                        <!-- Tips swiper message -->
                        <div class="col-auto d-none d-xxl-block h-100 py-4">
                            <div class="card border-0 h-100 bg-gradient-yellow-light">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="fw-medium">
                                                <i class="bi bi-lightbulb text-warning me-1"></i>
                                                Tips
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-sm btn-outline-warning px-2 py-0" id="starttour" data-bs-toggle="tooltip" data-bs-placement="top" title="Start Tour"><i class="bi bi-play"></i> Tour</button>
                                            <div class="dropdown d-inline-block ms-2">
                                                <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" data-bs-display="static" role="button">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li class="dropstart open-left ">
                                                        <a class="dropdown-item dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" data-bs-display="static">
                                                            Customize Tips
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-start w-300">
                                                            <div class="dropdown-item">
                                                                <h6 class="mb-0">Tips:</h6>
                                                                <p class="text-secondary">1656 visited this week</p>
                                                            </div>
                                                            <div class="dropdown-item">
                                                                <div class="input-group input-group-md rounded">
                                                                    <span class="input-group-text text-theme"><i class="bi bi-lightbulb"></i></span>
                                                                    <select class="form-control simplechosen" multiple>
                                                                        <option value="San Francisco">San Francisco</option>
                                                                        <option value="New York">New York</option>
                                                                        <option value="London">London</option>
                                                                        <option value="Chicago">Chicago</option>
                                                                        <option value="India" selected>India</option>
                                                                        <option value="Sydney">Sydney</option>
                                                                        <option value="Seattle">Seattle</option>
                                                                        <option value="Los Angeles">Los Angeles</option>
                                                                        <option value="Indonesia">Indonesia</option>
                                                                        <option value="Los Angeles">Los Angeles</option>
                                                                        <option value="Chicago">Chicago</option>
                                                                        <option value="India">India</option>
                                                                    </select>
                                                                </div>
                                                                <div class="invalid-feedback">You have already selected maximum option allowed. (This is Configurable)</div>
                                                            </div>
                                                            <ul class="list-group list-group-flush bg-none mb-2">
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col">Includes System</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="tipswitch1">
                                                                                <label class="form-check-label" for="tipswitch1"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="row">
                                                                        <div class="col">Apps Shortcuts</div>
                                                                        <div class="col-auto">
                                                                            <div class="form-check form-switch">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="tipswitch2" checked="">
                                                                                <label class="form-check-label" for="tipswitch2"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <div class="dropdown-item">
                                                                <div class="row">
                                                                    <div class="col"><button class="btn btn-outline-secondary border ddclose">cancel</button></div>
                                                                    <div class="col-auto">
                                                                        <button class="btn btn-theme">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                                    <li><a class="dropdown-item text-danger" href="javascript:void(0)">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- image swiper -->
                                    <div class="swiper image-swiper w-200 h-100 text-center">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <i class="bi bi-chat-right-dots h4 text-success mb-3 d-block"></i>
                                                <h6>Chat Communication</h6>
                                                <p class="small text-secondary">From the top right corner you can have access to chat panel and click on any user chat window interface will be open.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <i class="bi bi-person h4 text-theme mb-3 d-block"></i>
                                                <h6>Onboarding</h6>
                                                <p class="small text-secondary">User on-boarding comes in the sign up flow. Complete sign up process you will see the on-boarding pages at best UI UX.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <i class="bi bi-search h4 text-danger mb-3 d-block"></i>
                                                <h6>Search Result</h6>
                                                <p class="small text-secondary">Try to type something in search box at header and big search result box will be appeared right away.</p>
                                            </div>
                                            <div class="swiper-slide">
                                                <i class="bi bi-heart h4 text-danger mb-3 d-block"></i>
                                                <h6 class="text-gradient">Spread love</h6>
                                                <p class="small text-secondary">If you like our template <b class="text-gradient">please share</b> to the beautiful world. World is waiting to get more good things. <i class="text-danger bi bi-heart-fill"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- image swiper ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content -->
        <div class="container">
            <div class="row mb-4 py-2">
                <div class="col text-center">
                    <h4>The sort <span class="text-gradient">summary</span> may help you</h4>
                    <p class="text-secondary">Keep yourself updated, No matter how much workload is.</p>
                </div>
            </div>
            <div class="row">
                <!-- summary blocks -->
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="circle-small">
                                        <div id="circleprogressblue"></div>
                                        <div class="avatar h5 bg-light-blue rounded-circle">
                                            <i class="bi bi-calendar2-check"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Task Completed</p>
                                    <h5 class="fw-medium">60<small>%</small></h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="circle-small">
                                        <div id="circleprogressyellow"></div>
                                        <div class="avatar h5 bg-light-yellow text-yellow rounded-circle">
                                            <i class="bi bi-building"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Construction Invested</p>
                                    <h5 class="fw-medium">12550<small>USD</small></h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-50 h5 bg-light-red text-red rounded-circle">
                                        <i class="bi bi-emoji-heart-eyes"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Event Joined</p>
                                    <h5 class="fw-medium">1525<small>k</small></h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3">
                    <div class="card border-0 mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar avatar-50 h5 bg-green text-white rounded-circle">
                                        <i class="bi bi-thermometer-sun"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-1">Temperature</p>
                                    <h5 class="fw-medium">45 <small><sup>0</sup>C, Office R-32</small></h5>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="text-secondary dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0)">Move</a></li>
                                            <li><a class="dropdown-item text-danger" href="javascript:void(0)">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- add column-set class to parent when customize column width dropdown added -->
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3 mb-4 column-set">
                    <!-- finance card -->
                    <div class="card border-0 bg-gradient-theme-light theme-blue">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="fw-medium">
                                        <i class="bi bi-cash h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                        Finance
                                    </h6>
                                </div>
                            </div>
                        </div>
                      
                        <div class="card-body pt-2 pb-2">
                            <div class="card border-0 my-red-card card-pluse-animation card border-0 bg-gradient-theme-light theme-red">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="circle-small">
                                                <div id="circleprogressred"><svg viewBox="0 0 100 100" style="display: block; width: 100%;"><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="rgba(255, 0, 43, 0.2)" stroke-width="10" fill-opacity="0"></path><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="rgb(240,61,79)" stroke-width="10" fill-opacity="0"></path></svg></div>
                                                <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                                    <i class="bi bi-bug"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-secondary small mb-1 my-title-text-animation">Ticket Created</p>
                                            <p class="my-text-animation">651<small> and 250 yesterday</small></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="card border-0 my-red-card card-pluse-animation card border-0 bg-gradient-theme-light theme-green">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="circle-small">
                                                <div id="circleprogressred"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                    <path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="#2e9c65" stroke-width="10" fill-opacity="0"></path><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="#2e9c65" stroke-width="10" fill-opacity="0"></path></svg></div>
                                                <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                                    <i class="bi bi-bug"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-secondary small mb-1 my-title-text-animation">Ticket Created</p>
                                            <p class="my-text-animation">651<small> and 250 yesterday</small></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="card border-0 my-red-card card-pluse-animation card border-0 bg-gradient-theme-yellow theme-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="circle-small">
                                                <div id="circleprogressred"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                    <path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="rgba(255,193,7)" stroke-width="10" fill-opacity="0"></path><path d="M 50,50 m 0,-45 a 45,45 0 1 1 0,90 a 45,45 0 1 1 0,-90" stroke="rgba((255,193,7))" stroke-width="10" fill-opacity="0"></path></svg></div>
                                                <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                                    <i class="bi bi-bug"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-secondary small mb-1 my-title-text-animation">Ticket Created</p>
                                            <p class="my-text-animation">651<small> and 250 yesterday</small></p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-footer justify-content-center text-center">
                            <a href="finance-dashboard.html" class="btn btn-sm btn-link text-theme">Visit Finance Dashboard <i class="bi bi-arrow-right vm"></i></a>
                        </div>
                    </div>
                </div>
               
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3 mb-4 column-set">
                    <!-- Network card -->
                    <div class="card border-0 bg-gradient-theme-light theme-red h-100">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="fw-medium">
                                        <i class="bi bi-hdd-rack h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                        Network
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="bi bi-columns"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="dropdown-item text-center p-0">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-8" data-title="8"><span></span></div>
                                                            <div class="col-4" data-title="4"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-9" data-title="9"><span></span></div>
                                                            <div class="col-3" data-title="3"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-12" data-title="12"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="smallchart mb-2">
                                <canvas id="smallchart2"></canvas>
                            </div>
                            <p class="mb-1">Server CPU <span class="text-secondary">#0514-R3D</span></p>
                            <p class="text-secondary">45% 3.2 MHz</p>
                            <div class="card border-0 mt-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="circle-small">
                                                <div id="circleprogressred"></div>
                                                <div class="avatar h5 bg-light-theme text-theme rounded-circle">
                                                    <i class="bi bi-bug"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-secondary small mb-1">Ticket Created</p>
                                            <p>651<small> and 250 yesterday</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col">
                                            <p class="text-secondary small mb-1">Resolved</p>
                                            <p class="text-success">432</p>
                                        </div>
                                        <div class="col border-left-dashed">
                                            <p class="text-secondary small mb-1">In Progress</p>
                                            <p class="text-warning">50</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center text-center">
                            <a href="network-dashboard.html" class="btn btn-sm btn-link text-theme">Visit Network Dashboard <i class="bi bi-arrow-right vm"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xxl-3 mb-4 column-set">
                    <!-- Social card -->
                    <div class="card border-0 bg-gradient-theme-light theme-green h-100">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="fw-medium">
                                        <i class="bi bi-people h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                        Social
                                    </h6>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="bi bi-columns"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="dropdown-item text-center p-0">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-8" data-title="8"><span></span></div>
                                                            <div class="col-4" data-title="4"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-9" data-title="9"><span></span></div>
                                                            <div class="col-3" data-title="3"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-12" data-title="12"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col">
                                    <figure class="coverimg rounded w-100 h-80 mb-0">
                                        <img src="assets/img/news-4.jpg" alt="" class="mw-100" />
                                    </figure>
                                </div>
                                <div class="col">
                                    <p class="text-secondary small mb-0">Boosted Post</p>
                                    <h4>2,545,05</h4>
                                    <p class="text-secondary small">People Reached</p>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-12 mb-2">
                                    <p class="text-secondary small">Buy now or Share now! Do support </p>
                                </div>
                                <div class="col">
                                    <p class="small text-secondary mb-0">Tweet Likes</p>
                                    <p class="mb-0">65.15 k</p>
                                </div>
                                <div class="col">
                                    <p class="small text-secondary mb-0">Retweet</p>
                                    <p class="mb-0">8.2 k</p>
                                </div>
                                <div class="col">
                                    <p class="small text-secondary mb-0">Clicks</p>
                                    <p class="mb-0">52.01 k</p>
                                </div>
                            </div>

                            <div class="card border-0 mt-3 bg-radial-gradient text-white">
                                <div class="card-body bg-none">
                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <figure class="avatar avatar-50 coverimg rounded">
                                                <img src="assets/img/business-2.jpg" alt="" />
                                            </figure>
                                        </div>
                                        <div class="col">
                                            <p>Learn about software and Framework. All...</p>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <p class="mb-0">125</p>
                                            <p class="small">Reached</p>
                                        </div>
                                        <div class="col-auto ps-0">
                                            <p class="mb-0">35</p>
                                            <p class="small">Likes</p>
                                        </div>
                                        <div class="col text-end">
                                            <button class="btn btn-sm btn-light">Boost</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer justify-content-center text-center">
                            <a href="social-dashboard.html" class="btn btn-sm btn-link text-theme">Visit Social Dashboard <i class="bi bi-arrow-right vm"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4 py-2">
                <div class="col text-center">
                    <h4>Important <span class="text-gradient">News</span> around you</h4>
                    <p class="text-secondary">While you are working hard, we let you know important news.</p>
                </div>
            </div>
            <div class="row">
                <!-- news and offers -->
                <div class="col-12 col-lg-12 col-xl-4 col-xxl-4 mb-4 column-set">
                    <div class="card border-0">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="bi bi-newspaper h5 me-1 avatar avatar-40 bg-light-theme rounded me-2"></i>
                                </div>
                                <div class="col ps-0">
                                    <h6 class="fw-medium mb-0">Great news</h6>
                                    <p class="text-secondary small">Change world is a combine effort.</p>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="bi bi-columns"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="dropdown-item text-center p-0">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-8" data-title="8"><span></span></div>
                                                            <div class="col-4" data-title="4"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-9" data-title="9"><span></span></div>
                                                            <div class="col-3" data-title="3"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-12" data-title="12"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="coverimg w-100 h-180 position-relative">
                            <div class="position-absolute bottom-0 start-0 w-100 mb-3 px-3 z-index-1">
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-sm btn-outline-light btn-rounded">Share this</button>
                                    </div>
                                    <div class="col-auto">
                                        <div class="dropup d-inline-block">
                                            <a class="btn btn-square btn-sm rounded-circle btn-outline-light dd-arrow-none" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static" role="button">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-hand-thumbs-up me-1 text-green"></i> Recommendation this</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-hand-thumbs-down me-1 text-danger"></i> Don't recommend</a></li>
                                                <li><a class="dropdown-item" href="javascript:void(0)"><i class="bi bi-star text-yellow"></i> Add to favorite</a></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0)">Report this</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <img src="assets/img/bg-20.jpg" class="mw-100" alt="" />
                        </div>
                        <div class="card-body">
                            <h5 class="mb-3">We all are artist in our field. We all are able to find symmetry in our routine</h5>
                            <h6 class="fw-medium mb-2">Make it clutter free and create better world</h6>
                            <p class="text-secondary">We have added useful and wider-range of widgets fully flexible with wrapper container. If you still reading this, you are in love with this design. <a href="blog-4.html">Read more...</a> </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 mb-4 position-relative column-set">
                    <!-- offer block-->
                    <div class="card border-0 position-relative overflow-hidden mb-4">
                        <div class="dropdown d-block position-absolute end-0 top-0 m-2 z-index-5">
                            <a class="btn btn-link btn-square text-white dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                <i class="bi bi-columns"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item text-center">
                                    <div class="row gx-3 mb-3">
                                        <div class="col-6">
                                            <div class="row select-column-size gx-1">
                                                <div class="col-8" data-title="8"><span></span></div>
                                                <div class="col-4" data-title="4"><span></span></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row select-column-size gx-1">
                                                <div class="col-9" data-title="9"><span></span></div>
                                                <div class="col-3" data-title="3"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-6">
                                            <div class="row select-column-size gx-1">
                                                <div class="col-6" data-title="6"><span></span></div>
                                                <div class="col-6" data-title="6"><span></span></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row select-column-size gx-1">
                                                <div class="col-12" data-title="12"><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <figure class="coverimg position-absolute w-100 h-100 start-0 top-0 m-0">
                            <img src="assets/img/bg-13.jpg" class="mw-100" alt="" />
                        </figure>
                        <div class="card-body bg-none">
                            <div class="row">
                                <div class="col-7">
                                    <div class="bg-theme text-white text-center p-3 rounded">
                                        <h3>15% OFF</h3>
                                        <p>Holiday Trip</p>
                                        <p class="text-muted small">Price including with our launch offer get 5% Extra</p>
                                        <button class="copy-text btn btn-sm btn-rounded btn-outline-dashed text-white border-white">GOWFAMILY</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 overflow-hidden">
                        <div class="row mx-0">
                            <div class="col-6 pe-0 bg-theme text-white half-circle-vertical text-center py-4 z-index-1">
                                <div class="position-relative">
                                    <h3>15% OFF</h3>
                                    <p>Uberazia Taxi</p>
                                    <p class="text-muted small">Price including with our launch offer get 5% Extra</p>
                                    <button class="copy-text btn btn-sm btn-rounded btn-outline-dashed text-white border-white">GOREELLAUNCH</button>
                                </div>
                            </div>
                            <div class="col-6 position-relative">
                                <figure class="coverimg position-absolute w-100 h-100 start-0 top-0 m-0">
                                    <img src="assets/img/news-3.jpg" class="mw-100" alt="" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-4 col-xxl-4 mb-4 column-set">
                    <!-- photo gallery view -->
                    <div class="card border-0 overflow-hidden h-100">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="bi bi-image h5 me-1 avatar avatar-40 bg-light-purple text-purple rounded me-2"></i>
                                </div>
                                <div class="col ps-0">
                                    <h6 class="fw-medium mb-0">Photo Gallery</h6>
                                    <p class="text-secondary small">Click image to see preview</p>
                                </div>
                                <div class="col-auto">
                                    <div class="dropdown d-inline-block">
                                        <a class="btn btn-link btn-square text-secondary dd-arrow-none dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="bi bi-columns"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="dropdown-item text-center p-0">
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-8" data-title="8"><span></span></div>
                                                            <div class="col-4" data-title="4"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-9" data-title="9"><span></span></div>
                                                            <div class="col-3" data-title="3"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                            <div class="col-6" data-title="6"><span></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="row select-column-size gx-1">
                                                            <div class="col-12" data-title="12"><span></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0 gallery mnh-350">
                            <div class="row g-0 h-100">
                                <div class="col-6 h-100 position-relative overflow-hidden">
                                    <a href="assets/img/bg-8.jpg" class="coverimg position-absolute w-100 h-100 start-0 top-0 m-0 zoomout">
                                        <img src="assets/img/bg-8.jpg" class="mw-100" alt="" title="Love unconditional when it comes to your own" />
                                    </a>
                                </div>
                                <div class="col-6 h-100">
                                    <div class="row h-100">
                                        <div class="col-12 h-50 position-relative overflow-hidden">
                                            <a href="assets/img/business-4.jpg" class="coverimg position-absolute w-100 h-100 start-0 top-0 m-0 zoomout">
                                                <img src="assets/img/business-4.jpg" class="mw-100" alt="" title="Your business your strength" />
                                            </a>
                                        </div>
                                        <div class="col-12 h-50 position-relative overflow-hidden">
                                            <a href="assets/img/bg-2.jpg" class="coverimg position-absolute w-100 h-100 start-0 top-0 m-0 zoomout">
                                                <img src="assets/img/bg-2.jpg" class="mw-100" alt="" title="Beautiful background image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-3">
            <div class="container footer-page bg-radial-gradient-theme mt-4 py-5">
                <div class="row mb-5">
                    <div class="col-12 col-xl-11 mx-auto">
                        <div class="row">
                            <div class="col-12 col-xxl-4 mb-5 mb-xxl-0">
                                <h2 class="mb-3"><span class="text-gradient">#1 Creative</span> &<br /><span class="text-gradient">Multipurpose</span> HTML Template</h2>
                                <h5 class="mb-4">Clean & Trending UI design with<br />a great user experience</h5>
                                <p>AdminUX is creative and multipurpose template. You can use it for CRM, Business application, Intranet Application, Portal service and Many more.
                                    It comes with unlimited possibilities and 10+ predefined styles which you can also mix up and create new style. Do support and spread a word for us. </p>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-2 ms-xxl-auto mb-5 mb-md-0">
                                <h5 class="mb-3">Main <span class="text-gradient">Dashboards</span></h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="finance-dashboard.html">Finance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="network-dashboard.html">Network</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="inventory-dashboard.html">Inventory</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="social-dashboard.html">Social</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="project-dashboard.html">Project</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="learning-dashboard.html">Learning</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-xxl-2 mb-5 mb-md-0">
                                <h5 class="mb-3">Creative <span class="text-gradient">Pages</span></h5>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="app-calendar.html">Calendar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="app-email.html">Email</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="app-explorer.html">Explorer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="app-support.html">We need Support <i class="bi bi-heart-fill text-red"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link px-0" href="app-pricing.html" target="_blank">Buy Now <i class="bi bi-arrow-up-right-square"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-4 col-xxl-3">
                                <a class="navbar-brand d-block mb-3" href="#">
                                    <div class="row">
                                        <div class="col-auto"><span class="logo-icon"><img src="assets/img/logo-icon.png" class="mx-100" alt="" /></span></div>
                                        <div class="col ps-0 align-self-center d-none d-sm-block">
                                            <h4 class="fw-normal text-white mb-0">AdminUX</h4>
                                            <p class="text-muted">Admin App UI</p>
                                        </div>
                                    </div>
                                </a>

                                <p class="mb-2"><b>Main office:</b></p>
                                <p class="mb-1"><a href="https://maxartkiller.com" target="_blank">www.maxartkiller.com</a></p>
                                <p class="mb-4">Test data 103909 Witamer CR, Niagara Falls, NY 14305, United States</p>

                                <div class="row align-items-center mb-3">
                                    <div class="col-auto"><i class="bi bi-clock text-white h4"></i></div>
                                    <div class="col ps-0">0441-215-518625<br /><span>Mon - Sat, 9:00 am - 10:00pm</span></div>
                                </div>
                                <div class="row align-items-center mb-3">
                                    <div class="col-auto"><i class="bi bi-telephone text-white h4"></i></div>
                                    <div class="col ps-0">+1-000 000 100000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-xxl-11 mx-auto">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-auto mb-4 mb-md-0">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.facebook.com/maxartkiller/" target="_blank">
                                            <i class="bi bi-facebook h5"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://twitter.com/maxartkiller" target="_blank">
                                            <i class="bi bi-twitter h5"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://linkedin.com/company/maxartkiller" target="_blank">
                                            <i class="bi bi-linkedin h5"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.instagram.com/maxartkiller/" target="_blank">
                                            <i class="bi bi-instagram h5"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-auto ms-auto">
                                <ul class="nav justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i class="bi bi-microsoft h4"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <p class="mb-0 small">Get this on</p>
                                                    <p>Microsoft Store</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i class="bi bi-play-fill h3"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <p class="mb-0 small">Get this on</p>
                                                    <p>Google Play</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <i class="bi bi-apple h4"></i>
                                                </div>
                                                <div class="col ps-0">
                                                    <p class="mb-0 small">Get this on</p>
                                                    <p>App Store</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- footer -->
    <footer class="footer text-white mt-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md col-lg py-2">
                    <span class="text-secondary small">Copyright @2022, Creatively designed by <a href="https://maxartkiller.com" target="_blank">Maxartkiller</a> on Earth ❤️</span>
                </div>
                <div class="col-12 col-md-auto col-lg-auto align-self-center">
                    <ul class="nav small">
                        <li class="nav-item"><a class="nav-link" href="help-center.html">Help</a></li>
                        <li class="nav-item">|</li>
                        <li class="nav-item"><a class="nav-link" href="terms-of-use.html">Terms of Use</a></li>
                        <li class="nav-item">|</li>
                        <li class="nav-item"><a class="nav-link" href="privacy-policy.html">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer ends -->

    <!-- Rightbar -->
    <div class="rightbar-wrap">
        <div class="rightbar">

            <!-- chat window -->
            <div class="chatwindow d-none" id="chatwindow">
                <div class="card border-0 h-100">
                    <div class="input-group input-group-md">
                        <span class="input-group-text text-theme"><i class="bi bi-person-plus"></i></span>
                        <input type="text" class="form-control" placeholder="Start searching... " value="" />
                        <div class="dropdown input-group-text rounded px-0">
                            <button class="btn btn-sm btn-link dd-arrow-none" type="button" id="statuschat" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="statuschat">
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-success rounded-circle d-inline-block p-1"></span> Online</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-warning rounded-circle d-inline-block p-1"></span> Away</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-danger rounded-circle d-inline-block p-1"></span> Offline</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0)"><span class="vm me-1 bg-secondary rounded-circle d-inline-block p-1"></span> Disabled</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="row">
                            <div class="col d-grid">
                                <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-camera-video me-2"></i> Meet</button>
                            </div>
                            <div class="col d-grid">
                                <button class="btn btn-outline-secondary border" type="button"><i class="bi bi-chat-right-text me-2"></i> Chat</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body h-100 overflow-y-auto p-0">
                        <ul class="list-group list-group-flush bg-none rounded-0 ">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="assets/img/user-2.jpg" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Angelina Devid</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check"></i> 2:00 am</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-theme">
                                            <span class="h6 vm">JM</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Mr. Jack Mario</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i> 2:00 am</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="assets/img/user-4.jpg" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Roberto Carlos</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-info"></i> 2:00 am</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="assets/img/user-1.jpg" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">The Maxartkiller</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-success"></i> 2 days ago</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-warning text-white">
                                            <span class="h6 vm">JC</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Ms. Jully CTO</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i> 4 days ago</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item disabled" data-bs-toggle="modal" data-bs-target="#chatmodalwindow">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-success text-white">
                                            <span class="h6 vm">JC</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Aswatthma D-Plan</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check"></i> 1 mo ago</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle bg-theme">
                                            <img src="assets/img/favicon72.png" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">getAdminUX Support</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check"></i> 2:00 am</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Thank you for connecting</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-theme">
                                            <span class="h6 vm">JM</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Mr. Jack Mario</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i> 2:00 am</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="assets/img/user-4.jpg" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Roberto Carlos</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-info"></i> 2:00 am</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 coverimg rounded-circle">
                                            <img src="assets/img/user-1.jpg" alt="" />
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">The Maxartkiller</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all text-success"></i> 2 days ago</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar avatar-44 rounded-circle bg-warning text-white">
                                            <span class="h6 vm">JC</span>
                                        </figure>
                                    </div>
                                    <div class="col-9 align-self-center ps-0">
                                        <div class="row g-0">
                                            <div class="col-8">
                                                <p class="text-truncate mb-0">Ms. Jully CTO</p>
                                            </div>
                                            <div class="col-4 text-end"><small class="text-muted fs-10 mb-1"><i class="bi bi-check-all"></i> 4 days ago</small></div>
                                        </div>
                                        <p class="text-secondary small text-truncate">Spread love and spread this template</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- chat window ends -->

            <!-- notifications window -->
            <div class="notificationwindow d-none h-100 overflow-y-auto" id="notificationwindow">
                <div class="card border-0 mb-2">
                    <div class="input-group input-group-md">
                        <span class="input-group-text text-theme"><i class="bi bi-calendar-event"></i></span>
                        <input type="text" class="form-control" value="" id="notificationdaterange" />
                    </div>
                    <div class="card-body p-0 calendarwindow" id="calendardisplay">
                    </div>
                </div>
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 coverimg rounded-circle">
                                    <img src="assets/img/user-2.jpg" alt="" />
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="profile.html">Angelina David</a>, <a href="profile.html">John McMillan</a> and <span class="fw-medium">36 others</span> are also order from same website</p>
                                <p class="text-secondary small">2:14 pm <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 rounded-circle bg-theme">
                                    <span class="h6 vm">JM</span>
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="profile.html">Jack Mario</a> commented: "This one is most usable design with great user experience. w..."</p>
                                <p class="text-secondary small">2 days ago <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning mb-2">
                    <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-40 rounded-circle bg-warning text-white">
                                <i class="bi bi-bell"></i>
                            </figure>
                        </div>
                        <div class="col ps-0">
                            <p>Your subscription going to expire soon. Please <a href="profile-subscription.html">upgrade</a> to get service interrupt free.</p>
                            <p class="text-secondary small">4 days ago <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 coverimg rounded-circle">
                                    <img src="assets/img/user-4.jpg" alt="" />
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="finance-sendmoney.html">Roberto Carlos</a> has requested to send $120.00 money.</p>
                                <p class="text-secondary small">4 days ago <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 rounded-circle bg-light-theme">
                                    <i class="bi bi-calendar-event"></i>
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p class="h6 fw-medium">WINUX: getAdminUX</p>
                                <p>Learning for better user experience on Universal app. development</p>
                                <div class="mb-3">
                                    <figure class="avatar avatar-24 coverimg rounded-circle" data-bs-toggle="tooltip" title="Angelina David">
                                        <img src="assets/img/user-2.jpg" alt="" />
                                    </figure>
                                    <figure class="avatar avatar-24 coverimg rounded-circle" data-bs-toggle="tooltip" title="Switty Johnson">
                                        <img src="assets/img/user-3.jpg" alt="" />
                                    </figure>
                                    <div class="avatar avatar-24 bg-light-theme rounded-circle">
                                        <small class="fs-10 vm">9+</small>
                                    </div>
                                    <span class="text-secondary small"> are attending</span>
                                </div>
                                <p class="text-secondary small">4 days ago <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <figure class="avatar avatar-40 coverimg rounded-circle bg-theme">
                                    <img src="assets/img/favicon72.png" alt="" />
                                </figure>
                            </div>
                            <div class="col ps-0">
                                <p><a href="profile.html">The Maxartkiller</a> commented: "Thank you so much for this deep view at getAdminUX..."</p>
                                <p class="text-secondary small">6 days ago <a href="javascript:void(0)" class="float-end text-secondary text-muted"><i class="bi bi-trash"></i></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- notifications window ends -->

        </div>
    </div>
    <!-- Rightbar ends -->

    <!-- chat window -->
    <div class="chatboxes w-auto align-right mb-2">
        <!-- dropdown for each user  -->
        <div class="dropstart">
            <div class="dd-arrow-none dropdown-toggle" id="thefirstchat" data-bs-display="static" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button">
                <span class="position-absolute top-0 start-100 p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                <figure class="avatar avatar-40 coverimg rounded-circle shadow">
                    <img src="assets/img/user-2.jpg" alt="">
                </figure>
            </div>
            <div class="dropdown-menu dropdown-menu-middle w-300 mb-2 p-0">
                <!-- chat box here  -->
                <div class="card shadow-none border-0">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col align-self-center">
                                <p class="mb-0">Angelina Devid</p>
                                <p class="text-secondary small">1 hr ago</p>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-sm btn-square btn-outline-secondary border"><i class="bi bi-camera-video"></i></button>
                                    <button type="button" class="btn btn-sm btn-square btn-outline-secondary border"><i class="bi bi-person-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-auto ps-0 align-self-center">
                                <div class="dropdown d-inline-block">
                                    <a class="dd-arrow-none" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" role="button">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0)">Add Contact</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)">Search</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)">Clear Chat</a></li>
                                        <li><a class="dropdown-item text-danger" href="javascript:void(0)">Report</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-y-auto h-250 chat-list">
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            Hi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary small time"><i class="bi bi-check"></i> 9:00 pm</p>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            Hi!<br>Yes please tell us your query.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check"></i> 9:10 pm</p>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-12 text-center">
                                <span class="alert-warning text-secondary mx-auto btn btn-sm py-1 mb-3">26 November
                                    2021</span>
                            </div>
                        </div>
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            AdminUX is amazing and we thank you. How can we buy?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mw-100 position-relative mb-2 figure">
                                                <div class="position-absolute end-0 top-0">
                                                    <button class="avatar avatar-36 rounded-circle p-0 btn btn-info text-white shadow-sm m-2">
                                                        <i class="bi bi-download"></i>
                                                    </button>
                                                </div>
                                                <img src="assets/img/news-4.jpg" alt="" class="mw-100">
                                            </div>
                                            Thank you too. You can buy it from preview page and click on buy now.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-12  text-center">
                                <span class="alert-warning text-secondary mx-auto btn btn-sm py-1 mb-3">25 November
                                    2019</span>
                            </div>
                        </div>
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mw-100 position-relative mb-2 figure">
                                                <video src="https://maxartkiller.com/website/maxartkiller.mp4" controls="" preload="none"></video>
                                            </div>
                                            We also love this small presentation.
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00
                                        pm
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <p>Ohh... Thats great. AdminUX is HTML template can be used in various business domains like
                                                Manufacturing, inventory, IT, administration etc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="input-group input-group-md">
                            <button class="btn btn-sm btn-link px-2"><i class="bi bi-emoji-smile"></i></button>
                            <button class="btn btn-sm btn-link px-2"><i class="bi bi-paperclip"></i></button>
                            <input type="text" class="form-control" placeholder="Type your message... " value="">
                            <button class="btn btn-sm btn-link px-2" type="button">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="chat-close btn btn-danger text-white"><i class="bi bi-x"></i></button>
        </div>
        <!-- dropdown for each user  -->
        <div class="dropstart">
            <div class="dd-arrow-none dropdown-toggle" data-bs-display="static" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button">
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                <figure class="avatar avatar-40 coverimg rounded-circle shadow">
                    <img src="assets/img/user-4.jpg" alt="">
                </figure>
            </div>
            <div class="dropdown-menu dropdown-menu-middle w-300 mb-2 p-0">
                <!-- chat box here  -->
                <div class="card shadow-none border-0">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col align-self-center">
                                <p class="mb-0">Roberto Carlos</p>
                                <p class="text-secondary small">10 min ago</p>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-sm btn-outline-secondary border"><i class="bi bi-camera-video"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary border"><i class="bi bi-person-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-auto ps-0 align-self-center">
                                <div class="dropdown d-inline-block">
                                    <a class="dd-arrow-none" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" role="button">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0)">Add Contact</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)">Search</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)">Clear Chat</a></li>
                                        <li><a class="dropdown-item text-danger" href="javascript:void(0)">Report</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-y-auto h-250 chat-list">
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            Hi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary small time"><i class="bi bi-check"></i> 9:00 pm</p>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            Hi!<br>Yes please tell us your query.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check"></i> 9:10 pm</p>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-12 text-center">
                                <span class="alert-warning text-secondary mx-auto btn btn-sm py-1 mb-3">26 November
                                    2021</span>
                            </div>
                        </div>
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            AdminUX is amazing and we thank you. How can we buy?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mw-100 position-relative mb-2 figure">
                                                <div class="position-absolute end-0 top-0">
                                                    <button class="avatar avatar-36 rounded-circle p-0 btn btn-info text-white shadow-sm m-2">
                                                        <i class="bi bi-download"></i>
                                                    </button>
                                                </div>
                                                <img src="assets/img/news-4.jpg" alt="" class="mw-100">
                                            </div>
                                            Thank you too. You can buy it from preview page and click on buy now.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-12  text-center">
                                <span class="alert-warning text-secondary mx-auto btn btn-sm py-1 mb-3">25 November
                                    2019</span>
                            </div>
                        </div>
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mw-100 position-relative mb-2 figure">
                                                <video src="https://maxartkiller.com/website/maxartkiller.mp4" controls="" preload="none"></video>
                                            </div>
                                            We also love this small presentation.
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00
                                        pm
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <p>Ohh... Thats great. AdminUX is HTML template can be used in various business domains like
                                                Manufacturing, inventory, IT, administration etc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="input-group input-group-md">
                            <button class="btn btn-sm btn-link px-2"><i class="bi bi-emoji-smile"></i></button>
                            <button class="btn btn-sm btn-link px-2"><i class="bi bi-paperclip"></i></button>
                            <input type="text" class="form-control" placeholder="Type your message... " value="">
                            <button class="btn btn-sm btn-link px-2" type="button">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="chat-close btn btn-danger text-white"><i class="bi bi-x"></i></button>
        </div>
    </div>

    <!-- dropdown for support  -->
    <div class="chatboxes w-auto align-right bottom-0 mb-2">

        <!-- dropdown for support  -->
        <div class="dropup">
            <div class="dd-arrow-none dropdown-toggle" data-bs-display="static" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" id="supportdd" role="button">
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                <figure class="avatar avatar-40 coverimg rounded-circle shadow bg-primary">
                    <img src="assets/img/favicon72.png" alt="">
                </figure>
            </div>
            <div class="dropdown-menu dropdown-menu-end w-300 p-0">
                <!-- chat box here  -->
                <div class="card shadow-none border-0">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col align-self-center">
                                <p class="mb-0">AdminUX Support</p>
                                <p class="text-secondary small">Just now</p>
                            </div>
                            <div class="col-auto">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-sm btn-outline-secondary border"><i class="bi bi-person-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-auto ps-0 align-self-center">
                                <div class="dropdown d-inline-block">
                                    <a class="dd-arrow-none" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" role="button">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="statuschat">
                                        <li><a class="dropdown-item" href="javascript:void(0)">Add Contact</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)">Search</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0)">Clear Chat</a></li>
                                        <li><a class="dropdown-item text-danger" href="javascript:void(0)">Report</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body overflow-y-auto h-250 chat-list">
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            Hi!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary small time"><i class="bi bi-check"></i> 9:00 pm</p>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            Hi!<br>Yes please tell us your query.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check"></i> 9:10 pm</p>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-12 text-center">
                                <span class="alert-warning text-secondary mx-auto btn btn-sm py-1 mb-3">26 November
                                    2021</span>
                            </div>
                        </div>
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            AdminUX is amazing and we thank you. How can we buy?
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mw-100 position-relative mb-2 figure">
                                                <div class="position-absolute end-0 top-0">
                                                    <button class="avatar avatar-36 rounded-circle p-0 btn btn-info text-white shadow-sm m-2">
                                                        <i class="bi bi-download"></i>
                                                    </button>
                                                </div>
                                                <img src="assets/img/news-4.jpg" alt="" class="mw-100">
                                            </div>
                                            Thank you too. You can buy it from preview page and click on buy now.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="col-12  text-center">
                                <span class="alert-warning text-secondary mx-auto btn btn-sm py-1 mb-3">25 November
                                    2019</span>
                            </div>
                        </div>
                        <div class="row no-margin left-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mw-100 position-relative mb-2 figure">
                                                <video src="https://maxartkiller.com/website/maxartkiller.mp4" controls="" preload="none"></video>
                                            </div>
                                            We also love this small presentation.
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00
                                        pm
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin right-chat">
                            <div class="col-12">
                                <div class="chat-block">
                                    <div class="row">
                                        <div class="col">
                                            <p>Ohh... Thats great. AdminUX is HTML template can be used in various business domains like
                                                Manufacturing, inventory, IT, administration etc.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <p class="text-secondary small time"><i class="bi bi-check-all text-primary"></i> 8:00 pm
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer p-0">
                        <div class="input-group input-group-md">
                            <button class="btn btn-sm btn-link px-2"><i class="bi bi-emoji-smile"></i></button>
                            <button class="btn btn-sm btn-link px-2"><i class="bi bi-paperclip"></i></button>
                            <input type="text" class="form-control" placeholder="Type your message... " value="">
                            <button class="btn btn-sm btn-link px-2" type="button">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="chat-close btn btn-danger text-white"><i class="bi bi-x"></i></button>
        </div>
    </div>
    <!-- chat window ends -->


    <!-- Required jquery and libraries -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-5/dist/js/bootstrap.bundle.js"></script>

    <!-- Customized jquery file  -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="assets/js/pwa-services.js"></script>

    <!-- date range picker -->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

    <!-- chosen script -->
    <script src="assets/vendor/chosen_v1.8.7/chosen.jquery.min.js"></script>

    <!-- Chart js script -->
    <script src="assets/vendor/chart-js-3.3.1/chart.min.js"></script>

    <!-- Progress circle js script -->
    <script src="assets/vendor/progressbar-js/progressbar.min.js"></script>

    <!-- swiper js script -->
    <script src="assets/vendor/swiper-7.3.1/swiper-bundle.min.js"></script>

    <!-- Simple lightbox script -->
    <script src="assets/vendor/simplelightbox/simple-lightbox.jquery.min.js"></script>

    <!-- app tour script-->
    <script src="assets/vendor/Product-Tour-Plugin-jQuery/lib.js"></script>

    <!-- page level script here -->
    <script src="assets/js/header-title.js"></script>
    <script src="assets/js/dashboard.js"></script>

</body>

</html>