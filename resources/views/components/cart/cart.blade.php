@extends('layouts.app')
@section('title')
    Cart
@endsection
@section('content2')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <a class="navbar-brand flash-animation me-auto" href="{{ route('homePage') }}" id="backButton">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="container-fluid d-flex justify-content-center">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-utensils me-2"></i>Micasita Cart
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <!-- Cart Items Section -->
            <div class="col-lg-8 mb-4">
                <div class="cart-header mb-4">
                    <h2 class="fw-bold text-primary">
                        <i class="fas fa-shopping-cart me-2"></i>Your Cart
                    </h2>
                    <p class="text-muted">Review your delicious selections</p>
                </div>
                @php
                    $total = 0;
                @endphp
                @foreach ($data as $value)
                    @php
                        $total += $value->price * $value->quantity;
                    @endphp
                    <!-- Cart Item 1 -->
                    <div class="cart-item mb-3">
                        <div class="row align-items-center">
                            <div class="col-md-2 col-3">
                                <img src="{{ asset('storage/' . $value->image) }}" alt="Margherita Pizza"
                                    class="img-fluid rounded">
                            </div>
                            <div class="col-md-4 col-9">
                                <div class="d-flex flex-wrap align-items-center gap-3">
                                    <!-- Product Name (emphasized) -->
                                    <h5 class="mb-0 fw-bold text-primary">{{ $value->product_name }}</h5>

                                    <!-- Category -->
                                    <div class="d-flex align-items-center bg-light rounded px-2 py-1">
                                        <span class="text-muted small me-1">Category:</span>
                                        <span class="small fw-medium">{{ $value->categorie }}</span>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="d-flex align-items-center bg-light rounded px-2 py-1">
                                        <span class="text-muted small me-1">Qty:</span>
                                        <span class="small fw-large">{{ $value->quantity }}</span>
                                    </div>

                                    <!-- Type (with pill badge) -->
                                    <div class="d-flex align-items-center">
                                        <span class="text-muted small me-1">Type:</span>
                                        <span
                                            class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-2 py-1 small">
                                            Large
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2 col-4 mt-2 mt-md-0 text-end">
                                <div class="price fw-bold text-primary">{{ $value->price }} DH</div>

                            </div>
                            <div class="col-md-1 col-2 mt-2 mt-md-0 text-end">
                                <button class="btn btn-outline-danger btn-sm delCartProduct" productID={{ $value->id }}>
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- Continue Shopping -->
                <!-- Continue Shopping -->
                <div class="text-center mt-4">
                    <a href="#" class="btn btn-outline-primary me-2">
                        <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                    </a>
                    <button class="btn btn-outline-danger me-2" id="emptyCartBtn">
                        <i class="fas fa-trash-alt me-2"></i>Empty Cart
                    </button>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="col-lg-4">
                <div class="order-summary sticky-top">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-receipt me-2"></i>Order Summary
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="summary-row">
                                <span>Subtotal (4 items)</span>
                                <span class="fw-bold">{{ $total }} DH</span>
                            </div>
                            <div class="summary-row">
                                <span>Delivery Fee</span>
                                @php
                                    $delevery = 13;
                                @endphp
                                <span>{{ $delevery }} DH</span>
                            </div>
                            {{-- <div class="summary-row">
                                    <span>Service Fee</span>
                                    <span>$2.50</span>
                                </div> --}}
                            @php
                                $discount = 0;
                            @endphp
                            <div class="summary-row text-success">
                                <span>Discount (SAVE {{ $discount }}%)</span>
                                <span>{{ $discount }} DH</span>
                            </div>
                            <hr>
                            <div class="summary-row total">
                                <span class="fw-bold">Total</span>
                                <span class="fw-bold text-primary fs-5">{{ $total + $delevery - $discount }} DH</span>
                            </div>

                            <!-- Promo Code -->
                            <div class="promo-section mt-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter promo code">
                                    <button class="btn btn-outline-secondary" type="button">Apply</button>
                                </div>
                            </div>

                            <!-- Delivery Info -->
                            {{-- <div class="delivery-info mt-4">
                                    <h6 class="fw-bold">
                                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>Delivery Address
                                    </h6>
                                    <p class="small text-muted mb-2">123 Main Street, Apt 4B<br>New York, NY 10001</p>
                                    <a href="#" class="btn btn-link p-0 small">Change Address</a>
                                </div> --}}

                            <!-- Estimated Time -->
                            <div class="delivery-time mt-3">
                                <h6 class="fw-bold">
                                    <i class="fas fa-clock me-2 text-warning"></i>Estimated Delivery
                                </h6>
                                <p class="small text-muted mb-0">25-35 minutes</p>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Payment Methods -->
                    <div class="card mt-3 shadow-sm">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-credit-card me-2"></i>Payment Methods
                            </h6>
                            <div class="payment-methods">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="payment" id="card" checked>
                                    <label class="form-check-label" for="card">
                                        <i class="fas fa-credit-card me-2"></i>Credit/Debit Card
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="payment" id="paypal">
                                    <label class="form-check-label" for="paypal">
                                        <i class="fab fa-paypal me-2"></i>PayPal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment" id="cash">
                                    <label class="form-check-label" for="cash">
                                        <i class="fas fa-money-bill me-2"></i>Cash on Delivery
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer my-5">
                            <button class="btn btn-primary btn-lg w-100 checkout-btn">
                                <i class="fas fa-credit-card me-2"></i>Proceed to Checkout
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.delCartProduct').click(function(e) {
                e.preventDefault();
                let productID = $(this).attr('productID');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this product from your cart",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => { // Fixed spelling here
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "GET",
                            url: '/cart-delete/' + productID,
                            success: function(response) {
                                
                                 return   window.location.reload();
                                
                            }
                        });
                    }
                });
            })

        })
    </script>
@endsection
