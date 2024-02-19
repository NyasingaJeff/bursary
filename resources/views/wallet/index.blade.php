
@include('layouts.header')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content " style="margin-top:20px !important;">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center " style="margin-top:19px;">



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row" style="margin-top:20px;">
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
                            @if(Session::has('fail'))
                                <div class="alert alert-danger">
                                    {{Session::get('fail')}}
                                </div>
                            @endif
                            <div class="col-xl-4" >
                                <div class="class card" style="text-align:center;">
                                    <div class="class card-body" style="min-height:600px !important">

                                        <div style="text-align:center;">
                                            <h4 class="card-title">My Transactions. <i class=" bx bx-wallet-alt "></i></h4>
                                            <p class="card-title-desc">Account Number: {{auth()->user()->accNumber}} </p>
                                            <p class="card-title-desc">{{auth()->user()->email}}</p>
                                        </div>
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Deposit Records.</a>
                                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Approved requests.</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Request for Bursary.</a>
                                            <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-pending" role="tab" aria-controls="v-pills-pending" aria-selected="false">Pending Requests.</a>
                                            @if (auth()->user()->id==1)
                                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-pendingWithdrawals" role="tab" aria-controls="v-pills-pending" aria-selected="false">Pending Requests.</a>
                                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-send" role="tab" aria-controls="v-pills-send" aria-selected="false">Emburse Bursary.</a>
                                            @endif
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
                                                                    Deposit Records.
                                                                </h4>
                                                            </div>
                                                            <hr>
                                                            <div class="card-body">
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
                                                                        @forelse (auth()->user()->myTransactions->where('status','!=','pending')->where('status','!=','onHold')->take(7) as $transaction)
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
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>

                                                                            </tr>
                                                                        @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <!-- end table-responsive -->
                                                            </div>
                                                            <!-- end card Body -->

                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                            <div class="card-header">
                                                                <h4 class="card-title"> Transactions History.</h4>
                                                                <p class="text-muted"> These are all the transactions associated to your account. </p>
                                                            </div>

                                                            <hr>
                                                            <div class="card-body">
                                                                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                                                            <span class="d-none d-sm-block">Inbound Transfers</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                                                            <span class="d-none d-sm-block">OutBound  Transfers.</span>
                                                                        </a>
                                                                    </li>

                                                                </ul>

                                                                <!-- Tab panes -->
                                                                <div class="tab-content p-3 text-muted">
                                                                    <div class="tab-pane active" id="home1" role="tabpanel">
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
                                                                        @forelse (auth()->user()->myTransactions->take(7) as $transaction)
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
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>

                                                                            </tr>
                                                                        @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <!-- end table-responsive -->

                                                                    </div>
                                                                    <div class="tab-pane" id="profile1" role="tabpanel">
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
                                                                        @forelse (auth()->user()->transactions->where('status','!=','pending')->where('status','!=','onHold')->take(7) as $transaction)
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
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>

                                                                            </tr>
                                                                        @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            <!-- end table-responsive -->

                                                                    </div>

                                                                </div>
                                                                <!-- Nav tabs -->


                                                                </div>



                                                            <hr>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-pending" role="tabpanel" aria-labelledby="v-pills-pending-tab">
                                                            <div class="card-header">
                                                                <h4 class="card-title"> Pending Transactions.</h4>
                                                                <p class="text-muted"> These Transactions Await Approval. </p>
                                                            </div>

                                                            <hr>
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
                                                                        @forelse (auth()->user()->myTransactions->where('type','withdrawal')->where('status','pending')->take(7) as $transaction)
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
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>

                                                                            </tr>
                                                                        @endforelse



                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- end table-responsive -->
                                                            <hr>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-pendingWithdrawals" role="tabpanel" aria-labelledby="v-pills-pending-tab">
                                                            <div class="card-header">
                                                                <h4 class="card-title"> Pending Withdrawal Requests.</h4>
                                                                <p class="text-muted"> These Withdrawal Requests await Your approval. </p>
                                                            </div>

                                                            <hr>
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
                                                                        @forelse ($allTransactions->take(7) as $transaction)
                                                                            <tr>
                                                                                <td>
                                                                                    {{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}
                                                                                </td>

                                                                                <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$transaction->id."-".$transaction->sender->accNumber."-".($transaction->recipient == null ? '000-000' : $transaction->recipient->accNumber)}}</a> </td>
                                                                                <td>Withsrawal Requests</td>
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
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>
                                                                                <td>
                                                                                    No transactions Yet
                                                                                </td>

                                                                            </tr>
                                                                        @endforelse



                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- end table-responsive -->
                                                            <hr>
                                                        </div>

                                                        <div class="tab-pane fade" id="v-pills-send" role="tabpanel" aria-labelledby="v-pills-send-tab">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Send Money To client.</h4>
                                                                <p class="text-muted"> Send money to user. </p>
                                                            </div>

                                                            <hr>
                                                            <div class="card-body">
                                                                    <form action="{{route('sendTransaction')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Enter Account Number<span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" n id="horizontal-firstname-input" name="accNumber" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="amount" id="horizontal-firstname-input"  required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Minimum Account Balance <span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="minimumBalance" id="horizontal-firstname-input"  required>
                                                                            </div>
                                                                        </div>


                                                                        <div class="row">
                                                                            <div class="col-3 offset-9" style="float:right;">
                                                                                <button type="submit" class="btn btn-outline-success btn-small">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <!-- end table-responsive -->
                                                            <hr>
                                                        </div>

                                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                        <div class="card-header">
                                                                    <h4 class="card-title"> Request a withdrawal.</h4>
                                                                    <p class="card-title-desc">Request to withdraw From account.</p>
                                                                </div>

                                                                <hr>



                                                                <div class="card-body">
                                                                    <form action="{{route('withdrawalRequest')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Bank<span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" n id="horizontal-firstname-input" name="bank" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Bank Branch<span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" n id="horizontal-firstname-input" name="bankBranch" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Swift code<span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" n id="horizontal-firstname-input" name="swiftCode" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="amount" id="horizontal-firstname-input"  required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Account Number <span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="accNumber" id="horizontal-firstname-input"  required>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Beneficiary Name<span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="beneficiaryName" id="horizontal-firstname-input" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Beneficiary Address<span class="text-danger">*</span></label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" name="beneficiaryAddress" id="horizontal-firstname-input" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-4">
                                                                            <div class="form-floating">
                                                                            <textarea class="form-control" placeholder="" name="narrative" id="floatingTextarea2" style="height: 100px"></textarea>
                                                                            <label for="floatingTextarea2">&nbsp;&nbsp; Enter the narrative for Your Withdrawal. <span class="text-danger">*</span> </label>
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

        @forelse (auth()->user()->myTransactions->take(7) as $transaction)
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
                                            <th scope="col">Recepient Email</th>
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
                                                    <p class="text-truncate">{{$transaction->recipient->email}}</p>
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
        <!-- end modal -->
    @empty
    @endforelse

    @if(auth()->user()->id==1)
    @forelse ($allTransactions->take(7) as $transaction)
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
                                            <th scope="col">Recepient Email</th>
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
                                                    <p class="text-truncate">{{$transaction->recipient->email}}</p>
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
        <!-- end modal -->
    @empty
    @endforelse
    @endif


                                                </tr>


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
