@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
  <div class="text-center mb-4">
    <h2 class="fw-bold">Daftar {{ $title }}</h2>
  </div>

  <div class="row mb-3">
    <div class="col-sm-12">
      @include('components.alert')
    </div>
    <div class="col-sm-12 text-end">
      <a href="{{ route('admin.productClass.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Tambah {{ $title }}
      </a>
    </div>
  </div>

  <div class="card shadow-sm p-3">
    <div class="table-responsive">
      <table class="table table-bordered align-middle text-center" id="table1">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Produk</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($product_classes as $row)
          <tr class="table-light">
            <td>{{ $loop->iteration }}</td>
            <td class="text-start fw-semibold">{{ $row->class_name }}</td>
            <td class="text-start">
              @forelse ($row->product as $product)
                <span class="badge bg-secondary">{{ $product->product_name }}</span>
              @empty
                <span class="text-muted">Tidak ada produk</span>
              @endforelse
            </td>
            <td>
              <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('admin.productClass.edit', $row->id) }}" class="btn btn-sm btn-success">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <form action="{{ route('admin.productClass.destroy', $row->id) }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                    <i class="bi bi-trash"></i> Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-center text-muted">Tidak ada {{ $title }} ditemukan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection