@include('layouts.header')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content " >

                <div class="page-content" style="padding-top:8px;">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">All Transactions</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">KES 0 in transactions</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                        @forelse($transactions as $transaction)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="text-lg-center">
                                                    <div class="avatar-sm me-3 mx-lg-auto mb-3 mt-1 float-start float-lg-none">
                                                        <span class="avatar-title rounded-circle {{$transaction->status== 'complete'? 'bg-success' :($transaction->status== 'pending'? 'bg-warning': 'bg-danger') }} bg-soft text-primary font-size-16">
                                                            {{$transaction->status== 'complete'? 'C' :($transaction->status== 'rejected'? 'Rej':($transaction->status== 'reversed'? 'Rev':'P'))}}
                                                        </span>
                                                    </div>
                                                    <p class="mb-1 text-muted">{{ucfirst($transaction->status )}}</p>
                                                </div>
                                            </div>

                                            <div class="col-lg-8">
                                                <div>
                                                    <p class="d-block text-primary text-decoration-underline mb-2" >Transaction Number {{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}</p>
                                                    <h5 class="text-truncate ">Sender:
                                                        <small class="muted">
                                                            {{$transaction->sender->name ? $transaction->sender->name  : AdminStrator }}
                                                        </small>
                                                    </h5>
                                                    <h5 class="text-truncate ">Reciever:
                                                        <small class="muted">
                                                            {{$transaction->recipient->name  ?? "inavalid Recipient"}}
                                                        </small>
                                                    </h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item me-3">
                                                            <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Amount"><i class="bx bx-money me-1 text-muted"></i>${{$transaction->amount}}</h5>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <h5 class="font-size-14" data-toggle="tooltip" data-placement="top" title="Due Date"><i class="bx bx-calendar me-1 text-muted"></i>{{$transaction->created_at}}</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <button type="button" class="btn btn-outline-primary btn-sm  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#trans-info{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="my-5 pt-sm-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">

                                                <div class="row justify-content-center">
                                                    <div class="col-sm-4">
                                                        <div class="maintenance-img">
                                                            <img src="{{asset ('images/coming-soon.svg')}}" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="mt-5"> No Transactions Yet ..</h4>
                                                <p class="text-muted">Once You start Transacting, your Transactins Will appear on this page</p>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse


                        </div>
                        <!-- end row -->


                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


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
        @forelse($transactions as $transaction)
        <!--  Modal -->
            <div class="modal fade transaction-detailModal successfullModal" id="trans-info{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transaction-detailModalLabel">Transaction Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <thead>

                                    </thead>
                                    <tbody>


                                        </tr>
                                        <tr>
                                            <td >
                                                <strong>
                                                    <h6 class="m-0 text-right"> Type :</h6>
                                                </strong>
                                            </td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success font-size-11">{{$transaction->type}}</span> </td>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <strong>
                                                    <h6 class="m-0 text-right"> Sender :</h6>
                                                </strong>
                                            </td>
                                            <td >
                                                {{$transaction->sender->email}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <strong>
                                                    <h6 class="m-0 text-right"> Recipient :</h6>
                                                </strong>
                                            </td>
                                            <td colspan="3">
                                                {{$transaction->recipient->email ?? "invalid User"}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <strong>
                                                    <h6 class="m-0 text-right"> Amount :</h6>
                                                </strong>
                                            </td>
                                            <td colspan="3">
                                                $ {{$transaction->amount}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td >
                                                <strong>
                                                    <h6 class="m-0 text-right"> Status :</h6>
                                                </strong>
                                            </td>
                                            <td colspan="3">
                                            <span class="badge {{$transaction->status== 'complete'? 'bg-success' :($transaction->status== 'pending'? 'bg-warning': 'bg-danger') }}  font-size-16">
                                                {{$transaction->status== 'complete'? 'Complete' :($transaction->status== 'rejected'? 'Rejected':($transaction->status== 'reversed'? 'Reversed':'Pending'))}}
                                            </span>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            @if ($transaction->recipientId==auth()->user()->id && $transaction->status != "complete")
                                <a type="button" href="{{route('recieveTransaction',$transaction->id)}}" class="btn btn-outline-success" >Accept.</a>
                                    @if($transaction->status != 'rejected')
                                        <a type="button" href="{{route('rejectTransaction',$transaction->id)}}" class="btn btn-outline-danger" >Reject.</a>
                                    @endif
                            @endif
                            @if(auth()->user()->id== 1 && $transaction->status == 'complete')
                                <a type="button" href="{{route('reverseTransaction',$transaction->id)}}" class="btn btn-outline-warning" >Reverse.</a>
                            @endif
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
                            <!-- End  Modal -->
        @empty

        @endforelse

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center px-3 py-4">

                    <h5 class="m-0 me-2">Settings</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="{{asset ('images/layouts/layout-1.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                        <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{asset ('images/layouts/layout-2.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="{{asset ('css/bootstrap-dark.min.css')}}" data-appStyle="{{asset ('css/app-dark.min.css')}}">
                        <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{asset ('images/layouts/layout-3.jpg')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="form-check form-switch mb-5">
                        <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="{{asset ('css/app-rtl.min.css')}}">
                        <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{asset ('libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset ('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset ('libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset ('libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset ('libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset ('js/pages/coming-soon.init.js')}}"></script>

        <script src="{{asset ('js/app.js')}}"></script>

    </body>

<!-- Mirrored from www.themesbrand.com/skote/layouts/invoices-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:08:04 GMT -->
</html>
