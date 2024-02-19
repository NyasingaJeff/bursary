<!doctype html>
<html lang="en">


<head>

        <meta charset="utf-8" />
        <title>Bursary Management System.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Send and recieve money From all over the World" name="description" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset ('images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset ('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset ('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset ('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="colored" data-layout="horizontal">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="layout-wrapper" class="mt-8">

            <header id="page-topbar">
                <div class="navbar-header d-flex flex-row align-items-center justify-content-end">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index-2.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset ('images/logo.svg')}}" alt="" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset ('images/logo-dark.png')}}" alt="" height="17">
                                </span>
                            </a>

                            <a href="index-2.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset ('images/logo-light.svg')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset ('images/logo-light.png')}}" alt="" height="19">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <!-- <form class="app-search d-none d-lg-block">
                            <div class="position-relative">

                             <input type="text" class="form-control" placeholder="Search..."> -->
                                <!-- <span class="bx bx-search-alt"></span>
                            </div>
                        </form>  -->

                        @if(auth()->user()->id == 1)
                        <div class="dropdown dropdown-mega d-none d-lg-block ml-2">
                            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                <span key="t-megamenu">Admin Menu</span>
                                <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu dropdown-megamenu">
                                <div class="row">
                                    <div class="col-sm-8">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <h5 class="font-size-14 mt-0" key="t-ui-components">Home.</h5>
                                                <ul class="list-unstyled megamenu-list">
                                                    <li>
                                                        <a href="{{route('users')}}" key="t-lightbox">User Management.</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('allTransactions')}}" key="t-range-slider">All Transactions.</a>
                                                    </li>

                                                    <li>

                                                </ul>
                                            </div>


                                        </div>

                                </div>

                            </div>
                        </div>
                    @endif
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">

                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search input">

                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>s
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-bell bx-tada"></i>
                                <span class="badge bg-danger rounded-pill">{{count(auth()->user()->notifications->where('status','unread'))}}</span>
                            </button>

                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{asset('images/users/avatar-1.jpg')}}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{auth()->user()->name}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('allTransactions')}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                                <a class="dropdown-item" href="{{route('wallet')}}"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Transactions</span></a>
                                <a class="dropdown-item d-block" href=><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ url('/logout') }}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>
                        <div class="topnav" style="background-color:white; ">
                            <div class="container-fluid">
                                <nav class="navbar navbar-light navbar-expand-lg topnav-menu" style="background-color">

                                    <div class="collapse navbar-collapse active" id="topnav-menu-content">
                                        <ul class="navbar-nav active">

                                            <li class="nav-item dropdown">
                                                 <a class="nav-link dropdown-toggle arrow-none" href="{{route('homeDash')}}" id="topnav-dashboard" role="button">
                                                    <i class="bx bx-home-circle me-2"></i><span style="color: #2b6ec5 !important" key="t-dashboards">Dashboard.</span> <div class="arrow-down"></div>
                                                </a>

                                            </li>

                                            @if (auth()->user()->id==1)
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('users')}}" id="topnav-dashboard" role="button">
                                                   <i class="bx bx-home-circle me-2"></i><span style="color: #2b6ec5 !important" key="t-dashboards">Users.</span> <div class="arrow-down"></div>
                                               </a>
                                           </li>
                                                
                                            @endif

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('profile')}}" id="topnav-uielement" role="button">
                                                    <i class="bx bx-tone me-2"></i>
                                                    <span key="t-ui-elements" style="color: #2b6ec5 !important" > Profile</span>
                                                    <div class="arrow-down"></div>
                                                </a>


                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('wallet')}}" id="topnav-pages" role="button">
                                                    <i class="bx bx-customize me-2"></i><span style="color: #2b6ec5 !important" key="t-apps">Transactions.</span> <div class="arrow-down"></div>
                                                </a>

                                            </li>


                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('notifications')}}" id="topnav-more" role="button">
                                                    <i class="bx bx-file me-2"></i><span style="color: #2b6ec5 !important" key="t-extra-pages">Notifications.<span class="badge bg-danger rounded-pill">{{count(auth()->user()->notifications->where('status','unread'))}}</span></span> <div class="arrow-down"></div>

                                                </a>

                                            </li>


                                        </ul>

                                </div>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
