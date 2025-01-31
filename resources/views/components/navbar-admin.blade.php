<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background: linear-gradient(135deg, #343a40, #6c757d);">
  <div class="container">
    <a class="navbar-brand fw-bold fs-4" href="/">
      <i class="fas fa-cogs"></i> Admin Panel
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('admin/*product') ? 'active' : '' }}" href="{{ route('admin.product.index') }}">
            <i class="fas fa-box"></i> Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('admin/productClass*') ? 'active' : '' }}" href="{{ route('admin.productClass.index') }}">
            <i class="fas fa-th-large"></i> Kelas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('admin/productGroup*') ? 'active' : '' }}" href="{{ route('admin.productGroup.index') }}">
            <i class="fas fa-layer-group"></i> Group
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('admin/discount*') ? 'active' : '' }}" href="{{ route('admin.discount.index') }}">
            <i class="fas fa-tags"></i> Diskon
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 {{ Request::is('admin/order*') ? 'active' : '' }}" href="{{ route('admin.order.index') }}">
            <i class="fas fa-clipboard-list"></i> Pesanan
          </a>
        </li>
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