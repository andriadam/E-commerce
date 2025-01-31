@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                       Update discount: {{ $discount->name }}
                    </div>
                    <div class="card-body">
                      <form action="{{ route('admin.discount.update', $discount->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{ $discount->id }}">
                        <div class="form-group mb-4">
                          <label for="name" class="form-label">Name</label>
                          <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" value="{{ old('name', $discount->name) }}" required>
                          @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                          @endif
                        </div>
                        <div class="form-group mb-4">
                          <label for="code" class="form-label">code</label>
                          <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : ''}}" name="code" value="{{ old('code', $discount->code) }}" required>
                          @if ($errors->has('code'))
                            <p class="text-danger">{{ $errors->first('code') }}</p>
                          @endif
                        </div>
                        <div class="form-group mb-4">
                          <label for="description" class="form-label">Description</label>
                          <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" cols="0" rows="2"required>{{ old('name', $discount->description) }}</textarea>
                          @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                          @endif
                        </div>
                        <div class="form-group mb-4">
                          <label for="percentage" class="form-label">Discount percentage</label>
                          <input type="number" class="form-control {{ $errors->has('percentage') ? 'is-invalid' : ''}}" name="percentage" min="1" max="100" value="{{ old('percentage', $discount->percentage) }}" required>
                          @if ($errors->has('percentage'))
                            <p class="text-danger">{{ $errors->first('percentage') }}</p>
                          @endif
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