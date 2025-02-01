@extends('layouts.admin.app')

@section('content')
<div class="container mt-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold">{{ $title }}</h2>
  </div>

  {{-- Notifikasi Pesanan Berhasil --}}
  @if ($message = Session::get('successOrder'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Pesanan Berhasil Dibuat 🎉</h4>
    <p>Silahkan lakukan pembayaran sejumlah <strong>Rp. {{ number_format($message, 0, 0, '.') }}</strong> melalui <span class="fw-bold">BCA: 26532567326</span> A/n <strong>Andri Adam</strong>.</p>
    <hr>
    <p class="mb-0">Konfirmasi pembayaran melalui <a href="{{ URL::to('/api/paymentOrder') }}" class="text-decoration-none fw-bold">tautan ini</a>.</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  {{-- Tabel Detail Order --}}
  <div class="table-responsive mt-4">
    <table class="table table-striped table-bordered text-center">
      <thead class="table-dark">
        <tr>
          <th>ID Transaksi</th>
          <th>Diskon</th>
          <th>Total</th>
          <th>Dibuat Pada</th>
          <th>Diupdate Pada</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>#{{ $order->id }}</strong></td>
          <td>Rp. {{ number_format($order->discount, 0, 0, '.') }}</td>
          <td><span class="fw-bold text-primary">Rp. {{ number_format($order->total, 0, 0, '.') }}</span></td>
          <td>{{ $order->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}</td>
          <td>{{ $order->updated_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}</td>
          <td>
            <form action="{{ route('admin.order.updateStatus') }}" method="post">
                @method('put')
                @csrf
                <input type="hidden" name="id" value="{{ $order->id }}">
                <select name="statusPayment" class="form-select fw-bold text-center"
                    onchange="this.form.submit()">
                    <option class="text-success" {{ $order->statusPayment == 'Paid' ? 'selected' : '' }}
                        value="Paid">✅ Dibayar</option>
                    <option class="text-warning" {{ $order->statusPayment == 'Waiting Confirmation' ? 'selected' : '' }}
                        value="Waiting Confirmation">⏳ Menunggu Konfirmasi</option>
                    <option class="text-danger" {{ $order->statusPayment == 'Waiting Payment' ? 'selected' : '' }}
                        value="Waiting Payment">❌ Menunggu Pembayaran</option>
                </select>
            </form>
        </td>
        </tr>
      </tbody>
    </table>
  </div>

  {{-- Detail Produk dalam Order --}}
  <div class="row justify-content-center mt-4">
    @forelse ($order->orderDetails as $row)
    <div class="col-sm-4 d-flex align-items-stretch mb-3">
      <div class="card w-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ $row->product->product_name }}</h5>
          <div class="row">
            <div class="col-6">
              <p class="mb-1">Rp. {{ number_format($row->product->price, 0, 0, '.') }} x {{ $row->quantity }}</p>
            </div>
            <div class="col text-end">
              <h6 class="fw-bold text-primary">Rp. {{ number_format($row->product->price * $row->quantity, 0, 0, '.') }}</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
    <p class="text-center text-muted fw-bold">Tidak ada produk dalam pesanan ini.</p>
    @endforelse
  </div>
</div>
@endsection