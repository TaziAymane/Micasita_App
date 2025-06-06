@extends('layouts.app')
@section('title')
    Product
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('css/productPage.css') }}">
    <div class="app-container">
        <div class="main-content">
            <div class="content-area">
                @foreach ($categories_name as $item)
                    <div class="headerProduct">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Pizza House" class="headerProduct-img">
                        <div class="headerProduct-overlay">
                            <div class="header-top">
                                <a href="{{ route('homePage') }}" class="back-button">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                                <h1>{{ $item->categorie_name }}</h1>
                            </div>
                            <div class="info">
                                <span>🚚 13 Dh</span>
                                <span>⏱ {{ $item->time_take }} min</span>
                                <span>⭐ 4.9</span>
                                <span class="status"><a href="{{ route('homePage') }}">Back</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Swiper Container -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <a href="{{ route('homePage') }}" class="text-decoration-none">
                            <div class="swiper-slide active">Menu</div>
                        </a>
                        @foreach ($categories as $categorie)
                            <div class="swiper-slide">
                                <a href="{{ route('ProductPage', $categorie->categorie_name) }}"
                                    class="text-decoration-none"
                                    style="color: rgb(102, 99, 99)">{{ $categorie->categorie_name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="section">
                    @foreach ($products as $product)
                        <div class="product" data-product-id="{{ $product->id }}">
                            <div class="product-info">
                                <div>{{ $product->product_name }}</div>
                                <div class="product-price">{{ $product->price }} Dh</div>
                            </div>
                            <div class="product-controls">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}"
                                    class="product-img" />

                                <button class="add-button text-decoration-none add-to-cart"
                                    productID="{{ $product->id }}">
                                    Ajouter
                                </button>
                                <div class="quantity-controls" style="display: flex;">
                                    <button class="decrement-btn" data-product-id="{{ $product->id }}">-</button>
                                    <span class="quantity" data-product-id="{{ $product->id }}">1</span>
                                    <button class="increment-btn" data-product-id="{{ $product->id }}">+</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Order Summary Footer -->
        <div class="order-summary" id="cart-summary" style="display: none;">
            <a href="{{ route('product.cart') }}" style="text-decoration:none">
                <div class="order-summary-content">
                    <h1><i class="fa fa-shopping-cart"></i> My cart (<span id="cart-count">0</span>)</h1>
                    <div class="order-actions">
                        <div class="order-total"><span id="cart-total">0</span> Dh</div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize cart from localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || {};
            updateCartSummary();

            // Add to cart button click handler
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const productName = this.getAttribute('data-product-name');
                    const productPrice = parseFloat(this.getAttribute('data-product-price'));
                    const productImage = this.getAttribute('data-product-image');
                    const productCategorie = this.getAttribute('data-product-categorie');

                    // Add to cart
                    if (cart[productId]) {
                        cart[productId].quantity += 1;
                    } else {
                        cart[productId] = {
                            name: productName,
                            quantity: 1,
                            price: productPrice,
                            image: productImage,
                            categorie: productCategorie
                        };
                    }

                    // Save to localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartSummary();

                    // Show success message
                   
                });
            });

            // Update cart summary
            function updateCartSummary() {
                const cart = JSON.parse(localStorage.getItem('cart')) || {};
                const count = Object.keys(cart).length;
                let total = 0;

                for (const productId in cart) {
                    total += cart[productId].price * cart[productId].quantity;
                }

                const cartSummary = document.getElementById('cart-summary');
                const cartCount = document.getElementById('cart-count');
                const cartTotal = document.getElementById('cart-total');

                if (count > 0) {
                    cartSummary.style.display = 'flex';
                    cartCount.textContent = count;
                    cartTotal.textContent = total.toFixed(2);
                } else {
                    cartSummary.style.display = 'none';
                }
            }
        });
    </script> --}}
@endsection
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle quantity controls for all products
            document.querySelectorAll('.decrement-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const quantityElement = document.querySelector(
                        `.quantity[data-product-id="${productId}"]`);
                    let quantity = parseInt(quantityElement.textContent);
                    if (quantity > 1) {
                        quantity--;
                        quantityElement.textContent = quantity;
                    }
                });
            });

            document.querySelectorAll('.increment-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const quantityElement = document.querySelector(
                        `.quantity[data-product-id="${productId}"]`);
                    let quantity = parseInt(quantityElement.textContent);
                    quantity++;
                    quantityElement.textContent = quantity;
                });
            });

            // Handle add to cart with proper quantity
            $(document).ready(function() {
                $('.add-to-cart').click(function(e) {
                    e.preventDefault();
                    let productId = $(this).attr('productID');
                    let quantity = $(this).closest('.product-controls').find('.quantity').text();

                    $.ajax({
                        method: 'post',
                        url: '/add-cart',
                        data: {
                            productID: productId,
                            quantity: quantity
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire({
                                title: "Add to Cart",
                                confirmButtonColor: "green",
                                icon: "success",
                                draggable: true
                                }); // Debug
                            
                        }

                    });
                });
            });


        });
    </script>
@endsection
