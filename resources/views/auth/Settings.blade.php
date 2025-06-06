@extends('layouts.app')
@section('title')
    Settings
@endsection
@section('content')
    <style>
        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(33, 40, 50, 0.15);
            margin-bottom: 1.5rem;
        }

        .card-header {
            font-weight: 500;
        }

        .card-body {
            padding: 1.5rem;
        }

        .userdata-pic {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .table th {
            border-top: none;
        }

        .ratings i {
            font-size: 0.9rem;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }

        .btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }

            .userdata-pic {
                width: 100px;
                height: 100px;
            }
        }

        /* Animation for favorite button */
        @keyframes heartBeat {
            0% {
                transform: scale(1);
            }

            14% {
                transform: scale(1.3);
            }

            28% {
                transform: scale(1);
            }

            42% {
                transform: scale(1.3);
            }

            70% {
                transform: scale(1);
            }
        }

        .heart-beat {
            animation: heartBeat 1s;
            color: #dc3545 !important;
        }
    </style>
    <!-- userdata Section -->
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <h5 class="my-3" id="userdataName">{{ $userdata->nomComplait }}</h5>
                        <p class="text-muted mb-1">{{ $userdata->adress }}</p>
                        <p class="text-muted mb-4">{{ $userdata->created_at->format('d-m-Y') }}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger ">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-trophy fa-lg text-warning"></i>
                                <p class="mb-0">Gold Member</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-star fa-lg text-primary"></i>
                                <p class="mb-0">245 Points</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-calendar-alt fa-lg text-success"></i>
                                <p class="mb-0">Member since in {{ $userdata->created_at->format('d-m-Y') }}</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fas fa-percentage fa-lg text-info"></i>
                                <p class="mb-0">15% Discount</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="fullName">{{ $userdata->nomComplait }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone number</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="userdataEmail">{{ $userdata->tele }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0" id="userdataAddress">{{ $userdata->adress }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order History -->
                <div class="card mb-4">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Recent Orders</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#12345</td>
                                        <td>2023-06-15</td>
                                        <td>3</td>
                                        <td>$24.99</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td>#12344</td>
                                        <td>2023-06-10</td>
                                        <td>2</td>
                                        <td>$18.50</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td>#12343</td>
                                        <td>2023-06-05</td>
                                        <td>5</td>
                                        <td>$42.75</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="orders.html" class="btn btn-outline-danger">View All Orders</a>
                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection
