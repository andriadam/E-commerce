@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="text-center">
    <h2 class="fw-bold">Daftar {{ $title }}</h2>
  </div>

  {{-- Notifikasi Pesanan Berhasil --}}
  @if ($message = Session::get('successOrder'))
  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    <h4 class="alert-heading">Pesanan Berhasil Dibuat 🎉</h4>
    <p>
      Silahkan lakukan pembayaran sejumlah <strong>Rp. {{ number_format($message, 0, 0, '.') }}</strong> 
      melalui <span class="fw-bold">BCA: 26532567326</span> A/n <strong>Andri Adam</strong>.
    </p>
    <hr>
    <p class="mb-0">
      Konfirmasi pembayaran melalui URL: 
      <a href="{{ URL::to('/api/paymentOrder') }}" class="text-decoration-none fw-bold">Klik disini</a>
    </p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  {{-- Tabel Daftar Order --}}
  <div class="table-responsive mt-4">
    <table class="table table-hover table-striped table-bordered">
      <thead class="table-dark text-center">
        <tr>
          <th>No</th>
          <th>Order ID</th>
          <th>Diskon</th>
          <th>Total</th>
          <th>Dibuat Pada</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center align-middle">
        @forelse ($orders as $row)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><strong>#{{ $row->id }}</strong></td>
          <td>Rp. {{ number_format($row->discount, 0, 0, '.') }}</td>
          <td><span class="fw-bold text-primary">Rp. {{ number_format($row->total, 0, 0, '.') }}</span></td>
          <td>{{ $row->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i:s') }}</td>
          <td>
            @if ($row->statusPayment === "Paid")
            <span class="badge bg-success p-2">Dibayar</span>
            @elseif ($row->statusPayment === "Waiting Confirmation")
            <span class="badge bg-warning p-2 text-dark">Menunggu Konfirmasi</span>
            @else
            <span class="badge bg-danger p-2">Belum Dibayar</span>
            @endif
          </td>
          <td>
            <a class="btn btn-sm btn-primary fw-bold d-flex align-items-center justify-content-center" 
               href="{{ url('orders/' . $row->id) }}">
              <i class="bi bi-eye me-1"></i> Detail
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center text-muted fw-bold p-4">Belum ada pesanan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
