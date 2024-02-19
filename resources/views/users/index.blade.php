@include('layouts.header')


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                <div class="container-fluid">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Users</h4>
                                        <p class="card-title-desc">All Users Registered In The System</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-outline-success offset-8" data-bs-toggle="modal" data-bs-target=".clientRegistration">Register New Client</button>
                                    </div>

                                </div>


                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab" aria-selected="true">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Active User Account.</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#dormant" role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Dormant User Accounts</span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab" aria-selected="false">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Inactive User Accounts.</span>
                                        </a>
                                    </li>




                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                                    <h4 class="card-title">Active Users</h4>
                                                                    <p class="card-title-desc">These Are All The Active Registered Users In The system.</p>


                                                            <div class="table-rep-plugin">
                                                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                                    <table id="tech-companies-1" class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th data-priority="1">Location</th>
                                                                            <th data-priority="3">Last Transaction Time</th>
                                                                            <th data-priority="1">Total Transactions.</th>
                                                                            <th data-priority="3">Total Completed Transactions.</th>
                                                                            <th data-priority="3">Total Pending Transactions.</th>
                                                                            <th data-priority="6">Total Revenue Transacted.</th>

                                                                            Client    </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse($users['activeUsers'] as $activeUser)
                                                                            <tr>
                                                                                <th>{{ucfirst($activeUser->name)}} </th>
                                                                                <td>{{$activeUser->location}} </td>
                                                                                <td>{{count($activeUser->transactions)==0 ? 'No transactions yet': ($activeUser->transactions->last()->created_at)}}</td>
                                                                                <td>{{count($activeUser->transactions)==0 ? 'No transactions yet': count($activeUser->transactions) }}</td>
                                                                                <td>{{count($activeUser->transactions->where('status','complete')) ==0  ? 'No complete transactions yet': count($activeUser->transactions->where('status','complete'))  + count($activeUser->transactions->where('status','rejected')) }}</td>
                                                                                <td>{{count($activeUser->transactions->where('status','pending')) ==0  ? 'No pending transactions yet': count($activeUser->transactions->where('status','pending')) + count($activeUser->transactions->where('status','onHold')) }}</td>
                                                                                <td>${{array_sum($activeUser->transactions->where('status','pending')->pluck('amount')->toArray()) + array_sum($activeUser->transactions->where('status','onHold')->pluck('amount')->toArray())}}</td>
                                                                            </tr>
                                                                            @empty
                                                                                <tr scope="row">>
                                                                                    There Aren't Any Active users Yet.
                                                                                </tr>
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->.
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="dormant" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Dormant User Accounts.</h4>
                                                            <p class="card-title-desc">These Are The Dormant User Accounts.</p>

                                                            <div class="table-rep-plugin">
                                                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                                    <table id="tech-companies-1" class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Name.</th>
                                                                            <th data-priority="1">Location</th>
                                                                            <th data-priority="3">Last Transaction Time</th>
                                                                            <th data-priority="1">Total Transactions.</th>
                                                                            <th data-priority="3">Total Completed Transactions.</th>
                                                                            <th data-priority="3">Total Pending Transactions.</th>
                                                                            <th data-priority="6">Total Revenue Transacted.</th>
                                                                            <th data-priority="6">Total Pending Transactions.</th>

                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <tbody>
                                                                            @forelse($users['dormantUsers'] as $dormantUser)
                                                                            <tr>
                                                                            <th>{{ucfirst($dormantUser->name)}} </th>
                                                                                <td>{{$dormantUser->location}} </td>
                                                                                <td>{{count($dormantUser->transactions)==0 ? 'No transactions yet': ($dormantUser->transactions->last()->created_at)}}</td>
                                                                                <td>{{count($dormantUser->transactions)==0 ? 'No transactions yet': count($dormantUser->transactions) }}</td>
                                                                                <td>{{count($dormantUser->transactions->where('status','complete')) ==0  ? 'No complete transactions yet': count($dormantUser->transactions->where('status','complete'))  + count($dormantUser->transactions->where('status','rejected')) }}</td>
                                                                                <td>{{count($dormantUser->transactions->where('status','pending')) ==0  ? 'No pending transactions yet': count($dormantUser->transactions->where('status','pending')) + count($dormantUser->transactions->where('status','onHold')) }}</td>
                                                                                <td>${{array_sum($dormantUser->transactions->where('status','pending')->pluck('amount')->toArray()) + array_sum($dormantUser->transactions->where('status','onHold')->pluck('amount')->toArray())}}</td>
                                                                                <td>${{array_sum($dormantUser->transactions->where('status','complete')->pluck('amount')->toArray()) + array_sum($dormantUser->transactions->where('status','rejected')->pluck('amount')->toArray())}}</td>
                                                                            </tr>
                                                                            @empty
                                                                                <tr scope="row">>
                                                                                    There Are'nt Any Dormant Users Yet.
                                                                                </tr>
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="profile1" role="tabpanel">
                                        <p class="mb-0">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title">Inactive User Accounts.</h4>
                                                            <p class="card-title-desc">These Are The Inactive User Accounts.</p>

                                                            <div class="table-rep-plugin">
                                                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                                    <table id="tech-companies-1" class="table table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Name.</th>
                                                                            <th data-priority="1">Location.</th>
                                                                            <th data-priority="3">Application Date.</th>
                                                                            <th data-priority="3">Documents.</th>
                                                                            <th data-priority="3">Actions.</th>


                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @forelse($users['inactiveUsers'] as $inactiveUser)
                                                                            <tr>
                                                                                {{-- @dump($inactiveUser) --}}
                                                                                <th>{{ucfirst($inactiveUser->name)}} </th>
                                                                                <th>{{$inactiveUser->address}} </th>
                                                                                <td>{{$inactiveUser->created_at}} </td>
                                                                                <td>
                                                                                    <button type="button" class="btn btn-outline-success btn-sm  waves-effect waves-light" >
                                                                                        View Details
                                                                                    </button>
                                                                                </td>
                                                                                <td>
                                                                                    <a data-bs-toggle="modal" class="text-danger" data-bs-target="#clientRejection{{$inactiveUser->id}}" href="#clientRejection{{$inactiveUser->id}}"><i class=" bx bx-x-circle "></i> Delete. </a>

                                                                                </td>
                                                                            </tr>
                                                                            @empty
                                                                                <tr scope="row">
                                                                                    <td>
                                                                                    There Are'nt Any Inactive users Yet.
                                                                                    </td>
                                                                                    <td>
                                                                                    There Are'nt Any Inactive users Yet.
                                                                                    </td>
                                                                                    <td>
                                                                                    There Are'nt Any Inactive users Yet.
                                                                                    </td>
                                                                                    <td>
                                                                                    There Are'nt Any Inactive users Yet.
                                                                                    </td>
                                                                                    <td>
                                                                                    There Are'nt Any Inactive users Yet.
                                                                                    </td>
                                                                                </tr>
                                                                            @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </p>
                                    </div>



                                </div>

                            </div>
                        </div>


                    </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


                <!--Client Registration Modal -->
                <div class="modal fade transaction-detailModal clientRegistration" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Register New User.</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="col-xl-12">
                            <form class="needs-validation" method="post" novalidate action="{{route('firstRegistration')}}" enctype="multipart/form-data" >
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <span>{{ $error }}</span><br>
                                            @endforeach
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="formrow-firstname-input" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-email-input" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="formrow-email-input" name="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="formrow-email-input" class="form-label">Passport Number</label>
                                            <input type="text" class="form-control" id="formrow-email-input" name="passportNumber" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-email-input" class="form-label">Account Number</label>
                                            <input type="text" class="form-control" id="formrow-email-input" name="accNumber" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formrow-email-input" class="form-label">Minimum Balance</label>
                                            <input type="text" class="form-control" id="formrow-email-input" name="minBalance" >
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="formrow-inputCity" name='country'>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputState" class="form-label">City or State</label>
                                            <select name="city" id="formrow-inputState" class="form-select" >
                                                <option selected="" >Choose...</option>
                                                <option value='Nairobi'>Nairobi</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputZip" class="form-label">Zip</label>
                                            <input type="text" class="form-control" id="formrow-inputZip" name='zip'>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload Passport</label>
                                        <input type="file" class="form-control" name= "idDocument" id="inputGroupFile01">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload  Photo</label>
                                        <input type="file" class="form-control" name= "passport" id="inputGroupFile02">
                                    </div>
                                </div> <!-- end row -->

                                </div>
                                </div>
                                <div class="modal-footer">
                                <div>
                                        <button type="submit" class="btn btn-outline-primary w-md">Submit</button>
                                    </div>
                            </form>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- end modal -->


                @foreach($users['inactiveUsers'] as $inactiveUser)
                <!--Client rejection Modal -->
                <div class="modal fade transaction-detailModal clientRejection{{$inactiveUser->id}}" id="clientRejection{{$inactiveUser->id}}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="transaction-detailModalLabel">Rejection SMS Form.</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="col-xl-12">
                                    <p> Please Enter the main reason For Rejecting the Client.</p>
                                    <form action="{{route('rejectClient',$inactiveUser->id)}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="message" placeholder="Reasons..." id="floatingTextarea"></textarea>
                                                <label  for="floatingTextarea"> &nbsp; Reasons</label>
                                            </div>
                                       </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-outline-warning w-md">Submit</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                </div>
                <!-- end modal -->
                @endforeach



        <!-- Footer start -->
        <footer class="landing-footer">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Company</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">ss</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Resources</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Whitepaper</a></li>
                                <li><a href="#">Token sales</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Links</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="#">Tokens</a></li>
                                <li><a href="#">Roadmap</a></li>
                                <li><a href="#">ss</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
                <!-- end row -->

                <hr class="footer-border my-5">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <!-- <img src="{{asset ('images/logo-light.png')}}" alt="" height="20"> -->
                        </div>

                        <p class="mb-2"><script>document.write(new Date().getFullYear())</script> © Bursary System.. </p>
                    </div>

                </div>
            </div>
            <!-- end container -->
        </footer>
        <!-- Footer end -->
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->




        <!-- JAVASCRIPT -->
        <script src="{{ asset ('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset ('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset ('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset ('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset ('libs/node-waves/waves.min.js')}}"></script>

        <!-- Responsive Table js -->
        <script src="{{ asset ('libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>

        <!-- Init js -->
        <script src="{{ asset ('js/pages/table-responsive.init.js')}}"></script>
        <script src="{{ asset ('libs/dropzone/min/dropzone.min.js')}}"></script>

        <script src="{{ asset ('js/app.js')}}"></script>
        <script type="text/javascript">
            var url = window.location.href;
            if(url.indexOf('?error=') != -1 || url.IndexOf('/?error=') != -1) {
            $('.clientRegistration').modal('show');
            }
        </script>

    </body>

<!-- Mirrored from www.themesbrand.com/skote/layouts/tables-responsive.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:11:35 GMT -->
</html>
