@extends('layouts.app')
@section('title')
    Product
@endsection
@section('content')
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
                                <a href="{{ route('ProductPage', $categorie->categorie_name) }}" class="text-decoration-none"
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
                                <div class="quantity-controls" style="display: none;">
                                    <button class="decrement-btn">-</button>
                                    <span class="quantity">1</span>
                                    <button class="increment-btn">+</button>
                                </div>
                                <a href="{{ route('addToCart', $product->id) }}"
                                    class="add-button text-decoration-none">Ajouter</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Order Summary Footer -->
        @if(session('cart',[])){
        @php
            $total = 0;
        @endphp
        @foreach (session('cart') as $key => $value)
            @php
                $total += $value['price'] * $value['quantity'];
            @endphp
        @endforeach
        <a href="{{ route('product.cart')}}">
        <div class="order-summary" style="display: flex;">
            <div class="order-summary-content">
                <h1> <i class="fa fa-shopping-cart"></i> My cart ({{ count(session('cart', [])) }})</h1>
                <div class="order-actions">
                    {{-- <button class="clear-all-btn">Vider</button> --}}
                    <div class="order-total">{{ $total }} Dh</div>
                </div>
            </div>
        </div>
        </a>
        }           
        @else
            <a href="{{ route('product.cart')}}">
        <div class="order-summary" style="display: none;">
            <div class="order-summary-content">
                <h1> <i class="fa fa-shopping-cart"></i> My cart ({{ count(session('cart', [])) }})</h1>
                <div class="order-actions">
                    {{-- <button class="clear-all-btn">Vider</button> --}}
                    <div class="order-total"> Dh</div>
                </div>
            </div>
        </div>
        </a>
        @endif

    </div>
@endsection
