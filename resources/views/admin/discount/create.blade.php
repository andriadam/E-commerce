@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Insert a new discount
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.discount.store') }}" method="post">
                      @csrf
                        <div class="form-group mb-4">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                          @error('name')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group mb-4">
                          <label for="code" class="form-label">code</label>
                          <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required>
                          @error('code')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="form-group mb-4">
                          <label for="description" class="form-label">Description</label>
                          <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="0" rows="2" required>{{ old('description') }}</textarea>
                          @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group mb-4">
                          <label for="percentage" class="form-label">Discount percentage</label>
                          <input type="number" class="form-control @error('percentage') is-invalid @enderror" name="percentage" min="1" max="100" value="{{ old('percentage') }}" required>
                          @error('percentage')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group mb-4">
                          <label for="max_disc" class="form-label">Max Disc(Rupiah)</label>
                          <input type="number" class="form-control @error('max_disc') is-invalid @enderror" name="max_disc" value="{{ old('max_disc') }}" required>
                          @error('max_disc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                        <div class="form-group mb-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection