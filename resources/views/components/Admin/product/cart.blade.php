@extends('layouts.app')
@section('title')
    Cart
@endsection
@section('content')
    <!-- Main container that will be hidden when cart is empty -->
    <div class="checkout-containerProductCart my-5" id="main-cart-container">
        <!-- Header -->
        <div class="headerProductCart">
            <a href="{{ URL::previous() }}" style="text-decoration: none;">
                <i class="fas fa-arrow-left header-icon"></i>
            </a>
            <h1>Checkout</h1>
            <i class="fas fa-trash header-icon" id="clear-cart"></i>
        </div>

        <!-- Cart Items Container -->
        <div id="cart-items-container">
            <!-- Items will be loaded here via JavaScript -->
        </div>

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
                </div>
            </div>
        </div>

        <!-- Notes Section -->
        <div class="notes-section">
            <h3 class="section-title" style="padding: 0 0 8px 0;">Ajouter des notes</h3>
            <textarea class="notes-input" placeholder="Ajouter des notes ..."></textarea>
        </div>

        <!-- Payment Methods -->
        <div class="payment-section">
            <h3 class="section-title" style="padding: 0 0 16px 0;">Methode de paiement</h3>

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
                <b class="invoice-value" style="color: black" id="products-total">0 Dh</b>
            </div>

            <div class="invoice-row">
                <span class="invoice-label">Frais de livraison</span>
                <b class="invoice-value" style="color: black">7 Dh</b>
            </div>
            <div class="invoice-row">
                <span class="invoice-label">Total </span>
                <b class="invoice-value" style="color: black" id="grand-total">7 Dh</b>
            </div>
        </div>

        <!-- Order Button -->
        <button class="order-button">Commande passée</button>
    </div>

    <!-- Empty cart message (hidden by default) -->
    <div id="empty-cart-message" style="display: none;">
        @include('components.EmeptyCart')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load cart from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || {};
            const cartContainer = document.getElementById('cart-items-container');
            const productsTotal = document.getElementById('products-total');
            const grandTotal = document.getElementById('grand-total');
            const mainCartContainer = document.getElementById('main-cart-container');
            const emptyCartMessage = document.getElementById('empty-cart-message');
            
            // Render cart items
            function renderCart() {
                let total = 0;
                let html = '';
                
                // Check if cart is empty
                if (Object.keys(cart).length === 0) {
                    mainCartContainer.style.display = 'none';
                    emptyCartMessage.style.display = 'block';
                    return;
                } else {
                    mainCartContainer.style.display = 'block';
                    emptyCartMessage.style.display = 'none';
                }
                
                // Build cart items HTML
                for (const productId in cart) {
                    const item = cart[productId];
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    
                    html += `
                        <div class="container-fluid" data-id="${productId}">
                            <div class="d-flex align-items-center p-3 border rounded mb-3 shadow-sm w-100">
                                <img src="{{ asset('storage/') }}/${item.image}" alt="Item Image" class="img-thumbnail me-3"
                                    style="width: 100px; border-radius: 8px;">

                                <div class="flex-grow-1">
                                    <div class="fw-semibold fs-5">${item.name}</div>
                                    <div class="text-muted mb-2">${item.price} Dh</div>

                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-outline-danger btn-sm me-2 remove-item" data-id="${productId}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <input type="number" class="form-control quantity-input" style="width:100px" 
                                            value="${item.quantity}" min="1" data-id="${productId}">
                                        <button class="btn btn-outline-success btn-sm ms-2 increment-item" data-id="${productId}">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
                
                cartContainer.innerHTML = html;
                productsTotal.textContent = `${total.toFixed(2)} Dh`;
                grandTotal.textContent = `${(total + 7).toFixed(2)} Dh`;
                
                // Add event listeners
                document.querySelectorAll('.remove-item').forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.getAttribute('data-id');
                        delete cart[productId];
                        localStorage.setItem('cart', JSON.stringify(cart));
                        renderCart();
                    });
                });
                
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const productId = this.getAttribute('data-id');
                        const newQuantity = parseInt(this.value);
                        
                        if (newQuantity > 0) {
                            cart[productId].quantity = newQuantity;
                        } else {
                            delete cart[productId];
                        }
                        
                        localStorage.setItem('cart', JSON.stringify(cart));
                        renderCart();
                    });
                });
                
                document.querySelectorAll('.increment-item').forEach(button => {
                    button.addEventListener('click', function() {
                        const productId = this.getAttribute('data-id');
                        cart[productId].quantity += 1;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        renderCart();
                    });
                });
            }
            
            // Clear cart button
            document.getElementById('clear-cart').addEventListener('click', function() {
                if (confirm('Are you sure you want to clear your cart?')) {
                    localStorage.removeItem('cart');
                    cart = {};
                    renderCart();
                }
            });
            
            // Payment method selection
            document.querySelectorAll('.payment-option').forEach(option => {
                option.addEventListener('click', function() {
                    document.querySelectorAll('.payment-radio').forEach(radio => {
                        radio.classList.remove('selected');
                    });
                    this.querySelector('.payment-radio').classList.add('selected');
                });
            });
            
            // Initial render
            renderCart();
        });
    </script>
@endsection