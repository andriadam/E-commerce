@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Edit {{ $title }}</h2>
</div>
<div class="row text-end mt-4 justify-content-center">
  <div class="col-md-8">
    <form action="{{ route('admin.productGroup.update', $product_group->id) }}" method="post"
      enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3 row">
        <label for="group_name" class="col-sm-2 col-form-label">Nama Grup</label>
        <div class="col-sm-10">
          <input type="text" name="group_name" class="form-control @error('group_name') is-invalid @enderror" autofocus
            required value="{{ old('group_name', $product_group->group_name) }}">
          @error('group_name')
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