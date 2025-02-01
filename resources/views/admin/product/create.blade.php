@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Tambah Produk</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-3">
              <label for="product_name" class="form-label fw-semibold">Nama Produk</label>
              <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
                value="{{ old('product_name') }}" placeholder="Masukkan nama produk" autofocus required>
              @error('product_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="price" class="form-label fw-semibold">Harga</label>
              <div class="input-group">
                <span class="input-group-text">Rp</span>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                  value="{{ old('price') }}" placeholder="Masukkan harga" required>
              </div>
              @error('price')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="stock" class="form-label fw-semibold">Stok</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-box-seam"></i></span>
                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" 
                  value="{{ old('stock') }}" placeholder="Masukkan jumlah stok" required>
              </div>
              @error('stock')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="description" class="form-label fw-semibold">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3"
                placeholder="Masukkan deskripsi produk" required>{{ old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="product_class_id" class="form-label fw-semibold">Kelas</label>
              <select class="form-select" name="product_class_id" required>
                <option selected disabled>Pilih kelas</option>
                @foreach ($product_classes as $row)
                <option value="{{ $row->id }}" {{ old('product_class_id') == $row->id ? 'selected' : '' }}>
                  {{ $row->class_name }}
                </option>
                @endforeach
              </select>
              @error('product_class_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
    
            <div class="mb-3">
              <label for="product_group_id" class="form-label fw-semibold">Grup</label>
              <select class="form-select" name="product_group_id" required>
                <option selected disabled>Pilih grup</option>
                @foreach ($product_groups as $row)
                <option value="{{ $row->id }}" {{ old('product_group_id') == $row->id ? 'selected' : '' }}>
                  {{ $row->group_name }}
                </option>
                @endforeach
              </select>
              @error('product_group_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
    
            <div class="text-end">
              <button type="submit" class="btn btn-primary fw-bold">
                <i class="bi bi-plus-circle"></i> Tambah Produk
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection