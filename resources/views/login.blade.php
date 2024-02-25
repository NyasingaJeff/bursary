<!doctype html>
<html lang="en">

    
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

        {{-- toastr --}}
        <link href="{{ asset ('css/toastr.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

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
                                                    
                                                    <h4 class="mb-3" style="color:white;">Bursary Management System</h4>
                                                    
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
                                            <h5 class="text-primary">Welcome.</h5>
                                            <p class="text-muted">Sign in to Apply.</p>
                                        </div>
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                {{Session::get('success')}}
                                            </div>
                                        @endif
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
                                                    <label for="username" class="form-label">Id Number</label>
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Your Id Number." >

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

                                                <div class="mt-3 d-grid">
                                                    <button type="button" class="btn btn-outlne-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"> <span class="text-success"> Do not have an account? </span> <br> Create An account</button>

                                                </div>                 

                                            </form>
                                            <div class="mt-5 text-center">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0"> Bursary Management System. <br>© <script>document.write(new Date().getFullYear())</script></p>
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
        <!-- Modal -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myLargeModalLabel">User Registration</h5>
                        <button type="button" class="btn-close" id="userRegClose" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('firstRegistration')}}" enctype="multipart/form-data" autocomplete="off" id='registration'>
                            @csrf
                            <input type="text" id="active" name="accountStatus" value="inactive" hidden >
                        <div class="col-lg-12">
                            <div id="basic-example">

                                <!-- Student Details -->
                                <h3>Student</h3>
                                <section class="check">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">First Name</label>
                                                <input type="text" class="form-control" name="sfName" id="basicpill-firstname-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-lastname-input">Middle Name</label>
                                                <input type="text" class="form-control" name="smName" id="basicpill-lastname-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-lastname-input">Last Name</label>
                                                <input type="text" class="form-control" name="slName" id="basicpill-lastname-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input">Date Of Birth.</label>
                                                <input class="form-control" type="date" id="stDobInput" name="stDob"  >
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input">Certificate Level.</label>
                                                <select class="form-select" name='cert'>
                                                    <option >Level</option>
                                                    {{-- <option value="notApllicable" >None</option> --}}
                                                    <option value="primary" >K.C.P.E</option>
                                                    <option value="Secondary" >K.C.S.E</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input">Year Of Completion.</label>
                                                <input class="form-control" type="date"  name="yOfComplt"  id="example-date-input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="stdIdDets">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input">Index Number</label>
                                                <input type="text" name="indexNumber" class="form-control fieldValidate" target="beneficiary" id="basicpill-pancard-input">
                                                <div class="inputErrMesage">
                                                    The Index Number Already Exists.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input">Results Slip.</label>
                                                <input type="file" class="form-control" name="resultSlip" id="basicpill-vatno-input">
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input">Funding Level Or Type.</label>
                                                <select class="form-select" name='fundType'>
                                                    <option >Funding Level</option>
                                                    <option value="county" >County Bursary Fund</option>
                                                    <option value="ward" >Ward Bursary Fund</option>
                                                    <option value="wingsToFly" >Wings To Fly ( Equity Group Fundation )</option>
                                                    <option value="kcb" >KCB Foundation</option>
                                                    <option value="others" >Others</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="countyChanger" >County Of Examination</label>
                                                <input class="form-control " list="countyList" name="eCounty" id="countyChanger" target="subCounty" placeholder="Type to search...">
                                                <datalist id="countyList" class="county" target="subCounty" >

                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="eSubcounty" >Subcounty Of Examination</label>
                                                <input class="form-control" list="subCountyList" name="eSubcounty"  placeholder="Type to search...">
                                                <datalist id="subCountyList" class="subCounty">
  
                                                </datalist>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" >Ward Of Examination</label>
                                                <input type="text" name="eWard" class="form-control" id="basicpill-pancard-input">
                                            </div>
                                        </div>
                                    </div>

                                </section>
                                <!-- Seller Details -->
                                    <h3 class="parent">Father's</h3>

                                    <section class="check parent">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input">First Name</label>
                                                    <input type="text" class="form-control" name="fName" id="basicpill-firstname-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">Middle Name</label>
                                                    <input type="text" class="form-control" name="mName" id="basicpill-lastname-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">Last Name</label>
                                                    <input type="text" class="form-control" name="lName" id="basicpill-lastname-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">Phone Number</label>
                                                    <input type="text" class="form-control fphoneNumber fieldValidate" target="all" id="fPhoneNumber" name="phoneNumber" id="basicpill-phoneno-input">
                                                    <div class="inputErrMesage">
                                                        The Phone Number Already Exists.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Id Number</label>
                                                    <input type="text"name="idNumber"  class="form-control fidNumber  fieldValidate" target="all" id="basicpill-email-input">
                                                    <div class="inputErrMesage">
                                                        The ID Number Already Exists.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="fatherDetails">
                                            <div class="row ">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input">Scanned ID  <small class="text-success">Front</small></label>
                                                        <input type="file" class="form-control"  name="fidScan" id="basicpill-email-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input">Scanned ID <small class="text-info" >Back</small></label>
                                                        <input type="file" class="form-control"  name="bidScan" id="basicpill-email-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="exampleDataList" >County Of Origin</label>
                                                        <input class="form-control " target="fsubCountylist" list="fcountyList" name="fcounty" id="fcountyChanger" placeholder="Type to search...">
                                                        <datalist id="fcountyList" class="county"  >
        
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="exampleDataList" >Subcounty Of Origin</label>
                                                        <input class="form-control" list="fsubCountylist" name="fsubcounty" id="exampleDataList" placeholder="Type to search...">
                                                        <datalist id="fsubCountylist" class='fsubCountylist'>
          
                                                            </option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-pancard-input" >Ward Of Origin</label>
                                                        <input type="text" name="fward" class="form-control" id="basicpill-pancard-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </section>

                                    <h3 class="parent">Mother's</h3>

                                    <section class="check parent">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input">First Name</label>
                                                    <input type="text" class="form-control" name="mfName" id="basicpill-firstname-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">Middle Name</label>
                                                    <input type="text" class="form-control" name="mMName" id="basicpill-lastname-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input">Last Name</label>
                                                    <input type="text" class="form-control" name="mlName" id="basicpill-lastname-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-phoneno-input">Phone Number</label>
                                                    <input type="text" class="form-control mphoneNumber fieldValidate"  name="mphoneNumber" target="all" id="basicpill-phoneno-input">
                                                    <div class="inputErrMesage">
                                                        The Phone Number Already Exists.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-email-input">Id Number</label>
                                                    <input type="text"name="midNumber" class="form-control midNumber fieldValidate" target="all" id="basicpill-email-input">
                                                    <div class="inputErrMesage">
                                                        The Id Number Already Exists.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>   
                                        <div id="motherDetails">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input">Scanned ID  <small class="text-success">Front</small></label>
                                                        <input type="file" class="form-control"  name="mFidScan" id="basicpill-email-input">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="basicpill-email-input">Scanned ID <small class="text-info" >Back</small></label>
                                                        <input type="file" class="form-control"  name="mBidScan" id="basicpill-email-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="exampleDataList" >County Of Origin</label>
                                                        <input class="form-control " target="msubcountylist" list="mcountyList" name="mcounty" id="mcountyChanger" placeholder="Type to search...">
                                                        <datalist id="mcountyList" class="county">
        
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="exampleDataList" >Subcounty Of Origin</label>
                                                        <input class="form-control" list="msubcountylist" name="msubcounty" id="exampleDataList" placeholder="Type to search...">
                                                        <datalist id="msubcountylist" class='msubcountylist'>
          
                                                            </option>
                                                        </datalist>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="basicpill-pancard-input" >Ward Of Origin</label>
                                                        <input type="text" name="mward" class="form-control" placeholder="" id="basicpill-pancard-input">
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>                               

                                    </section>


                                    <!-- Bank Details -->
                                    <h3>Others</h3>
                                    <section class="true check">

                                        <div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="basicpill-namecard-input">Scanned Copy Of Chief's Letter</label>
                                                        <input type="file" name="chiefsLttr" class="form-control" id="basicpill-namecard-input">
                                                    </div>
                                                </div>

                                        </div>
                                    </section>
                                <!-- Confirm Details -->
                                <h3>Confirmation</h3>
                                <section class="true check">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <address>
                                                                <strong class='text-primary'>Student Information.</strong><br>
                                                                Name: <span class="inpOhlDr" id='sfName' ></span> <span class="inpOhlDr" id='smName' ></span> <span class="inpOhlDr" id='slName' ></span><br>
                                                                Date Of Birth: <span class="inpOhlDr" id='stDob' ></span><br>
                                                                {{-- Id Number: 1234<br> --}}
                                                            </address>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <address>
                                                                <strong class='text-primary'>Examinations Information.</strong><br>
                                                                Year Of Completion: <span class="inpOhlDr" id='yOfComplt' ></span><br>
                                                               Level Of Certification: <span class="inpOhlDr" id='cert' ></span><br>
                                                               Index Number: <span class="inpOhlDr" id='indexNumber' ></span> <br>
                                                               Funding Level: <span class="inpOhlDr" id='fundType' ></span> <br>
                                                            </address>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <address class="mt-2 mt-sm-0">
                                                                <strong class='text-primary'>Examination Location:</strong><br>
                                                                County :<span class="inpOhlDr" id='eCounty' ></span><br>
                                                                Sucounty: <span class="inpOhlDr" id='eSubcounty' ></span><br>
                                                                Ward: <span class="inpOhlDr" id='eWard' ></span><br>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 mt-3">
                                                            <address>
                                                                <strong class='text-primary'>Father Information.</strong><br>
                                                                Name : <span class="inpOhlDr" id='fName' ></span> <span class="inpOhlDr" id='mName' ></span> <span class="inpOhlDr" id='lName' ></span><br>
                                                                ID Number : <span class="inpOhlDr" id='idNumber' ></span><br>
                                                                Phone Number : <span class="inpOhlDr" id='phoneNumber' ></span><br>
                                                                Location : <span class="inpOhlDr" id='fcounty' ></span> , <span class="inpOhlDr" id='fsubcounty' ></span>, <span class="inpOhlDr" id="fward" ></span><br>
                                                            </address>
                                                        </div>
                                                        <div class="col-sm-4 mt-3">
                                                            <address>
                                                                <strong class='text-primary'>Mother Information.</strong><br>
                                                                Name : <span class="inpOhlDr" id='mfName' ></span> <span class="inpOhlDr" id='mMName' ></span> <span class="inpOhlDr" id='mlName' ></span><br>
                                                                ID Number : <span class="inpOhlDr" id='midNumber' ></span> <br>
                                                                Phone Number : <span class="inpOhlDr" id='mphoneNumber' ></span> <br>
                                                                Location :  <span class="inpOhlDr" id='mward' ></span> ,  <span class="inpOhlDr" id='msubcounty' ></span> ,  <span class="inpOhlDr" id='mcounty' ></span><br>
                                                            </address>
                                                        </div>
                                                        <div class="col-sm-4 mt-3 ">
                                                            <address>
                                                                <strong class='text-primary'>Other Information:</strong><br>
                                                                October 16, 2019<br><br>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="form-check form-checkbox-outline form-check-warning mb-3">
                                                            <input class="form-check-input" type="checkbox" id="customCheckcolor4" >
                                                                <label class="form-check-label" for="customCheckcolor4">
                                                                    Approve.
                                                                </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- otp-->
                                <h3> <br> OTP</h3>
                                <section class="true check">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6">
                                            <div class="text-center">
                                            <div class="text-center">
                                                <div class="avatar-md mx-auto">
                                                    <div class="avatar-title rounded-circle bg-light">
                                                        <i class="bx bxs-envelope h1 mb-0 text-primary"></i>
                                                    </div>
                                                </div>
                                                <div class="p-2 mt-4">
                                                    <button class="btn btn-outline-primary" id="otpB"> Request OTP</button>
                                                   <p class="mb-5 " id='otpParagraph1'  >Please enter the 4 digit code sent to <br> <span id="phoneNumber2" class="font-weight-semibold"></span></p>
                                                        <div class="row " id='otpParagraph2'>
                                                            <div class="col-3">
                                                                <div class="mb-3">
                                                                    <label for="digit1-input" class="visually-hidden">Dight 1</label>
                                                                    <input type="text" class="form-control form-control-lg text-center skipper"  maxlength="1" id="digit1-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-3">
                                                                <div class="mb-3">
                                                                    <label for="digit2-input" class="visually-hidden">Dight 2</label>
                                                                    <input type="text" class="form-control form-control-lg text-center skipper"  maxlength="1" id="digit2-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-3">
                                                                <div class="mb-3">
                                                                    <label for="digit3-input" class="visually-hidden">Dight 3</label>
                                                                    <input type="text" class="form-control form-control-lg text-center skipper"  maxlength="1" id="digit3-input">
                                                                </div>
                                                            </div>

                                                            <div class="col-3">
                                                                <div class="mb-3">
                                                                    <label for="digit4-input" class="visually-hidden">Dight 4</label>
                                                                    <input type="text" class="form-control form-control-lg text-center skipper"  maxlength="1" id="digit4-input">
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                 <!-- Activation-->
                                 <h3>Activation</h3>
                                 <section>
                                     <div class="row justify-content-center">
                                         <div class="col-lg-6">
                                             <div class="text-center">
                                             <div class="text-center">
                                                 <div class="avatar-md mx-auto">
                                                     <div class="avatar-title rounded-circle bg-light">
                                                         <i class=" bx bx-money  h1 mb-0 text-success"></i>
                                                     </div>
                                                 </div>
                                                 <div class="p-2 mt-4">
                                                    <p class="mb-2 " id='otpParagraph1'  >To activate to your account, you need to pay 100 ksh.<br>You can choose to activate now or later <br>The Stk Will be sent to:</p>
                                                    <div class="mb-3">
                                                        <input type="text"  class="form-control" id="mpesaPhoneNo">
                                                    </div>
                                                    <button class="btn btn-outline-success" id="mpesaStk"> Activate Now</button>
                                                     <button class="btn btn-outline-warning" id="mpesaLater">Activate later</button>
                                                 </div>
 
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </section>
                            </div>
                        </div>
                        <!-- end col -->
                        
                    </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- temp Otp -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
             <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mySmallModalLabel">Validate Account creation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Please enter the otp Sent to <span>id Number</span> to complete the registration</p>
                        <div class="row justify-content-center">
                            <div class="">
                                <div class="text-center">
                                <div class="text-center">
                                    <div class="avatar-md mx-auto">
                                        <div class="avatar-title rounded-circle bg-light sm">
                                            <i class="bx bxs-envelope h1 mb-0 text-primary"></i>
                                        </div>
                                    </div>
                                    <div class="p-2 mt-4">
                                            <div class="row " id='otpParagraph2'>
                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit5-input" class="visually-hidden">Dight 1</label>
                                                        <input type="text" class="form-control form-control-lg text-center tempOtpSkipper"  maxlength="1" id="digit5-input">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit6-input" class="visually-hidden">Dight 2</label>
                                                        <input type="text" class="form-control form-control-lg text-center tempOtpSkipper"  maxlength="1" id="digit6-input">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit7-input" class="visually-hidden">Dight 3</label>
                                                        <input type="text" class="form-control form-control-lg text-center tempOtpSkipper"  maxlength="1" id="digit7-input">
                                                    </div>
                                                </div>

                                                <div class="col-3">
                                                    <div class="mb-3">
                                                        <label for="digit8-input" class="visually-hidden">Dight 4</label>
                                                        <input type="text" class="form-control form-control-lg text-center tempOtpSkipper"  maxlength="1" id="digit8-input">
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-primary btn-sm waves-effect waves-light" disabled>
                                                <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Resend Otp
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-outline-danger btn-sm" style="float: right;">Cancel</button>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" style="display: none" id="tempOtpBtn" data-bs-target=".bs-example-modal-sm"></button>

        {{-- this Hidden formwill handle the submission of the beneficiary without having to refresh the page --}}
        <form action="{{route('beneficiaryRegistration')}}" id="benefReg" method="post" style="display: none" enctype="multipart/form-data"> 
            @csrf
            <input type="text"name="mainId" id="mainId">
        </form>
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

        



        <!-- jquery step -->
        <script src="{{asset('libs/jquery-steps/build/jquery.steps.min.js')}}"></script>

        <!-- form wizard init -->
        <script src="{{asset('js/pages/form-wizard.init.js')}}"></script>

        <script src="{{asset('js/toastr.min.js')}}"></script>

        <script src="{{asset('js/app.js')}}"></script>

        @include('layouts.js')
        @include('layouts.css')

    </body>

</html>
