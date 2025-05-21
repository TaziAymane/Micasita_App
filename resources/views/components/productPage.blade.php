@extends('layouts.app')
@section('title')
    Product
@endsection
@section('content')
    <div class="app-container">
        <div class="main-content">
            <!-- Desktop Sidebar -->
            <div class="sidebar d-none d-md-block">
                <div class="sidebar-nav">
                    <div class="sidebar-nav-item">
                        <div class="sidebar-nav-icon"><i class="fas fa-home"></i></div>
                        <div><a href="{{ route('homePage') }}" class="text-decoration-none text-reset">Home</a></div>
                    </div>
                    <div class="sidebar-nav-item active">
                        <div class="sidebar-nav-icon"><i class="fas fa-star"></i></div>
                        <div><a href="wanny_product.html" class="text-decoration-none text-reset">Wanny</a></div>
                    </div>
                    <div class="sidebar-nav-item">
                        <div class="sidebar-nav-icon"><i class="fas fa-clipboard-list"></i></div>
                        <div><a href="Orders.html" class="text-decoration-none text-reset">Orders</a></div>
                    </div>
                    <div class="sidebar-nav-item">
                        <div class="sidebar-nav-icon"><i class="fas fa-user"></i></div>
                        <div><a href="Profile.html" class="text-decoration-none text-reset">Profile</a></div>
                    </div>
                    <div class="sidebar-nav-item">
                        <div class="sidebar-nav-icon"><i class="fas fa-utensils"></i></div>
                        <div>Micasita Restaurants</div>
                    </div>
                    <div class="sidebar-nav-item">
                        <div class="sidebar-nav-icon"><i class="fas fa-shopping-basket"></i></div>
                        <div>Wanny Supermarché</div>
                    </div>
                </div>
            </div>
            

            <!-- Main Content Area -->
            <div class="content-area">
                <div class="headerProduct">
                    <img src="{{ asset('images/pizzaCategorie2.png') }}" alt="Pizza House" class="headerProduct-img">
                    <div class="headerProduct-overlay">
                        <h1>Pizza Categorie</h1>
                        {{-- <div class="tags">Burgers, Briouats, momalahat</div> --}}
                        <div class="info">
                            <span>🚚 13 Dh</span>
                            <span>⏱ 15 - 25 min</span>
                            <span>⭐ 4.9</span>
                            <span class="status"><a href="{{ route('homePage') }}">Back</a></span>
                        </div>
                    </div>
                </div>

                <!-- Swiper Container -->
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <a href="{{ route('homePage')}}" class="text-decoration-none">
                            <div class="swiper-slide active">Menu</div>
                        </a>
                        @foreach ($categories as $categorie)
                            <div class="swiper-slide">
                                <a href="{{route('ProductPage',$categorie->categorie_name)}}" class="text-decoration-none" style="color: rgb(102, 99, 99)">{{ $categorie->categorie_name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="section">
                    <!-- Your product items here (same as before) -->
                    @foreach ($products as $product)
                        <div class="product">
                            <div class="product-info">
                                <div>{{ $product->product_name }}</div>
                                <div>{{ $product->price }} Dh</div>
                            </div>
                            <div>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="jus Banane" class="product-img" />
                                <button class="add-button" onclick="return alert('add')">Ajouter</button>
                            </div>
                        </div>
                    @endforeach



                    <!-- More product items... -->
                </div>
            </div>
        </div>
    </div>
@endsection
