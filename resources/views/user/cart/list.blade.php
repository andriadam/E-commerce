@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    @include('components.alert')
  </div>
  <h1 class="text-center mb-4">Keranjang Belanja</h1>
  <div class="col-sm-12">
    <table class="table table-striped table-bordered text-center">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Sub Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($cartItems as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->name }}</td>
          <td>Rp. {{ number_format($item->price, 0, 0, '.') }}</td>
          <td>
            <form action="{{ route('user.cart.update') }}" method="POST" class="d-flex justify-content-center align-items-center">
              @csrf
              <input type="hidden" name="id" value="{{ $item->id }}">
              <input type="number" name="quantity" class="form-control form-control-sm w-50 text-center me-2" value="{{ $item->quantity }}" min="1">
              <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
          </td>
          <td>Rp. {{ number_format($item->price * $item->quantity, 0, 0, '.') }}</td>
          <td>
            <form action="{{ route('user.cart.remove') }}" method="POST">
              @csrf
              <input type="hidden" value="{{ $item->id }}" name="id">
              <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center text-muted">Keranjang belanja anda kosong</td>
        </tr>
        @endforelse
      </tbody>
      <tfoot class="table-light">
        <tr>
          <th colspan="4" class="text-end">Total:</th>
          <th colspan="2">Rp. {{ number_format(Cart::getTotal(), 0, 0, '.') }}</th>
        </tr>
      </tfoot>
    </table>

    <div class="row justify-content-center mt-3">
      @foreach ($discounts as $row)
      <div class="col-sm-4">
        <div class="card border-primary mb-3">
          <div class="card-body">
            <h5 class="card-title text-primary">{{ $row->name }}</h5>
            <h6 class="text-muted">{{ $row->percentage }}% up to Rp. {{ number_format($row->max_disc, 0, 0, '.') }}</h6>
            <p>Kode: <span class="badge bg-primary">{{ $row->code }}</span></p>
            <p class="text-muted">{{ $row->description }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="row justify-content-center mt-3">
      <div class="col-sm-4">
        <form action="{{ route('user.cart.useDiscount') }}" method="post">
          @csrf
          <div class="input-group">
            <input type="text" id="code" class="form-control form-control-sm @error('code') is-invalid @enderror" name="code" placeholder="Masukkan kode promo" value="{{ old('code') }}">
            <button class="btn btn-outline-primary" type="submit">Gunakan</button>
          </div>
        </form>
      </div>
    </div>

    <div class="text-end mt-4">
      <h6>Diskon: <span class="text-danger">-{{ number_format($disc ?? 0, 0, 0, '.') }}</span></h6>
      <h4>Total Akhir: <span class="fw-bold">Rp. {{ number_format($totalAfterDiscount ?? Cart::getTotal(), 0, 0, '.') }}</span></h4>
    </div>

    <div class="text-end mt-3">
      <form action="{{ route('order.store') }}" method="POST">
        @csrf
        @isset($code)
        <input type="hidden" name="code" value="{{ $code }}">
        @endisset
        <button type="submit" class="btn btn-success btn-lg" onclick="return confirm('Apakah sudah yakin dengan pesanan anda?')">Buat Pesanan</button>
      </form>
    </div>
  </div>
</div>
@endsection