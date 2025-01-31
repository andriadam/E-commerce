<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: linear-gradient(135deg, #007bff, #6610f2);">
  <div class="container">
    <a class="navbar-brand fw-bold fs-4" href="/">
      <i class="fas fa-store"></i> E-Commerce
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('/') || Request::is('product*')  ? 'active' : '' }}" href="{{ route('product.index') }}">
            <i class="fas fa-box-open"></i> Product
          </a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('login*') ? 'active' : '' }}" href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('register*') ? 'active' : '' }}" href="{{ route('register') }}">
            <i class="fas fa-user-plus"></i> Register
          </a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('orders*') ? 'active' : '' }}" href="{{ route('user.order.index') }}">
            <i class="fas fa-clipboard-list"></i> Pesanan Saya
          </a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link px-3 {{ Request::is('cart*') ? 'active' : '' }}" href="{{ route('user.cart.list') }}">
            <i class="fas fa-shopping-cart"></i> Keranjang
            @if(\Cart::getContent()->count() > 0)
              <span class="position-absolute top-0 start-100 badge rounded-pill bg-danger"
                style="font-size: 0.8rem; padding: 5px 8px;">
                {{ \Cart::getContent()->count() }}
              </span>
            @endif
          </a>
        </li>
        @endauth
      </ul>
      @auth
      <form class="d-flex" action="{{ route('logout') }}" method="post">
        @csrf
        <button class="btn btn-outline-light fw-bold rounded-pill px-4" type="submit">
          <i class="fas fa-sign-out-alt"></i> Logout
        </button>
      </form>
      @endauth
    </div>
  </div>
</nav>