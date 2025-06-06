@extends('layouts.Admin')
@section('title')
   Admin Panel
@endsection     
@section('content')
     <!-- Page Content -->
        <div id="content">
            <!-- Dashboard Content -->
            <div class="container-fluid py-4">
                <!-- Stats Cards -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                            Total Users</div>
                                        <div class="h5 mb-0 fw-bold text-gray-800">{{$countUsers }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-people fs-1 text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                            Total Commandes</div>
                                        <div class="h5 mb-0 fw-bold text-gray-800">12,345</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-file-earmark-post fs-1 text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs fw-bold text-info text-uppercase mb-1">
                                        Total Product    
                                        </div>
                                        <div class="h5 mb-0 fw-bold text-gray-800">{{ $countProduct}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-activity fs-1 text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col me-2">
                                        <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                        Total Menu Categorie    
                                        </div>
                                        <div class="h5 mb-0 fw-bold text-gray-800">{{$countMenu}}</div>
                                    </div>
                                    <div class="col-auto">
                                        {{-- <i class="bi bi-clock-history fs-1 text-warning"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="row">
                    <!-- Traffic Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 fw-bold text-primary">Website Traffic</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="trafficChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 fw-bold text-primary">Traffic Sources</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="trafficPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="me-2">
                                        <i class="fas fa-circle text-primary"></i> Direct
                                    </span>
                                    <span class="me-2">
                                        <i class="fas fa-circle text-success"></i> Social
                                    </span>
                                    <span class="me-2">
                                        <i class="fas fa-circle text-info"></i> Referral
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                
            </div>
@endsection
