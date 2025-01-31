@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5 text-center">
    <h2 class="fw-bold text-primary">{{ $title }}</h2>
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white text-center fw-bold fs-5">
          Detail Produk
        </div>
        <div class="card-body text-center">
          <h4 class="card-title fw-bold text-dark">{{ $product->product_name }}</h4>
          <h5 class="text-success fw-semibold">Rp. {{ number_format($product->price, 0, 0, '.') }}</h5>
          <span class="badge bg-secondary px-3 py-2 mt-2">Stok: {{ $product->stock }}</span>
          <div class="mt-3">
            <p class="mb-1"><strong>Produk Grup:</strong> {{ $product->productGroup->group_name }}</p>
            <p class="mb-1"><strong>Produk Class:</strong> {{ $product->productClass->class_name }}</p>
          </div>
          <p class="card-text mt-4 text-muted" style="min-height: 60px">
            {!! Str::limit(strip_tags($product->description), 100) !!}
          </p>
        </div>
        <div class="card-footer bg-light text-center">
          <button class="btn btn-outline-primary rounded-pill px-4">
            <i class="fas fa-cart-plus"></i> Tambah ke Keranjang
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
