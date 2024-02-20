@include('layouts.header')

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
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>Bursary System. Dashboard</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="{{asset ('images/profile-img.png')}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="{{asset ('images/users/avatar-1.jpg')}}" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">{{auth()->user()->name}}</h5>
                                                <p class="text-muted mb-0 text-truncate">{{auth()->user()->email}}</p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row text-center">

                                                        <div class="col-12">
                                                            <h5 class="font-size-15">KES 0</h5>
                                                            <p class="text-muted mb-0">Transactions .</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="{{route('profile')}}" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Transactions : </h4>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="text-muted">Completed Transactions:</p>
                                                <h3>KSH{{array_sum(auth()->user()->transactions->where('status','complete')->pluck('amount')->toArray()) + array_sum(auth()->user()->transactions->where('status','rejected')->pluck('amount')->toArray())}}</h3>

                                                <div class="mt-4">
                                                    <a href="{{route('wallet')}}" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mt-4 mt-sm-0">
                                                    <div id="radialBar-chart" class="apex-charts"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-2">Bursary Management System.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted fw-medium">Requests Accepted.</p>
                                                        <h4 class="mb-0">{{count(auth()->user()->mytransactions->where('status','complete'))}}</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-success align-self-center">
                                                        <span class="avatar-title bg-success">
                                                            <i class=" bx bx-check-double  font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted fw-medium">Requests Rejected</p>
                                                        <h4 class="mb-0">{{count(auth()->user()->transactions->where('status','rejected'))}}</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-danger align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-danger">
                                                            <i class=" bx bx-x font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted fw-medium">Pending Requests.</p>
                                                        <h4 class="mb-0">{{count(auth()->user()->transactions->where('status','pending'))}}</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-warning">
                                                            <i class=" bx bx-hourglass  font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                @if (auth()->user()->id == 1 )
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex flex-wrap">
                                            <h4 class="card-title mb-4">Transactions</h4>
                                            <div class="ms-auto">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Week</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#">Month</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#">Year</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div>
                                    </div>
                                </div>
                                    
                                @endif


                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-sm-flex flex-wrap">
                                            <h4 class="card-title mb-4">Transactions . </h4>
                                            <!-- <div class="ms-auto">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"> Deposits </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#"> Inbound-T</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="#"> Outbound-T </a>
                                                    </li>
                                                </ul>
                                            </div> -->
                                        </div>
                                        <div class="col-lg-12">

                                                    <div class="table-responsive">
                                                        <table class="table align-middle table-nowrap mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th style="width: 20px;">

                                                                    </th>
                                                                    <th class="align-middle">Transaction ID</th>
                                                                    <th class="align-middle">Type of Transaction</th>
                                                                    <th class="align-middle">Date</th>
                                                                    <th class="align-middle">Total</th>
                                                                    <th class="align-middle"> Status</th>
                                                                    <th class="align-middle">View Details</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse (auth()->user()->transactions->take(7) as $transaction)
                                                                    <tr>
                                                                        <td>
                                                                            {{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}
                                                                        </td>

                                                                        <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}</a> </td>
                                                                        <td>{{$transaction->type}}</td>
                                                                        <td>
                                                                            {{$transaction->created_at}}
                                                                        </td>
                                                                        <td>
                                                                            ${{$transaction->amount}}
                                                                        </td>
                                                                        <td>
                                                                            <span class="badge badge-pill {{$transaction->status == 'complete'? 'badge-soft-success' :($transaction->status == 'pending'? ' badge-soft-warning' :' badge-soft-danger')}} font-size-11">{{ucfirst($transaction->status)}}</span>
                                                                        </td>

                                                                        <td>
                                                                            <!-- Button trigger modal -->
                                                                            <button type="button" class="btn btn-outline-primary btn-sm  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#transactionModal{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}">
                                                                                View Details
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @empty
                                                                    <tr>
                                                                        No transactions Yet
                                                                    </tr>
                                                                @endforelse



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- end table-responsive -->

                                         </div>
                                        <!-- <div id="stacked-column-chart" class="apex-charts" dir="ltr"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->





                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                @forelse (auth()->user()->transactions->take(7) as $transaction)
                     <!--Pending Modal -->
                    <div class="modal fade transaction-detailModal {{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}transactionModal" id="transactionModal{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}" tabindex="-1" role="dialog" aria-labelledby="transactionModal{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="transaction-detailModalLabel">Transaction Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-2">Tr id: <span class="text-primary">{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}</span></p>
                                    <p class="mb-4">Type of transaction: <span class="text-primary">{{ucfirst($transaction->type)}}</span></p>

                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Transaction id </th>
                                                    <th scope="col">Recepient Account Number</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <div>
                                                            #{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <div>
                                                            <p class="text-truncate">{{$transaction->recipient->accNumber ?? "Account was Not Available"}}</p>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge badge-pill badge-soft-{{$transaction->status == 'complete' ? 'success':'warning'}} font-size-11">{{ucfirst($transaction->status)}}.</span> </td>
                                                    <td> </td>

                                                </tr>
                                                <hr class="text-primary">

                                                <tr>
                                                    <td >
                                                        <strong>
                                                            <h6 class="m-0 text-right"> Remarks:</h6>
                                                        </strong>
                                                    </td>
                                                    <td colspan="3">
                                                        {{$transaction->status == 'complete' ? "Transaction Completed Successfully" :
                                                             ($transaction->status == 'pending' && $transaction->recipientId == auth()->user()->id ? 'Awaiting Your approval':
                                                                ($transaction->status == 'onHold'? "On Hold, Check the Transaction details": "Transaction was ".ucfirst($transaction->status)))}}
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal -->
                @empty
                @endforelse



            @if (auth()->user()->accountStatus != 'active')
                    
                                    <!-- Notifications Modal -->
                <div class="modal fade {{auth()->user()->passwdResetFlag == 1 ? 'show' : ''  }}" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel" style="padding-right: 12px; display: block;" aria-modal="true" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h4> Notifications </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="row text-center " >
                                    <div class="col-sm-4">
                                       
                                    </div>
                                    <div class="col-sm-4">
                                        <div>
                                            <div class="font-size-24 text-primary mb-2">
                                                <i class=" bx bx-lock-open-alt "></i>
                                            </div>
                                            

                                            <p class="text-muted mb-2">Activate.</p>
                                            <small class="muted">
                                                Activate Your Account.
                                            </small>


                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end notification Modal -->
                
            @endif


