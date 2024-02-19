<!doctype html>
<html lang="en">

    
<!-- Mirrored from www.themesbrand.com/skote/layouts/pages-comingsoon.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:24 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Inactive Account.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset ('images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset ('css/bootstrap.min.css ')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset ('css/icons.min.css ')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset ('css/app.min.css ')}}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        

        <div class="my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif
                    <div class="col-lg-12">
                        <div class="text-center">
                            
                            <div class="row justify-content-center mt-5">
                                <h2> Prestige Bank and Trust.</h2>
                                <p>
                                    Dear {{(auth()->user()->name)}},
                                </p>
                                <div class="col-sm-4">
                                    <div class="maintenance-img">
                                        <img src="{{asset ('images/coming-soon.svg' )}}" alt="" class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('logout')}}" type="button" class="btn btn-outline-primary">
                                Logout
                            </a>
                            <h6 class="mt-5"><br> Please Activate Your account. </h6>
                            <p class="text-muted"> Bursary System. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{asset ('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset ('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset ('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset ('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset ('libs/node-waves/waves.min.js')}}"></script>

        <!-- Plugins js-->
        <script src="{{asset ('libs/jquery-countdown/jquery.countdown.min.js')}}"></script>

        <!-- Countdown js -->
        <script src="{{asset ('js/pages/coming-soon.init.js')}}"></script>

        <script src="{{asset ('js/app.js')}}"></script>

    </body>

<!-- Mirrored from www.themesbrand.com/skote/layouts/pages-comingsoon.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:28 GMT -->
</html>
