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
            <a href="{{ route('admin.discount.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Tambah {{ $title }}
            </a>
        </div>
    </div>

    <div class="card shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center" id="table1">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Deskripsi</th>
                        <th>Persentase</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($discounts as $discount)
                    <tr class="table-light">
                        <td class="fw-semibold">{{ $discount->name }}</td>
                        <td>
                            <span class="badge bg-primary">{{ $discount->code }}</span>
                        </td>
                        <td class="text-start">
                            @if(strlen(strip_tags($discount->description)) > 50)
                                <span data-bs-toggle="tooltip" title="{{ strip_tags($discount->description) }}">
                                    {!! Str::limit(strip_tags($discount->description), 50) !!}...
                                </span>
                            @else
                                {!! strip_tags($discount->description) !!}
                            @endif
                        </td>
                        <td class="fw-bold text-success">{{ $discount->percentage }}%</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.discount.destroy', $discount->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus diskon ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Tidak ada {{ $title }} yang tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection