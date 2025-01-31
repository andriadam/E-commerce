@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Edit {{ $title }}</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('admin.productClass.update', $product_class->id) }}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="class_name" class="col-sm-2 col-form-label">Nama Kelas</label>
        <div class="col-sm-10">
          <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror"
            autofocus required value="{{ old('class_name', $product_class->class_name) }}">
          @error('class_name')
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