>


                <!-- send Modal -->
                    <div class="modal fade transaction-detailModal sendModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="transaction-detailModalLabel">Submit Transaction Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="col-xl-12">
                                <form action="{{route('sendTransaction')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-floating mb-3 col-md-12">
                                            <input type="email" name="email" class="form-control" id="floatingemailInput" placeholder="Enter the Recepients Email address" required >
                                            <label for="floatingemailInput">Recipients Email address</label>
                                        </div >
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" name="amount" class="form-control" id="floatingemailInput" placeholder="Enter the Recepients Email address" required >
                                            <label for="floatingemailInput">Enter the amount to send.</label>

                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" name="minAmount" class="form-control" id="floatingemailInput" placeholder="Enter the minimum " required >
                                            <label for="floatingemailInput">Enter the Minimum acc Balance.</label>
                                        </div>
                                    </div>



                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success w-md">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- end send modal -->

                <!--  Modal -->
                <!-- withdrawal Modal -->
                <div class="modal fade transaction-detailModal withdrawalModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="transaction-detailModalLabel">Submit Please provide the necessary information.</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <div class="col-xl-12">
                                <form method="POST", action="{{route('withdrawalRequest')}}">
                                    @csrf
                                    <input type="hidden" name="senderId" value="{{auth()->user()->id}}">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="amount" class="form-control" id="floatingemailInput" placeholder="Enter the amount You would like to withdraw" required >
                                        <label for="floatingemailInput">Enter the amount to withdraw.</label>
                                    </div>
                                    <div class="mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="messageToAdmin" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                        <label for="floatingTextarea">Reason For WithDrawal.</label>
                                        <small class="muted">
                                            Based on your reason, the Admin will decide whether or not to grant your request.
                                        </small>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success w-md">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- end send modal -->



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

        <script src="{{asset ('js/app.js')}}"></script>
    </body>

</html>
