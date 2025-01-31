@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Edit {{ $title }}</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="product_name" class="col-sm-2 col-form-label">Nama Produk</label>
        <div class="col-sm-10">
          <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror"
            autofocus required value="{{ old('product_name', $product->product_name) }}">
          @error('product_name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga</label>
        <div class="col-sm-10">
          <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" required
            value="{{ old('price', $product->price) }}">
          @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Stok</label>
        <div class="col-sm-10">
          <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" required
            value="{{ old('stock', $product->stock) }}">
          @error('stock')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
          <textarea class="form-control @error('description') is-invalid @enderror" name="description"
            required>{{ old('stock', $product->stock) }}</textarea>
          @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="product_class_id" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
          <select class="form-select" name="product_class_id" aria-label="Default select example" required>
            @foreach ($product_class as $row)
            @if(old('product_class_id', $product->productClass->id) == $row->id)
            <option value="{{ $product->productClass->id }}" selected>{{ $product->productClass->class_name }}</option>
            @else
            <option value="{{ $row->id }}">{{ $row->class_name }}</option>
            @endif
            @endforeach
          </select>
          @error('product_class_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="product_group_id" class="col-sm-2 col-form-label">Grup</label>
        <div class="col-sm-10">
          <select class="form-select" name="product_group_id" aria-label="Default select example" required>
            @foreach ($product_group as $row)
            @if(old('product_group_id', $product->productGroup->id) == $row->id)
            <option value="{{ $product->productGroup->id }}" selected>{{ $product->productGroup->group_name }}</option>
            @else
            <option value="{{ $row->id }}">{{ $row->group_name }}</option>
            @endif
            @endforeach
          </select>
          @error('product_group_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <div class="d-grid gap-2" class="col-sm-2 col-form-label">
          <button type="submit" class="btn btn-primary">Edit Data</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection