@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
          <h4 class="mb-0">Tambah {{ $title }}</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.productGroup.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
              <label for="group_name" class="form-label fw-semibold">Nama Grup</label>
              <input type="text" name="group_name" class="form-control @error('group_name') is-invalid @enderror" 
                value="{{ old('group_name') }}" placeholder="Masukkan nama grup" autofocus required>
              @error('group_name')
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