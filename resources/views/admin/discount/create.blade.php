@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Tambah Diskon</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.discount.store') }}" method="post">
            @csrf
            
            <div class="mb-3">
              <label for="name" class="form-label fw-semibold">Nama Diskon</label>
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                value="{{ old('name') }}" placeholder="Masukkan nama diskon" required>
              @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="code" class="form-label fw-semibold">Kode Diskon</label>
              <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" 
                value="{{ old('code') }}" required>
              @error('code')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="description" class="form-label fw-semibold">Deskripsi</label>
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                rows="2" required>{{ old('description') }}</textarea>
              @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="percentage" class="form-label fw-semibold">Persentase Diskon</label>
              <input type="number" name="percentage" class="form-control @error('percentage') is-invalid @enderror" 
                min="1" max="100" value="{{ old('percentage') }}" required>
              @error('percentage')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="max_disc" class="form-label fw-semibold">Maksimal Diskon (Rp)</label>
              <input type="number" name="max_disc" class="form-control @error('max_disc') is-invalid @enderror" 
                value="{{ old('max_disc') }}" required>
              @error('max_disc')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            
            <div class="text-end">
              <button type="submit" class="btn btn-primary fw-bold">
                <i class="bi bi-plus-circle"></i> Tambah Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection