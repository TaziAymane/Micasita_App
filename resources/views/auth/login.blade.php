<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiCasita - Food Delivery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0c1445 0%, #1e3c72 25%, #2a5298 50%, #1e3c72 75%, #0c1445 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Night sky stars effect */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(2px 2px at 20px 30px, #ffffff, transparent),
                radial-gradient(2px 2px at 40px 70px, rgba(255, 255, 255, 0.8), transparent),
                radial-gradient(1px 1px at 90px 40px, #ffffff, transparent),
                radial-gradient(1px 1px at 130px 80px, rgba(255, 255, 255, 0.6), transparent),
                radial-gradient(2px 2px at 160px 30px, #ffffff, transparent);
            background-repeat: repeat;
            background-size: 200px 100px;
            animation: twinkle 4s ease-in-out infinite alternate;
            z-index: 0;
        }

        @keyframes twinkle {
            0% {
                opacity: 0.3;
            }

            100% {
                opacity: 1;
            }
        }

        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(12, 20, 69, 0.3);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
            position: relative;
            z-index: 10;
            border: 2px solid rgba(42, 82, 152, 0.3);
        }

        .form-container {
            padding: 30px 25px;
            position: relative;
            z-index: 2;
        }

        .brand-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo {
            font-size: 2.5rem;
            color: #1e3c72;
            margin-bottom: 5px;
        }

        .brand-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e3c72;
            margin-bottom: 5px;
        }

        .brand-tagline {
            font-size: 0.9rem;
            color: #666;
            font-style: italic;
        }

        .form-toggle {
            display: flex;
            margin-bottom: 25px;
            background: #f0f4ff;
            border-radius: 50px;
            padding: 5px;
            position: relative;
            border: 2px solid #2a5298;
        }

        .toggle-btn {
            flex: 1;
            padding: 12px 25px;
            border: none;
            background: transparent;
            border-radius: 50px;
            font-weight: 600;
            color: #1e3c72;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            z-index: 2;
        }

        .toggle-btn.active {
            color: white;
        }

        .toggle-slider {
            position: absolute;
            top: 5px;
            left: 5px;
            width: calc(50% - 5px);
            height: calc(100% - 10px);
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border-radius: 50px;
            transition: transform 0.3s ease;
            z-index: 1;
        }

        .toggle-slider.register {
            transform: translateX(100%);
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
            font-weight: 700;
            font-size: 2rem;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            border: 2px solid #d6e3ff;
            border-radius: 15px;
            padding: 12px 15px 12px 45px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f0f4ff;
        }

        .form-control:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.25);
            background: white;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #1e3c72;
            font-size: 18px;
            z-index: 3;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            border: none;
            border-radius: 15px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(30, 60, 114, 0.4);
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #2a5298;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #1e3c72;
        }

        .social-login {
            margin-top: 20px;
            text-align: center;
        }

        .social-divider {
            position: relative;
            margin: 20px 0;
            text-align: center;
            color: #666;
        }

        .social-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #d6e3ff;
        }

        .social-divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: 0 10px;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
        }

        .social-btn.google {
            background: #db4437;
        }

        .social-btn.facebook {
            background: #3b5998;
        }

        .social-btn.twitter {
            background: #1da1f2;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .alert {
            border-radius: 15px;
            border: none;
            padding: 15px 20px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
        }

        .alert-danger {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
        }

        /* Moon effect */
        .moon {
            position: absolute;
            top: 10%;
            right: 15%;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f5f5dc 0%, #e6e6fa 100%);
            box-shadow: 0 0 30px rgba(245, 245, 220, 0.3);
            z-index: 1;
            animation: moonGlow 3s ease-in-out infinite alternate;
        }

        @keyframes moonGlow {
            0% {
                box-shadow: 0 0 30px rgba(245, 245, 220, 0.3);
            }

            100% {
                box-shadow: 0 0 50px rgba(245, 245, 220, 0.5);
            }
        }

        /* Cloud effects */
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            opacity: 0.6;
            animation: drift 20s linear infinite;
        }

        .cloud:nth-child(1) {
            width: 100px;
            height: 40px;
            top: 20%;
            left: -100px;
            animation-delay: 0s;
        }

        .cloud:nth-child(2) {
            width: 80px;
            height: 30px;
            top: 40%;
            left: -80px;
            animation-delay: 10s;
        }

        @keyframes drift {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(calc(100vw + 100px));
            }
        }

        /* FOOD DELIVERY ANIMATIONS - Updated with night blue colors */

        /* Delivery truck convoy */
        .delivery-truck {
            position: absolute;
            font-size: 2.5rem;
            color: rgba(42, 82, 152, 0.4);
            animation: driveAcross 20s linear infinite;
            z-index: 2;
        }

        .delivery-truck:nth-child(1) {
            bottom: 15%;
            animation-delay: 0s;
        }

        .delivery-truck:nth-child(2) {
            bottom: 25%;
            animation-delay: 7s;
            font-size: 2rem;
            color: rgba(30, 60, 114, 0.3);
        }

        .delivery-truck:nth-child(3) {
            bottom: 35%;
            animation-delay: 14s;
            font-size: 1.8rem;
            color: rgba(12, 20, 69, 0.3);
        }

        @keyframes driveAcross {
            0% {
                transform: translateX(-100px) scaleX(1);
                left: 0;
            }

            100% {
                transform: translateX(100px) scaleX(1);
                left: 100%;
            }
        }

        /* Flying food items */
        .flying-food {
            position: absolute;
            font-size: 2rem;
            animation: flyFood 15s ease-in-out infinite;
            z-index: 2;
        }

        .flying-food:nth-child(1) {
            top: 20%;
            left: -50px;
            color: rgba(30, 60, 114, 0.3);
            animation-delay: 0s;
        }

        .flying-food:nth-child(2) {
            top: 30%;
            left: -50px;
            color: rgba(42, 82, 152, 0.4);
            animation-delay: 5s;
        }

        .flying-food:nth-child(3) {
            top: 40%;
            left: -50px;
            color: rgba(12, 20, 69, 0.3);
            animation-delay: 10s;
        }

        @keyframes flyFood {
            0% {
                transform: translateX(0) translateY(0) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            50% {
                transform: translateX(50vw) translateY(-30px) rotate(180deg);
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateX(100vw) translateY(0) rotate(360deg);
                opacity: 0;
            }
        }

        /* Delivery route lines */
        .delivery-route {
            position: absolute;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(42, 82, 152, 0.3), transparent);
            animation: routeAnimation 8s ease-in-out infinite;
            z-index: 1;
        }

        .delivery-route:nth-child(1) {
            top: 25%;
            left: 0;
            width: 100%;
            animation-delay: 0s;
        }

        .delivery-route:nth-child(2) {
            top: 45%;
            left: 0;
            width: 100%;
            animation-delay: 4s;
        }

        .delivery-route:nth-child(3) {
            top: 65%;
            left: 0;
            width: 100%;
            animation-delay: 2s;
        }

        @keyframes routeAnimation {

            0%,
            100% {
                opacity: 0;
                transform: scaleX(0);
            }

            50% {
                opacity: 1;
                transform: scaleX(1);
            }
        }

        /* Floating restaurant icons */
        .restaurant-icon {
            position: absolute;
            font-size: 1.5rem;
            color: rgba(30, 60, 114, 0.2);
            animation: restaurantFloat 12s ease-in-out infinite;
            z-index: 1;
        }

        .restaurant-icon:nth-child(1) {
            top: 15%;
            left: 20%;
            animation-delay: 0s;
        }

        .restaurant-icon:nth-child(2) {
            top: 70%;
            right: 25%;
            animation-delay: 4s;
        }

        .restaurant-icon:nth-child(3) {
            top: 50%;
            left: 15%;
            animation-delay: 8s;
        }

        @keyframes restaurantFloat {

            0%,
            100% {
                transform: translateY(0) scale(1);
                opacity: 0.2;
            }

            50% {
                transform: translateY(-20px) scale(1.1);
                opacity: 0.4;
            }
        }

        /* Delivery notification bubbles */
        .notification-bubble {
            position: absolute;
            width: 60px;
            height: 60px;
            background: rgba(42, 82, 152, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: rgba(30, 60, 114, 0.4);
            animation: bubbleNotification 6s ease-in-out infinite;
            z-index: 2;
        }

        .notification-bubble:nth-child(1) {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .notification-bubble:nth-child(2) {
            bottom: 20%;
            right: 20%;
            animation-delay: 3s;
        }

        @keyframes bubbleNotification {

            0%,
            100% {
                transform: scale(0);
                opacity: 0;
            }

            50% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Delivery scooter */
        .delivery-scooter {
            position: absolute;
            bottom: 10%;
            font-size: 2rem;
            color: rgba(12, 20, 69, 0.4);
            animation: scooterRide 25s linear infinite;
            z-index: 2;
        }

        @keyframes scooterRide {
            0% {
                transform: translateX(-80px);
                left: 0;
            }

            100% {
                transform: translateX(80px);
                left: 100%;
            }
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 25px 20px;
            }

            .form-title {
                font-size: 1.8rem;
            }

            .toggle-btn {
                padding: 10px 15px;
                font-size: 14px;
            }

            .brand-name {
                font-size: 1.5rem;
            }

            /* Reduce animation sizes on mobile */
            .delivery-truck,
            .flying-food,
            .delivery-scooter {
                font-size: 1.5rem;
            }

            .notification-bubble {
                width: 40px;
                height: 40px;
                font-size: 1rem;
            }
        }

        @media (max-height: 700px) {
            .form-container {
                padding: 20px 25px;
            }

            .brand-header {
                margin-bottom: 15px;
            }

            .brand-logo {
                font-size: 2rem;
            }

            .brand-name {
                font-size: 1.5rem;
            }

            .form-title {
                font-size: 1.8rem;
                margin-bottom: 15px;
            }

            .input-group {
                margin-bottom: 15px;
            }

            .form-control {
                padding: 10px 12px 10px 40px;
            }

            .toggle-btn {
                padding: 10px 20px;
                font-size: 14px;
            }

            .btn-primary {
                padding: 10px 25px;
                margin-top: 15px;
            }

            .social-divider {
                margin: 15px 0;
            }

            .social-login {
                margin-top: 15px;
            }

            .social-btn {
                width: 40px;
                height: 40px;
                margin: 0 8px;
            }

            .moon {
                width: 60px;
                height: 60px;
            }
        }

        @media (max-height: 600px) {
            body {
                padding: 10px;
            }

            .form-container {
                padding: 15px 20px;
            }

            .brand-header {
                margin-bottom: 10px;
            }

            .brand-logo {
                font-size: 1.8rem;
            }

            .brand-name {
                font-size: 1.3rem;
            }

            .brand-tagline {
                font-size: 0.8rem;
            }

            .form-title {
                font-size: 1.6rem;
                margin-bottom: 10px;
            }

            .form-toggle {
                margin-bottom: 15px;
            }

            .input-group {
                margin-bottom: 12px;
            }

            .form-control {
                padding: 8px 10px 8px 35px;
                font-size: 14px;
            }

            .input-icon {
                left: 12px;
                font-size: 16px;
            }

            .toggle-btn {
                padding: 8px 15px;
                font-size: 13px;
            }

            .btn-primary {
                padding: 8px 20px;
                margin-top: 10px;
                font-size: 14px;
            }

            .social-divider {
                margin: 10px 0;
                font-size: 14px;
            }

            .social-login {
                margin-top: 10px;
            }

            .forgot-password {
                margin-top: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <!-- Night sky elements -->
    <div class="moon"></div>
    <div class="cloud"></div>
    <div class="cloud"></div>

    <!-- FOOD DELIVERY ANIMATIONS -->

    <!-- Delivery truck convoy -->
    <div class="delivery-truck"><i class="fas fa-truck" style="color: rgba(243, 180, 64, 0.98)"></i></div>
    <div class="delivery-truck"><i class="fas fa-shipping-fast"style="color: rgba(243, 180, 64, 0.98)"></i></div>
    <div class="delivery-truck"><i class="fas fa-truck-moving" style="color: rgba(243, 180, 64, 0.98)"></i></div>

    <!-- Flying food items -->
    <div class="flying-food"><i class="fas fa-pizza-slice" style="color: rgba(243, 180, 64, 0.98)"></i></div>
    <div class="flying-food"><i class="fas fa-hamburger" style="color: rgba(243, 180, 64, 0.98)"></i></div>
    <div class="flying-food"><i class="fas fa-ice-cream" style="color: rgba(243, 180, 64, 0.98)"></i></div>

    <!-- Delivery route lines -->
    <div class="delivery-route"></div>
    <div class="delivery-route"></div>
    <div class="delivery-route"></div>

    <!-- Restaurant icons -->
    <div class="restaurant-icon"><i class="fas fa-utensils"></i></div>
    <div class="restaurant-icon"><i class="fas fa-store"></i></div>
    <div class="restaurant-icon"><i class="fas fa-coffee"></i></div>

    <!-- Notification bubbles -->
    <div class="notification-bubble"><i class="fas fa-bell"></i></div>
    <div class="notification-bubble"><i class="fas fa-check"></i></div>

    <!-- Delivery scooter -->
    <div class="delivery-scooter"><i class="fas fa-motorcycle" style="color: rgba(243, 180, 64, 0.98)"></i></div>

    <div class="auth-container">
        <div class="form-container">
            <!-- Brand Header -->
            <div class="brand-header">
                <div class="brand-logo">
                    <i class="fas fa-home"></i>
                </div>
                <div class="brand-name">MiCasita</div>
                <div class="brand-tagline">Delicious food delivered to your door</div>
            </div>

            <!-- Form Toggle -->
            <div class="form-toggle">
                <button class="toggle-btn active" onclick="showLogin()">Login</button>
                <button class="toggle-btn" onclick="showRegister()">Register</button>
                <div class="toggle-slider" id="toggleSlider"></div>
            </div>

            <!-- Login Form -->

            <div class="form-section active" id="loginForm">
                <h2 class="form-title">Welcome Back!</h2>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="text" class="form-control" value="{{ old('nomComplait')}}" placeholder="Nom Complait" name="nomComplait">
                    </div>
                    @error('nomComplait')
                        <div class="alert alert-danger">
                            {{ $message}}
                        </div>
                    @enderror
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="tele" class="form-control"  value="{{ old('tele')}}" placeholder="Telephone" name="tele">
                    </div>
                    @error('tele')
                        <div class="alert alert-danger">
                            {{ $message}}
                        </div>
                    @enderror
                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-control" placeholder="password" name="password">
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Order Now
                    </button>
                </form>

                <div class="forgot-password">
                    <a href="#" onclick="showForgotPassword()">Forgot your password?</a>
                </div>

                <div class="social-divider">
                    <span>Or continue with</span>
                </div>

                <div class="social-login">
                    <a href="#" class="social-btn google">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            </form>


            <!-- Register Form -->

            <div class="form-section" id="registerForm">
                <h2 class="form-title">Join MiCasita</h2>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" class="form-control" placeholder="Nom Complait" name="nomComplait">
                    </div>

                    <div class="input-group">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" class="form-control" placeholder="Telephone" name="tele">
                    </div>

                    <div class="input-group">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <textarea class="form-control" placeholder="Delivery Address & Special Instructions" name="adress" rows="3"
                            style="padding-left: 50px; resize: vertical;"></textarea>
                    </div>

                    <div class="input-group">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-utensils me-2"></i>Start Ordering
                    </button>
                </form>

                <div class="social-divider">
                    <span>Or register with</span>
                </div>

                <div class="social-login">
                    <a href="#" class="social-btn google">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-btn facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-btn twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showLogin() {
            document.getElementById('loginForm').classList.add('active');
            document.getElementById('registerForm').classList.remove('active');
            document.getElementById('toggleSlider').classList.remove('register');

            // Update toggle buttons
            document.querySelectorAll('.toggle-btn')[0].classList.add('active');
            document.querySelectorAll('.toggle-btn')[1].classList.remove('active');
        }

        function showRegister() {
            document.getElementById('registerForm').classList.add('active');
            document.getElementById('loginForm').classList.remove('active');
            document.getElementById('toggleSlider').classList.add('register');

            // Update toggle buttons
            document.querySelectorAll('.toggle-btn')[1].classList.add('active');
            document.querySelectorAll('.toggle-btn')[0].classList.remove('active');
        }

        function showForgotPassword() {
            alert('We\'ll send you a link to reset your password and get back to ordering delicious food!');
        }

        // Form submission handlers
        document.getElementById('loginFormElement').addEventListener('submit', function(e) {
            e.preventDefault();

            // Create success alert
            const alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.innerHTML =
                '<i class="fas fa-check-circle me-2"></i>Welcome back! Let\'s get you some delicious food...';

            // Insert alert at the top of the form
            this.insertBefore(alert, this.firstChild);

            // Remove alert after 3 seconds
            setTimeout(() => {
                alert.remove();
            }, 3000);
        });

        document.getElementById('registerFormElement').addEventListener('submit', function(e) {
            e.preventDefault();

            const password = this.querySelector('input[placeholder="Password"]').value;
            const confirmPassword = this.querySelector('input[placeholder="Confirm Password"]').value;

            // Remove existing alerts
            const existingAlert = this.querySelector('.alert');
            if (existingAlert) {
                existingAlert.remove();
            }

            if (password !== confirmPassword) {
                // Create error alert
                const alert = document.createElement('div');
                alert.className = 'alert alert-danger';
                alert.innerHTML =
                    '<i class="fas fa-exclamation-triangle me-2"></i>Passwords do not match! Please try again.';

                // Insert alert at the top of the form
                this.insertBefore(alert, this.firstChild);

                // Remove alert after 3 seconds
                setTimeout(() => {
                    alert.remove();
                }, 3000);

                return;
            }

            // Create success alert
            const alert = document.createElement('div');
            alert.className = 'alert alert-success';
            alert.innerHTML =
                '<i class="fas fa-check-circle me-2"></i>Welcome to MiCasita! Your culinary journey begins now!';

            // Insert alert at the top of the form
            this.insertBefore(alert, this.firstChild);

            // Remove alert after 3 seconds
            setTimeout(() => {
                alert.remove();
            }, 3000);
        });
    </script>
</body>

</html>
