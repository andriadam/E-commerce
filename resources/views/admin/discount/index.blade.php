@extends('layouts.admin.app')

@section('content')
<div class="container">
    <div class="row mt-4 text-center">
        <h2>Daftar {{ $title }}</h2>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.discount.create') }}" class="btn btn-sm btn-primary"><i
                    class="bi bi-plus-square"></i>
                Tambah
                {{ $title }}</a>
        </div>
    </div>
    <div class="row mt-2">
        @include('components.alert')
        <table class="table" id="table1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Percentage</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($discounts as $row)
                <tr>
                    <td>{{ $row->name }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $row->code }}</span>
                    </td>
                    <td>{!! Str::limit(strip_tags($row->description), 50) !!}</td>
                    <td>{{ $row->percentage }}%</td>
                    <td>
                        <a href="{{ route('admin.discount.edit', $row->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('admin.discount.destroy', $row->id) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
                                Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="6">No discount created</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection