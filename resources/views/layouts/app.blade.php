<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <title>Micasita Website | @yield('title')</title>
</head>
<style>
    
</style>
<body>
    <div class="app-container">
        {{-- Session flashback --}}
            @include('components.flashbag')

            
         <div class="header">
            <div class="time">18:25</div>
            <div class="location fw-bold mb-3 d-flex align-items-center">
                <i class="bi bi-geo-alt-fill me-2" style="color: red;"></i>
                <span>Localisation</span>
            </div>
            <div class="input-group search-bar px-3 py-2 mb-3">
                <span class="input-group-text bg-transparent border-0"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control border-0" placeholder="Rechercher un produit ou un restaurant">
            </div>
        </div>
        <div class="main-content">
            {{-- desctop Navbar --}}
            @include('components.DesktopNav')


            

            {{-- Content --}}
            @yield('content')

        </div>
        <!-- Mobile Bottom Navigation -->
        @include('components.MobileNavbar')



    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{asset('JS/script.js')}}"></script>
</body>

</html>
