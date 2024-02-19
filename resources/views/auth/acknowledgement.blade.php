<!doctype html>
<html lang="en">

    
<!-- Mirrored from www.themesbrand.com/skote/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:19:06 GMT -->
<head>

        <meta charset="utf-8" />
        <title>Thank You Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Thank You For your interest in Bursary System." name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset ('images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset ('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset ('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset ('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-success bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-success p-4">
                                            <h5 class="text-success">Thanks !! </h5>
                                            <p>Thank You For your interrest in Bursary System.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ asset ('images/profile-img.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index-2.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ asset ('images/logo.svg')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
            
                                        <div class="user-thumb text-center mb-4">
                                            <img src="{{ asset ('images/users/avatar-1.jpg')}}" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                            <h5 class="font-size-15 mt-3">{{$user->name}}</h5>
                                            <small class="muted">{{$user->email}}</small>
                                        </div>
            
                                        <div class="mb-3">
                                            <p>
                                                Your Details and documentation have been sucessfully Submitted to the admin. An <span class="text-success">email</span> has been sent over to <span class="text-info">{{$user->email}}</span> explaining Further.
                                            </p>
                                        </div>
            
                                        <div class="text-end">
                                            <a href="{{route('landingPage')}}" class="btn btn-outline-primary w-md waves-effect waves-light" type="submit"><< Back Home</a>
                                        </div>
    
                                </div>
            
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset ('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset ('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset ('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset ('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset ('libs/node-waves/waves.min.js')}}"></script>
        
        <!-- App js -->
        <script src="{{ asset ('js/app.js')}}"></script>

    </body>

<!-- Mirrored from www.themesbrand.com/skote/layouts/auth-lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:19:06 GMT -->
</html>
