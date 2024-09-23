@extends('layouts.master')

@section('title', 'Daftar Fakultas')

@section('content')
    <h1>Daftar Fakultas</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('fakultas.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Fakultas..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Fakultas -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Fakultas</th>
                <th>Universitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fakultas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->universitas->nama }}</td>
                    <td>
                        <a href="{{ route('fakultas.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('fakultas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('fakultas.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $fakultas->links() }}
@endsection
