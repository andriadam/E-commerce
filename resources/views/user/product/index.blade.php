@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="text-center">
    <h1 class="fw-bold text-primary">Daftar Produk</h1>
  </div>

  {{-- Filter Section --}}
  <div class="row justify-content-center my-4">
    <div class="col-md-3">
      <form action="{{ route('product.index') }}" method="post">
        @csrf
        <select name="class_id" class="form-select shadow-sm" onchange="this.form.submit()">
          <option selected>- Filter Kelas -</option>
          <option value="">Semua</option>
          @foreach ($product_classes as $row)
            <option value="{{ $row->id }}">{{ $row->class_name }}</option>
          @endforeach
        </select>
      </form>
    </div>
    <div class="col-md-3">
      <form action="{{ route('product.index') }}" method="post">
        @csrf
        <select name="group_id" class="form-select shadow-sm" onchange="this.form.submit()">
          <option selected>- Filter Grup -</option>
          <option value="">Semua</option>
          @foreach ($product_groups as $row)
            <option value="{{ $row->id }}">{{ $row->group_name }}</option>
          @endforeach
        </select>
      </form>
    </div>
  </div>

  {{-- Product List --}}
  <div class="row justify-content-center">
    @forelse ($products as $row)
    <div class="col-md-4 mb-4 d-flex align-items-stretch">
      <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body text-center">
          <h5 class="fw-bold text-dark">{{ $row->product_name }}</h5>
          <h6 class="text-success fw-semibold">Rp. {{ number_format($row->price, 0, 0, '.') }}</h6>
          <p class="text-muted mt-2" style="min-height: 60px">{!! Str::limit(strip_tags($row->description), 50) !!}</p>
          
          {{-- Action Buttons --}}
          <form action="{{ route('user.cart.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $row->id }}" name="id">
            <input type="hidden" value="{{ $row->product_name }}" name="name">
            <input type="hidden" value="{{ $row->price }}" name="price">
            <input type="hidden" value="1" name="quantity">
            <div class="d-flex gap-2">
              <a href="{{ url('product/' . $row->id) }}" 
                 class="btn btn-primary shadow-sm w-100"
                 style="background: linear-gradient(135deg, #007bff, #0056b3); border: none;">
                <i class="fas fa-info-circle me-2"></i> Detail
              </a>              
              <button class="btn btn-success shadow-sm w-100"
                      style="background: linear-gradient(135deg, #28a745, #218838); border: none;">
                <i class="fas fa-cart-plus me-2"></i> + Cart
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @empty
      <div class="col-12 text-center">
        <p class="text-muted fs-5">Tidak ada produk yang tersedia.</p>
      </div>
    @endforelse
  </div>
</div>
@endsection
