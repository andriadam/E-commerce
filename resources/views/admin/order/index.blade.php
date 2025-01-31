@extends('layouts.admin.app')

@section('content')
<div class="row mt-4 text-center">
  <h2>Daftar {{ $title }}</h2>
</div>
<div class="row">
  <div class="col-sm-12">
    @include('components.alert')
  </div>
</div>
<div class="row mt-2">
  <table class="table" id="table1">
    <thead>
      <tr>
        <th>No. </th>
        <th>Order Id</th>
        <th>Discount</th>
        <th>Total</th>
        {{-- <th>No.Rek</th>
        <th>Nama Bank</th>
        <th>Tanggal Transfer</th> --}}
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($orders as $row)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $row->id }}</td>
        <td>Rp. {{ number_format($row->discount, 0, 0, '.') }}</td>
        <td>Rp. {{ number_format($row->total, 0, 0, '.') }}</td>
        {{-- <td>{{ $row->no_rek }}</td>
        <td>{{ $row->bank_name }}</td>
        <td>{{ $row->transfer_date }}</td> --}}
        <td>
          <form action="{{ route('admin.order.updateStatus') }}" method="post">
            @method('put')
            @csrf
            <input type="hidden" value="{{ $row->id }}" name="id">
            <select name="statusPayment" id="" class="form-select" onchange="form.submit()">
              <option {{ $row->statusPayment == 'Paid' ? "selected": "" }} value="Paid">Dibayar</option>
              <option {{ $row->statusPayment == 'Waiting Confirmation' ? "selected": "" }} value="Waiting Confirmation">Menunggu konfirmasi</option>
              <option {{ $row->statusPayment == 'Waiting Payment' ? "selected": "" }}
                value="Waiting Payment">Menunggu pembayaran</option>
            </select>
          </form>
        </td>
      </tr>
      @empty
      <tr class="text-center">
        <td colspan="6">No {{ $title }} found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection