@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Daftar {{ $title }}</h2>
    </div>

    <div class="row">
        <div class="col-sm-12">
            @include('components.alert')
        </div>
    </div>

    <div class="card shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center" id="table1">
                <thead class="table-primary">
                    <tr>
                        <th>No.</th>
                        <th>Order ID</th>
                        <th>Diskon</th>
                        <th>Total</th>
                        <th>Detail</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                    <tr class="table-light">
                        <td class="fw-bold">{{ $loop->iteration }}</td>
                        <td class="fw-semibold">#{{ $order->id }}</td>
                        <td class="text-danger fw-bold">Rp {{ number_format($order->discount, 0, 0, '.') }}</td>
                        <td class="fw-bold text-success">Rp {{ number_format($order->total, 0, 0, '.') }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary d-flex align-items-center justify-content-center"
                                href="{{ url('admin/order/' . $order->id) }}">
                                <i class="bi bi-eye me-1"></i> Lihat Detail
                            </a>
                        </td>
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
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada {{ $title }} yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
