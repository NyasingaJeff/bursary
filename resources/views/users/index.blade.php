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
         <!-- jquery step -->
         <script src="{{asset('libs/jquery-steps/build/jquery.steps.min.js')}}"></script>

        <script src="{{asset('js/pages/form-wizard.init.js')}}"></script>

        <script src="{{asset('js/toastr.min.js')}}"></script>


        <!-- Init js -->
        <script src="{{ asset ('js/pages/table-responsive.init.js')}}"></script>
        <script src="{{ asset ('libs/dropzone/min/dropzone.min.js')}}"></script>

        <script src="{{ asset ('js/app.js')}}"></script>
        @include('layouts.js')

        <script type="text/javascript">
            var url = window.location.href;
            if(url.indexOf('?error=') != -1 || url.IndexOf('/?error=') != -1) {
            $('.clientRegistration').modal('show');
            }
        </script>

    </body>

</html>
