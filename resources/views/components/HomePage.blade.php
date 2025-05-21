@extends('layouts.app')
@section('title')
    Homa Page
@endsection

@section('content')
    <!-- Main Content Area -->
    <div class="content-area">
        <!-- Categories Swiper Container -->
        <div class="swiper categories-swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="category active">
                        <div class="category-icon"><i class="fas fa-utensils"></i></div>
                        <div>Restaurants</div>
                        <div>15 minutes</div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="category active">
                        <div class="category-icon"><i class="fas fa-shopping-basket"></i></div>
                        <div>Wanny <br> Supermarché</div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="category active">
                        <div class="category-icon"><i class="fas fa-truck"></i></div>
                        <div>Livraison</div>
                        <div>13 Dh</div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="category active">
                        <div class="category-icon"><i class="fas fa-spa"></i></div>
                        <div>Boutiques</div>
                        <div>Les fleurs</div>
                    </div>
                </div>
            </div>

            <!-- Add pagination if needed
        <div class="swiper-pagination"></div> -->
        </div>

        <div class="cashless-banner d-flex align-items-center">
            <div class="me-3"><i class="far fa-credit-card"></i></div>
            <div>ما تحتاجش الكاش خلص أونلاين</div>
            <div class="payment-method ms-auto">CMI ▼ VISA <i class="fas fa-heart"></i></div>
        </div>

        <div class="section-title">Menu </div>
        <div class="stores-container">
            @foreach ($menus as $menu)
                <a href="{{ route('ProductPage',$menu->categorie_name)}}" class="text-decoration-none">
                    <div class="store-card">
                        <div class="store-image">
                            <img src="{{ asset('storage/' . $menu->image) }}" alt="Menu Image">
                        </div>
                        <div class="p-3">
                            <div class="store-name">{{ $menu->categorie_name }}</div>
                            <div class="store-details">{{ $menu->time_take }} min</div>
                            <div class="store-rating">
                                <span class="thumb"><i class="fas fa-thumbs-up"></i> Good Shoes </span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endsection
