<!doctype html>
<html lang="en">


<!-- Mirrored from www.themesbrand.com/skote/layouts/auth-two-step-verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:20 GMT -->
<head>

    <meta charset="utf-8" />
    <title>One Time Pasword Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Verify the One time Password sent to {{auth()->user()->email}}" name="description" />
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5 text-muted">
                        <!-- <a href="index-2.html" class="d-block auth-logo">
                            <img src="{{ asset ('images/logo-dark.png')}}" alt="" height="20" class="auth-logo-dark mx-auto">
                            <img src="{{ asset ('images/logo-light.png')}}" alt="" height="20" class="auth-logo-light mx-auto">
                        </a> -->
                        <h4>Bursary System.</h4>
                        <p class="mt-3">Bursary System. International</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">

                        <div class="card-body">

                            <div class="p-2">
                                <div class="text-center">

                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light">
                                            <i class="bx bxs-envelope h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 mt-4">

                                        <h4>Verify your email</h4>
                                        <p class="mb-5">Please enter the 6 digit code sent to <span
                                                class="font-weight-semibold">{{auth()->user()->email}}</span>
                                        </p>
                                    @if(Session::has('fail'))
                                        <div class="alert alert-danger">
                                        {{Session::get('fail')}}
                                        </div>
                                    @endif
                                    <form action="{{route('checkOtp')}}" method="post">
                                        @csrf
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit1-input" class="visually-hidden">Dight 1</label>
                                                        <input type="text"
                                                            class="form-control form-control-lg text-center"
                                                            onkeyup="moveToNext(this, 2)" maxLength="1"
                                                            id="digit1-input"name='otp[]'>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit2-input" class="visually-hidden">Dight 2</label>
                                                        <input type="text"
                                                            class="form-control form-control-lg text-center"
                                                            onkeyup="moveToNext(this, 3)" maxLength="1"
                                                            id="digit2-input" name='otp[]'>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit3-input" class="visually-hidden">Dight 3</label>
                                                        <input type="text"
                                                            class="form-control form-control-lg text-center"
                                                            onkeyup="moveToNext(this, 4)" maxLength="1"
                                                            id="digit3-input" name='otp[]'>
                                                    </div>
                                                </div>

                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                        <input type="text"
                                                            class="form-control form-control-lg text-center"
                                                            onkeyup="moveToNext(this, 5)" maxLength="1"
                                                            id="digit4-input" name='otp[]'>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                        <input type="text"
                                                            class="form-control form-control-lg text-center"
                                                            onkeyup="moveToNext(this, 6)" maxLength="1"
                                                            id="digit4-input" name='otp[]'>
                                                    </div>
                                                </div> <div class="col-2">
                                                    <div class="mb-3">
                                                        <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                        <input type="text"
                                                            class="form-control form-control-lg text-center"
                                                            onkeyup="moveToNext(this, 6)" maxLength="1"
                                                            id="digit4-input" name='otp[]'>
                                                    </div>
                                                </div>
                                            </div>


                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-outline-success w-md">Confirm</button>
                                        </div>
                                    </div>
                                </form>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>©
                            2023 Bursary System..</p>
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

    <!-- two-step-verification js -->
    <script src="{{ asset ('js/pages/two-step-verification.init.js')}}"></script>

    <!-- App js -->
    <script src="{{ asset ('js/app.js')}}"></script>
</body>


<!-- Mirrored from www.themesbrand.com/skote/layouts/auth-two-step-verification.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:09:21 GMT -->
</html>
