  <!-- Mobile Bottom Navigation -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <div class="bottom-nav d-md-none">
      <div class="row text-center">
          <div class="col nav-item active">
              <a href="{{ route('homePage') }}" class="d-block text-decoration-none text-reset">
                  <div class="nav-icon"><i class="fas fa-home"></i></div>
                  <div>Home</div>
              </a>
          </div>
          <div class="col nav-item ">
              <a href="#" class="d-block text-decoration-none text-reset">
                  <div class="nav-icon"><i class="fas fa-star"></i></div>
                  <div>Offers</div>
              </a>
          </div>
          @if (Auth::check())
              @php($cart = DB::table('carts')->where('user_id', '=', Auth::user()->id)->count('id'))
          @else
              @php($ip = $_SERVER['REMOTE_ADDR'])
              @php($cart = DB::table('carts')->where('user_ip', '=', $ip)->count('id'))
          @endif
          <div class="col nav-item ">
              <a href="{{ route('product.cart') }}" class="d-block text-decoration-none text-reset">
                  <div class="nav-icon"><i class="fas fa-clipboard-list"></i></div>
                  <div>cart({{ $cart }})</div>
              </a>
          </div>
          @auth
              <div class="col nav-item ">
                  <a href="{{ route('settings') }}" class="d-block text-decoration-none text-reset">
                      <div class="nav-icon"><i class="fas fa-user"></i></div>
                      <div>Profile</div>
                  </a>

              </div>
          @endauth
          @guest
             <div class="col nav-item ">
                  <a href="{{ route('loginfORM') }}" class="d-block text-decoration-none text-reset">
                      <div class="nav-icon"><i class="fas fa-user"></i></div>
                      <div>Se connect</div>
                  </a>
              </div>

          @endguest

      </div>
  </div>
