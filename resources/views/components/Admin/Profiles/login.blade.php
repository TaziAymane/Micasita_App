    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Phone Authentication</title>
        <!-- Bootstrap 5 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <style>
            body {
                background-color: #f8f9fa;
                height: 100vh;
                display: flex;
                align-items: center;
            }
            .login-card {
                border: none;
                border-radius: 10px;
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            }
            .login-header {
                background-color: #4e73df;
                color: white;
                border-radius: 10px 10px 0 0;
            }
            .intl-tel-input {
                width: 100%;
            }
            .btn-login {
                background-color: #4e73df;
                border: none;
            }
            .btn-Register {
                background-color: #58617b;
                border: none;
            }
            .btn-login:hover {
                background-color: #2e59d9;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card login-card">
                        <div class="card-header login-header text-center py-4">
                            <h3><i class="bi bi-shield-lock"></i> Account Login</h3>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('profile.login')}}">
                                @csrf

                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input id="name" type="text" 
                                            class="form-control" 
                                            name="username" value="{{ old('username') }}" 
                                            autocomplete="username" autofocus
                                            placeholder="Enter your full name">
                                    </div>
                                </div>

                               

                                <div class="mb-3">
                                <label for="name" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input  type="password" 
                                           class="form-control" 
                                           name="password" value="{{ old('password') }}" 
                                          placeholder="Enter a password">
                                </div>
                               
                            </div>
                                

                               

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-primary btn-login py-2">
                                        <i class="bi bi-box-arrow-in-right"></i> Login
                                    </button>
                                </div>

                                {{-- <div class="d-grid mb-3">
                                    <a href="{{ route('profile.register')}}" class="btn btn-primary btn-Register py-2">
                                        Register
                                    </a>
                                </div> --}}

                            
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            Don't have an account? <a href="{{ route('profile.register')}}">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- International Telephone Input -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        
        <script>
            // Initialize phone number input
            const phoneInput = document.querySelector("#phone");
            const iti = window.intlTelInput(phoneInput, {
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    fetch("https://ipapi.co/json")
                        .then(res => res.json())
                        .then(data => callback(data.country_code))
                        .catch(() => callback("ma"));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                separateDialCode: true,
                preferredCountries: ['us', 'gb', 'ca', 'au', 'in', 'ng']
            });

            // Update hidden input with full international number before form submission
            phoneInput.form.addEventListener('submit', function() {
                phoneInput.value = iti.getNumber();
            });
        </script>
    </body>
    </html>