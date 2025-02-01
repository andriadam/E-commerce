@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-lg">
        <div class="card-header bg-success text-white text-center">
          <h4 class="mb-0">Edit {{ $title }}</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.productClass.update', $product_class->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            
            <div class="mb-3">
              <label for="class_name" class="form-label fw-semibold">Nama Class</label>
              <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" 
                value="{{ old('class_name', $product_class->class_name) }}" required>
              @error('class_name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success fw-bold">
                <i class="bi bi-pencil"></i> Update Data
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection