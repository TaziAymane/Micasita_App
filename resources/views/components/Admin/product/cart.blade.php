@extends('layouts.app')
@section('title')
    Cart
@endsection
@section('content')
    @if (session('cart'))
        <div class="checkout-containerProductCart my-5">
            <!-- Header -->
            <div class="headerProductCart">
                <a href="{{  URL::previous()}}" style="text-decoration: none;">
                    <i class="fas fa-arrow-left header-icon"></i>
                </a>
                <h1>Checkout</h1>
                <i class="fas fa-trash header-icon"></i>
            </div>         

            <!-- Item Details -->
            <div class="conatiner text-center">
                <h1>Orders</h1>
            </div>
            @php
                $total = 0;
            @endphp
            @foreach (session('cart') as $key => $value)
                @php
                    $total += $value['price'] * $value['quantity'];
                @endphp
                <div class="container-fluid">
                    <div class="d-flex align-items-center p-3 border rounded mb-3 shadow-sm w-100">
                        <img src="{{ asset('storage/' . $value['image']) }}" alt="Item Image" class="img-thumbnail me-3"
                            style="width: 100px; border-radius: 8px;">

                        <div class="flex-grow-1">
                            <div class="fw-semibold fs-5">{{ $value['name'] }}</div>
                            <div class="text-muted mb-2">{{ $value['price'] }} Dh</div>

                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-danger btn-sm me-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <input type="number" class="form-controle" style="width:100px" name="quentity" value="{{ $value['quantity']}}" min="1">
                                <button class="btn btn-outline-success btn-sm ms-2">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            <!-- Delivery Information -->
            <h2 class="section-title">Informations sur la livraison</h2>

            <!-- Map -->
            <div class="map-container">
                <div class="map-pin"></div>
                <div class="map-controls">
                    <div class="map-control-btn">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="map-control-btn">
                        <i class="fas fa-minus"></i>
                    </div>
                </div>
                <div class="google-logo">Google</div>
            </div>

            <!-- Location Info -->
            <div class="location-info">
                <div class="location-left">
                    <div class="location-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="location-text">
                        <div class="location-name">Your Localisation</div>
                        {{-- <div class="location-subtitle">Localisation actuelle</div> --}}
                    </div>
                </div>
                {{-- <a href="#" class="change-address">
                    Changer de addres
                    <i class="fas fa-chevron-right"></i>
                </a> --}}
            </div>

            <!-- Notes Section -->
            <div class="notes-section">
                <h3 class="section-title" style="padding: 0 0 8px 0;">Ajouter des notes</h3>
                <textarea class="notes-input" placeholder="Ajouter des notes ..."></textarea>
            </div>

            <!-- Payment Methods -->
            <div class="payment-section">
                <h3 class="section-title" style="padding: 0 0 16px 0;">Moyens de paiement</h3>

                <div class="payment-option">
                    <div class="payment-left">
                        <div class="payment-radio selected"></div>
                        <span class="payment-text">Paiement en espèces</span>
                    </div>
                    <i class="fas fa-money-bill-wave cash-icon"></i>
                </div>

                <div class="payment-option">
                    <div class="payment-left">
                        <div class="payment-radio"></div>
                        <span class="payment-text">Paiement en Card</span>
                    </div>
                    <div class="cmi-logo">CMI</div>
                </div>
            </div>

            <!-- Invoice Details -->
            <div class="invoice-section">
                <h3 class="section-title" style="padding: 0 0 16px 0;">Détails de la facture</h3>

                <div class="invoice-row">
                    <span class="invoice-label">Total Produits</span>
                    <b class="invoice-value" style="color: black">{{ $total }} Dh</b>
                </div>

                <div class="invoice-row">
                    <span class="invoice-label">Frais de livraison</span>
                    <b class="invoice-value" style="color: black">7 Dh</b>
                </div>
                <div class="invoice-row">
                    <span class="invoice-label">Total </span>
                    <b class="invoice-value" style="color: black"></b>
                </div>
            </div>

            <!-- Order Button -->
            <button class="order-button">Commande passée</button>


        </div>
        <script>
            // Payment method selection
            document.querySelectorAll('.payment-option').forEach(option => {
                option.addEventListener('click', function() {
                    // Remove selected class from all radio buttons
                    document.querySelectorAll('.payment-radio').forEach(radio => {
                        radio.classList.remove('selected');
                    });

                    // Add selected class to clicked option
                    this.querySelector('.payment-radio').classList.add('selected');
                });
            });

            
            
        </script>
    @else
        <div>
            cart emepty
        </div>
    @endif



@endsection
