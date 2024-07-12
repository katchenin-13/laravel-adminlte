
            @extends('layouts.app')

            @section('content')
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">{{ __('Dashboard') }}</h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{ __('You are logged in!') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->

                <div class="content">
                    <div class="container-fluid">
                    <!-- Info boxes -->
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                    <span class="info-box-text">Users</span>
                                    <span class="info-box-number">
                                        {{ $userCount }}
                                    </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                    <span class="info-box-text">Clients</span>
                                    <span class="info-box-number">{{ $clientCount }}</span>

                                    </div>
                                    {{-- {{ $clients->count() }} --}}
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

                                    <div class="info-box-content">
                                    <span class="info-box-text">Coursiers</span>
                                    <span class="info-box-number">{{ $coursierCount }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map-marker-alt"></i></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Communes</span>
                                        <span class="info-box-number">{{ $communeCount }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            </div>
                    </div><!--/. container-fluid -->
                </div>


                <div class="content">
                    <div class="container-fluid">
                        <!-- /.col-md-6 -->
                        <div >
                            <div class="card">
                                    <div class="card-header border-transparent">
                                    <h3 class="card-title">LIVRAISONS</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                        <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Colis</th>
                                            <th >Nom</th>
                                            <th>Commune</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                                <tr >
                                                    <td style="color:rgb(0, 195, 255);">OR9842</td>
                                                    <td>Call of Duty IV</td>
                                                    <td><span>Angaman</span></td>
                                                    <td ><span >Yopougon</span></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:rgb(0, 195, 255);">OR1843</td>
                                                    <td>Samsung Smart TV</td>
                                                    <td><span >Itachi</span></td>
                                                    <td><span >Abobo</span></td>
                                                </tr>

                                                <tr>
                                                    <td style="color:rgb(0, 195, 255);">OR1844</td>
                                                    <td>Samsung Smart</td>
                                                    <td><span >Koffi</span></td>
                                                    <td><span>Abobo</span></td>
                                                </tr>
                                                <tr>
                                                    <td style="color:rgb(0, 195, 255);">OR1845</td>
                                                    <td>Teckno </td>
                                                    <td><span >dibi</span></td>
                                                    <td><span>Yopougon</span></td>
                                                </tr>

                                                <tr>
                                                    <td style="color:rgb(0, 195, 255);">OR1848</td>
                                                    <td>Iphone </td>
                                                    <td><span >Konan</span></td>
                                                    <td><span>Cocody</span></td>
                                                </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    </div>

                                </div>
                            <!-- /.d-flex -->


                        </div>

                    </div>
                </div>

            @endsection
