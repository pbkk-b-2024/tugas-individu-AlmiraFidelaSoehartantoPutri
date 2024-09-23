@extends('layouts.master')

@section('title', 'Daftar Tendik')

@section('content')
    <h1>Daftar Tendik</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('tendik.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Tendik..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Tendik -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Universitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tendik as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->universitas->nama }}</td>
                    <td>
                        <a href="{{ route('tendik.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('tendik.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tendik.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $tendik->links() }}
@endsection
