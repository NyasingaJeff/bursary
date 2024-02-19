<!doctype html>
<html lang="en">

    
<!-- Mirrored from www.themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:16 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Bursary Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="The online Money Transfer Market." name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset ('images/favicon.ico')}}">

        <!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset ('libs/owl.carousel/assets/owl.carousel.min.css')}}">

        <link rel="stylesheet" href="{{ asset ('libs/owl.carousel/assets/owl.theme.default.min.css')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset ('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset ('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset ('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    
                    <div class="col-xl-9">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">
    
                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">
                                                <div class="text-center">
                                                    
                                                    <h4 class="mb-3" style="color:white;"><i class="bx bxs-quote-alt-left  h1 align-middle me-3"></i>Online Bursary Application</h4>
                                                    
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">WelCome</h4>
                                                                        <p class="font-size-14 mb-0">- User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
    
                                                            <div class="item">
                                                                <div class="py-3">
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                        <p class="font-size-14 mb-0">- Prestige User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                              
                                    <div class="my-auto">
                                        
                                        <div>
                                            <h5 class="text-primary">Welcome Back !</h5>
                                            <p class="text-muted">Sign in to Continue Transacting.</p>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif            
                                        <div class="mt-4">
                                            <form action="{{ route ('login')}}" method="post">
                                            @csrf
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter username">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <div class="float-end">
                                                        <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
                                                    </div>
                                                    <label class="form-label">Password</label>
                                                    <div class="input-group auth-pass-inputgroup">
                                                        <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button"  id="password-addon"><i class="mdi mdi-eye-outline"></i></button>

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                        
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="remember-check">
                                                    <label class="form-check-label" for="remember-check">
                                                        Remember me
                                                    </label>
                                                </div>
                                                
                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                    


                                            </form>
                                            <div class="mt-5 text-center">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Bursary System.. .</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset ('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset ('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset ('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset ('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset ('libs/node-waves/waves.min.js')}}"></script>

        <!-- owl.carousel js -->
        <script src="{{ asset ('libs/owl.carousel/owl.carousel.min.js')}}"></script>

        <!-- auth-2-carousel init -->
        <script src="{{ asset ('js/pages/auth-2-carousel.init.js')}}"></script>
        
        <!-- App js -->
        <script src="{{ asset ('js/app.js')}}"></script>

    </body>

<!-- Mirrored from www.themesbrand.com/skote/layouts/auth-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:17 GMT -->
</html>
