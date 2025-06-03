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
    <!-- International Telephone Input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
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
        
        /* Style for the phone input container */
        .phone-input-container {
            width: 100%;
        }
        
        /* Adjust the input group to work with intl-tel-input */
        .input-group.intl-tel-input-wrapper {
            flex-wrap: nowrap;
        }
        
        .iti {
            width: 100%;
        }
        
        .iti__flag-container {
            padding: 0 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card">
                    <div class="card-header login-header text-center py-4">
                        <h3><i class="bi bi-shield-lock"></i> Account register</h3>
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

                        <form method="POST" action="{{ route('profile.store') }}" id="registrationForm">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="username" id="username" autofocus autocomplete="name" placeholder="Enter your full name">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <div class="input-group intl-tel-input-wrapper">
                                    {{-- <span class="input-group-text"><i class="bi bi-phone"></i></span> --}}
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number">
                                </div>
                                <input type="hidden" name="phone_full" id="phone-full">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                    <input type="text" class="form-control" name="adress"  autocomplete="address" placeholder="Enter your address">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password">
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary btn-login py-2">
                                    <i class="bi bi-box-arrow-in-right"></i> Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- International Telephone Input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
            // Initialize phone number input
            // const phoneInput = document.querySelector("#phone");
            // const iti = window.intlTelInput(phoneInput, {
            //     initialCountry: "auto",
            //     geoIpLookup: function(callback) {
            //         fetch("https://ipapi.co/json")
            //             .then(res => res.json())
            //             .then(data => callback(data.country_code))
            //             .catch(() => callback("us")); // default to US if lookup fails
            //     },
            //     separateDialCode: true,
            //     preferredCountries: ['us', 'gb', 'ca', 'au', 'in', 'ma', 'fr', 'de'],
            //     utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            // });

            // Update hidden input with full international number before form submission
            // document.getElementById('registrationForm').addEventListener('submit', function(e) {
            //     const phoneInput = document.querySelector("#phone");
            //     const phoneFullInput = document.querySelector("#phone-full");
                
            //     if (phoneInput.value.trim()) {
            //         if (iti.isValidNumber()) {
            //             phoneFullInput.value = iti.getNumber();
            //         } else {
            //             e.preventDefault();
            //             alert('Please enter a valid phone number');
            //             phoneInput.focus();
            //         }
            //     }
            // });

            // Fix for Bootstrap input group with intl-tel-input
        //     const inputGroup = document.querySelector('.intl-tel-input-wrapper');
        //     const itiContainer = inputGroup.querySelector('.iti');
        //     if (itiContainer) {
        //         itiContainer.style.width = '100%';
        //         inputGroup.style.flexWrap = 'nowrap';
        //     }
        // });
    </script>
</body>
</html>