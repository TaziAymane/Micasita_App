                <!-- Desktop Sidebar -->

                <div class="sidebar d-none d-md-block">
                    <div class="sidebar-nav">
                        <a href="{{ route('homePage') }}" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-home"></i></div>

                            <div>Acceuile</div>
                        </a>
                        <a href="#" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-utensils"></i></div>
                            <div>reservation table</div>
                        </a>
                        <a href="{{ route('product.cart')}}" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-shopping-basket"></i></div>
                            <div>Panier</div>
                        </a>
                        {{-- <a href="#" class="sidebar-nav-item text-decoration-none text-reset">
                        <div class="sidebar-nav-icon"><i class="fas fa-star"></i></div>
                        <div>Wanny</div>
                    </a> --}}
                        <a href="" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-home"></i></div>
                            <div>Me commande</div>
                        </a>
                        @auth
                            <a href="{{ route('settings') }}" class="sidebar-nav-item text-decoration-none text-reset">
                                <div class="sidebar-nav-icon"><i class="fas fa-user"></i></div>
                                <div>Profile</div>
                            </a>
                        @endauth
                        @guest
                            <a href="{{ route('loginfORM')}}" class="sidebar-nav-item text-decoration-none text-reset">
                                <div class="sidebar-nav-icon"><i class="fas fa-user"></i></div>
                                <div>Se connect</div>
                            </a>
                        @endguest



                    </div>
                </div>
