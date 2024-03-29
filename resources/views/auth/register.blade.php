<!doctype html>
<html lang="en">

    
<!-- Mirrored from www.themesbrand.com/Welcome new/layouts/auth-register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:18 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Register | Bursary System. services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
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
                                                    
                                                    <h4 class="mb-3" style="color:white"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i>Your World Wide Banking Partner.</h4>
                                                    
                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" Fantastic theme with a ton of options. If you just want the HTML to integrate with your project, then this is the package. You can find the files in the 'dist' folder...no need to install git and all the other stuff the documentation talks about. "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                        <p class="font-size-14 mb-0">- Welcome new User</p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
    
                                                            <div class="item">
                                                                <div class="py-3">
                                                                    <p class="font-size-16 mb-4">" If Every Vendor on Envato are as supportive as Themesbrand, Development with be a nice experience. You guys are Wonderful. Keep us the good work. "</p>
    
                                                                    <div>
                                                                        <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                        <p class="font-size-14 mb-0">- Welcome new User</p>
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
                                            <h5 class="text-primary">Register account</h5>
                                            <p class="text-muted">Register and Start Transactingtoday.</p>
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
                                            <form class="needs-validation" method="post" novalidate action="{{route('firstRegistration')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" name="name" id="username" placeholder="Enter username" required>
                                                    <div class="invalid-feedback">
                                                        Please Enter Username
                                                    </div>  
                                                </div>    

                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" id="useremail" placeholder="Enter email" required>  
                                                    <div class="invalid-feedback">
                                                        Please Enter Email
                                                    </div>        
                                                </div>
                        
                                               
                        

                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01">Upload Identification Documents</label>
                                                    <input type="file" class="form-control" name= "idDocument" id="inputGroupFile01">
                                                </div>

                                                <div>
                                                    <p class="mb-0">By registering you agree to the Bursary System. <a href="#" class="text-primary">Terms of Use</a></p>
                                                </div>
                                                
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Register</button>
                                                </div>
                    


                                            </form>

                                            <div class="mt-5 text-center">
                                                <p>Already have an account ? <a href="{{route('login')}}" class="fw-medium text-primary"> Login</a> </p>
                                            </div>
        
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Bursary System.. </p>
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

        <!-- validation init -->
        <script src="{{ asset ('js/pages/validation.init.js')}}"></script>

        <!-- auth-2-carousel init -->
        <script src="{{ asset ('js/pages/auth-2-carousel.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset ('js/app.js')}}"></script>

    </body>

<!-- Mirrored from www.themesbrand.com/Welcome new/layouts/auth-register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:18 GMT -->
</html>
