                <!-- Desktop Sidebar -->

                <div class="sidebar d-none d-md-block">
                    <div class="sidebar-nav">
                        <a href="{{ route('homePage') }}" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-home"></i></div>

                            <div>Home</div>
                        </a>
                        <a href="#" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-utensils"></i></div>
                            <div>Table Reservation</div>
                        </a>
                        <a href="#" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-shopping-basket"></i></div>
                            <div>Wanny Supermarché</div>
                        </a>
                        {{-- <a href="#" class="sidebar-nav-item text-decoration-none text-reset">
                        <div class="sidebar-nav-icon"><i class="fas fa-star"></i></div>
                        <div>Wanny</div>
                    </a> --}}
                        <a href="{{ route('logout') }}" class="sidebar-nav-item text-decoration-none text-reset">
                            <div class="sidebar-nav-icon"><i class="fas fa-home"></i></div>
                            <div>Orders</div>
                        </a>
                        @auth
                            <a href="{{ route('settings') }}" class="sidebar-nav-item text-decoration-none text-reset">
                                <div class="sidebar-nav-icon"><i class="fas fa-user"></i></div>
                                <div>Profile</div>
                            </a>
                        @endauth
                        @guest
                            <a href="{{ route('show.login') }}" class="sidebar-nav-item text-decoration-none text-reset">
                                <div class="sidebar-nav-icon"><i class="fas fa-user"></i></div>
                                <div>Sing up</div>
                            </a>
                        @endguest



                    </div>
                </div>
