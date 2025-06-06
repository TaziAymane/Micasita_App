@extends('layouts.app')
@section('title')
    Settings
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('css/settings.css')}}">
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
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                            <td>{{ $order->items->count() }}</td>
                                            <td>{{ number_format($order->total_price, 2) }} DH</td>
                                            <td>
                                                <span class="badge bg-success">Delivered</span> {{-- Optional: make dynamic --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('homePage')}}" class="btn btn-outline-danger">View All Orders</a>
                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection
