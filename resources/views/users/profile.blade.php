<!doctype html>
<html lang="en">


<head>

        <meta charset="utf-8" />
        <title>Bursary System | User Profile.</title>
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
        <div id="layout-wrapper">
            @if(Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-danger">
                    {{Session::get('success')}}
                </div>
            @endif
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
                                <a class="dropdown-item" href="{{route('wallet')}}"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
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

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('profile')}}" id="topnav-uielement" role="button">
                                                    <i class="bx bx-tone me-2"></i>
                                                    <span key="t-ui-elements" style="color: #2b6ec5 !important" > Profile</span>
                                                    <div class="arrow-down"></div>
                                                </a>


                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('wallet')}}" id="topnav-pages" role="button">
                                                    <i class="bx bx-customize me-2"></i><span style="color: #2b6ec5 !important" key="t-apps">Wallet.</span> <div class="arrow-down"></div>
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


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content " style="margin-top:10px !important;">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard.</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Welcome </a></li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">

                            <div class="col-xl-4" >
                                <div class="class card" style="text-align:center;">
                                    <div class="class card-body" style="min-height:600px !important">
                                        <div class="row" style="text-align:center;">
                                            <div class="col offset-5 mt-4" style="text-center">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="{{asset ('images/users/avatar-1.jpg')}}" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align:center;">
                                            <h4 class="card-title">{{auth()->user()->name}}.</h4>
                                            <p class="card-title-desc">Phone Number:</p>
                                            <p class="card-title-desc">{{auth()->user()->email}}</p>
                                        </div>
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile Details.</a>
                                            <a class="nav-link mb-2" id="v-pills-beneficiaries-tab" data-bs-toggle="pill" href="#v-pills-beneficiaries" role="tab" aria-controls="v-pills-beneficiaries" aria-selected="false">Beneficiary Details.</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal Documents</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Change Password</a>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-xl-8" >
                                    <div class="card">
                                        <div class="card-body" style="min-height:600px !important; border-radius:3px;">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                            <div class="card-header" style="border-radius:3px;">
                                                                <h4 class="card-header">
                                                                    Profile Details
                                                                </h4>
                                                            </div>
                                                            <hr>
                                                            <div class="card-body">
                                                                <h5 >
                                                                    Personal Details :
                                                                </h5>
                                                                <hr>
                                                                <div style="margin-left:3px;">
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Name :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->name}}
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                                <hr>

                                                                <h5 >
                                                                    Contact Details :
                                                                </h5>
                                                                <hr>
                                                                <div style="margin-left:3px;">
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Phone Number :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->phoneNumber}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Location :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->address}}
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                                <hr>

                                                                <h5 >
                                                                    Spouse Details :
                                                                </h5>
                                                                <hr>
                                                                <div style="margin-left:3px;">
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Name :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->spouse->name}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Id Number :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->spouse->idNumber}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Phone Number :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->spouse->phoneNumber}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-md-4 " style="text-align: end">
                                                                            <strong  >
                                                                                Location :
                                                                            </strong>
                                                                        </div>
                                                                        <div class="col-md-8" style="text-align: left">
                                                                            {{auth()->user()->spouse->location}}
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-beneficiaries" role="tabpanel" aria-labelledby="v-pills-beneficiaries-tab">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <h4 class="card-title">Beneficiaries</h4>
                                                                                    <p class="card-title-desc">Here are the beneficiaries registered under you.</p>
                                                                                </div>
                                                                                <div class="col" style="text-align:end;">
                                                                                    <button class="btn btn-outline-primary"> Add Beneficiary </button>
                                                                                </div>
                                                                            </div>
                                            
                                                                            <div class="table-rep-plugin">
                                                                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                                                    <table id="tech-companies-1" class="table table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th data-priority="1" id="tech-companies-1-col-1-clone">Name</th>
                                                                                                <th data-priority="3" id="tech-companies-1-col-2-clone">Index Number</th>
                                                                                                <th data-priority="1" id="tech-companies-1-col-3-clone">Cert Level</th>
                                                                                                <th data-priority="3" id="tech-companies-1-col-4-clone">Result slip</th>
                                                                                                <th data-priority="3" id="tech-companies-1-col-5-clone">Year Of Completion</th>
                                                                                                <th data-priority="6" id="tech-companies-1-col-6-clone">Funding Type</th>
                                                                                                <th data-priority="6" id="tech-companies-1-col-7-clone">Actions.</th>
                                                                                            </tr>
        
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach (auth()->user()->beneficiaries as $beneficiary)
                                                                                                <tr>
                                                                                                    <td data-org-colspan="1" data-priority="1" data-columns="tech-companies-1-col-1">{{$beneficiary->name}}</td>
                                                                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-2">{{$beneficiary->indexNumber}}</td>
                                                                                                    <td data-org-colspan="1" data-priority="1" data-columns="tech-companies-1-col-3">{{$beneficiary->levelOfCert}}</td>
                                                                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-4"><a href="#"> Download</a></td>
                                                                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-5">{{$beneficiary->yrOfCmpltn}}</td>
                                                                                                    <td data-org-colspan="1" data-priority="6" data-columns="tech-companies-1-col-6">{{$beneficiary->fundingLvl}}</td>
                                                                                                    <td data-org-colspan="1" data-priority="6" data-columns="tech-companies-1-col-7"> <button class="btn btn-outline-success"> View Details</button> </td>
                                                                                                </tr>
                                                                                            @endforeach                                                                                        
                                                                      
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                            
                                                                            </div>
                                            
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end col -->
                                                            </div> <!-- end row -->

                                                        </div>

                                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                <div class="card-header">
                                                                    <h4 class="card-title"> Documents</h4>
                                                                    <p class="card-title-desc">These are the documents Submitted.</p>
                                                                </div>

                                                                <hr>

                                                                <div class="card-body">
                                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                                            <span class="d-none d-sm-block">Personal Documents</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                                <!-- Tab panes -->
                                                                <div class="tab-content p-3 text-muted">
                                                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="card border border-success">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title mt-0">Id Document</h5>
                                                                                        <strong class="muted">
                                                                                            Updloaded At:
                                                                                        </strong>
                                                                                        <p class="card-text">{{auth()->user()->created_at}}</p>
                                                                                        <a href="/download/{{auth()->user()->id}}/identification.pdf" type="button" class="btn btn-outline-success btn-sm">Download</a>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card border border-success">
                                                                                    <div class="card-body">
                                                                                    <h5 class="card-title mt-0">Chief's Letter.</h5>
                                                                                        <strong class="muted">
                                                                                            Updloaded At:
                                                                                        </strong>
                                                                                        <p class="card-text">{{auth()->user()->created_at}}</p>
                                                                                        <a href="/download/{{auth()->user()->id}}/profile.jpg" type="button" class="btn btn-outline-success btn-sm">Download</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>  
                                                                </div>
                                                                <!-- Nav tabs -->


                                                                </div>

                                                            </div>
                                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                        <div class="card-header">
                                                                    <h4 class="card-title"> Change Password.</h4>
                                                                    <p class="card-title-desc">Change Password To your account.</p>
                                                                </div>

                                                                <hr>
                                                                @if (session('error'))
                                                                    <div class="alert alert-danger">
                                                                        {{ session('error') }}
                                                                    </div>
                                                                @endif
                                                                @if (session('success'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('success') }}
                                                                    </div>
                                                                @endif

                                                                <div class="card-body">
                                                                    <form action="{{route('changePassword')}}" method="post">
                                                                    {{ csrf_field() }}
                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Enter Old Password <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <input type="password" class="form-control" name="oldPassword" id="horizontal-firstname-input" required>
                                                                        </div>
                                                                        @if ($errors->has('oldPassword'))
                                                                            <span class="help-block text-danger mt-2">
                                                                                <strong>{{ $errors->first('oldPassword') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Enter New Password <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <input type="password" class="form-control" name="newPassword" id="horizontal-firstname-input" required>
                                                                        </div>
                                                                        @if ($errors->has('newPassword'))
                                                                            <span class="help-block text-danger mt-2">
                                                                                <strong>{{ $errors->first('newPassword') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="row mb-4">
                                                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Confirm New Password <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-9">
                                                                            <input type="password" class="form-control" name="newPasswordConf" id="horizontal-firstname-input" required>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-3 offset-9" style="float:right;">
                                                                            <button type="submit" class="btn btn-outline-success btn-small">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card -->
                                </div>

                        </div>








                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Bursary System..
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset ('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset ('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset ('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset ('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset ('libs/node-waves/waves.min.js')}}"></script>

        <!-- apexcharts -->
        <script src="{{asset ('libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset ('js/pages/dashboard.init.js')}}"></script>


        <!-- Responsive Table js -->
        <script src="assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

        <!-- Init js -->
        <script src="assets/js/pages/table-responsive.init.js"></script>

        <script src="{{asset ('js/app.js')}}"></script>
    </body>

<!-- Mirrored from www.themesbrand.com/skote/layouts/layouts-hori-preloader.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:03:24 GMT -->
</html>
