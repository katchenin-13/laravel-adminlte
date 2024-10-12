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
            <!-- Message Alert -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Info boxes -->
            <div class="row">
                @role('superadmin')
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Users</span>
                                <span class="info-box-number">{{ $userCount }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Clients</span>
                                <span class="info-box-number">{{ $clientCount }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Coursiers</span>
                                <span class="info-box-number">{{ $coursierCount }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map-marker-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Communes</span>
                                <span class="info-box-number">{{ $communeCount }}</span>
                            </div>
                        </div>
                    </div>
                @endrole

                @role('coursier')
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Zones</span>
                                <span class="info-box-number">{{ $zoneCount }}</span> 
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map-marker-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Communes</span>
                                <span class="info-box-number">{{ $communeCount }}</span>
                            </div>
                        </div>
                    </div>
                @endrole
            </div>
            <!-- /.row -->

            <!-- Deliveries Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">LIVRAISONS</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:10%;">No</th>
                                            <th style="width:10%;" class="text-center">ID</th>
                                            <th style="width:10%;" class="text-center">Destinataire</th>
                                            <th style="width:20%;" class="text-center">Coursier</th>
                                            <th style="width:20%;" class="text-center">Téléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($livraisons->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center">Aucune livraison disponible.</td>
                                            </tr>
                                        @else
                                            @foreach ($livraisons as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $item->uuid }}</td>
                                                    <td class="text-center">{{ $item->destinataire }}</td>
                                                    <td class="text-center">{{ $item->coursier->nom }}</td>
                                                    <td class="text-center">{{ $item->numerodes }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection
