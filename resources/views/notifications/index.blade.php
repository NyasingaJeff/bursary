@include('layouts.header')

            <div class="main-content">
            <div class="page-content " style="margin-top:10px !important;">
                <div class="container-fluid">

                    <div class="table-responsive" style="margin-top:40px;">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">

                                    </th>
                                    <th class="align-middle">Notification ID</th>
                                    <th class="align-middle">Type of Notifications</th>
                                    <th class="align-middle">Date Of notification</th>
                                    <th class="align-middle"> Status</th>
                                    <th class="align-middle">View Details</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($notifications as $notification )
                                <tr>

                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#{{$notification->id}}</a> </td>
                                    <td>{{$notification->type == "withdrawalRequest" ? "Withdrawal Request":"Transactional Update"}}</td>
                                    <td>
                                        {{$notification->created_at}}
                                    </td>

                                    <td>
                                        <span class="badge badge-pill badge-soft-{{$notification->status == 'read'? 'success':'warning'}} font-size-11">{{ucfirst($notification->status)}}</span>
                                    </td>

                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-primary btn-sm  waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#notificationModal{{$notification->id}}">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                    <td>

                                    </td>
                                    <td><a href="javascript: void(0);" class="text-body fw-bold">#No Notifications</a> </td>
                                    <td>No notifications </td>
                                    <td>
                                        No notifications
                                    </td>
                                    <td>
                                        No notifications
                                    </td>
                                    <td>
                                        No notifications
                                    </td>

                                    <td>
                                        No notifications
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
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

            @foreach($notifications as $notification)
                <!-- Successfull Modal -->
          <div class="modal fade transaction-detailModal successfullModal" tabindex="-1" id="notificationModal{{$notification->id}}" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaction-detailModalLabel">Notification Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <p class="mb-4">Notification Type: <span class="text-success">&nbsp
                                 {{$notification->type == "withdrawalRequest" ? "Withdrawal Request":"Transactional Update"}}</span></p>

                                 <div class="card-body">
                                        <h5 class="card-title mb-4">{{$notification->type == "withdrawalRequest" ? "Withdrawal Request":"Transactional Update"}}</h5>
                                        <p >{{$notification->message}}</p>

                                </div>
                            </div>
                            <div class="modal-footer">
                            <a type="button" href="{{route('readNotification',$notification->id)}}" class="btn btn-outline-danger" >Read.</a>

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End succssFull Modal -->

            @endforeach

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

<!-- Mirrored from www.themesbrand.com/skote/layouts/layouts-hori-preloader.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Feb 2021 08:03:24 GMT -->
</html>
