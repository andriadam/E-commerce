@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-header bg-success text-white text-center">
          <h4 class="mb-0">Edit Produk</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="product_name" class="form-label">Nama Produk</label>
              <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" 
                value="{{ old('product_name', $product->product_name) }}" required>
              @error('product_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="price" class="form-label">Harga</label>
              <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" 
                value="{{ old('price', $product->price) }}" required>
              @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="stock" class="form-label">Stok</label>
              <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" 
                value="{{ old('stock', $product->stock) }}" required>
              @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Deskripsi</label>
              <textarea class="form-control @error('description') is-invalid @enderror" name="description" 
                rows="3" required>{{ old('description', $product->description) }}</textarea>
              @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="product_class_id" class="form-label">Kelas</label>
              <select class="form-select" name="product_class_id" required>
                <option disabled>- Pilih Kelas -</option>
                @foreach ($product_class as $row)
                  <option value="{{ $row->id }}" 
                    {{ old('product_class_id', $product->product_class_id) == $row->id ? 'selected' : '' }}>
                    {{ $row->class_name }}
                  </option>
                @endforeach
              </select>
              @error('product_class_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
              <label for="product_group_id" class="form-label">Grup</label>
              <select class="form-select" name="product_group_id" required>
                <option disabled>- Pilih Grup -</option>
                @foreach ($product_group as $row)
                  <option value="{{ $row->id }}" 
                    {{ old('product_group_id', $product->product_group_id) == $row->id ? 'selected' : '' }}>
                    {{ $row->group_name }}
                  </option>
                @endforeach
              </select>
              @error('product_group_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success px-4">Update Produk</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection