@extends('layouts.master')

@section('title', 'Daftar Publikasi')

@section('content')
    <h1>Daftar Publikasi</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('publikasi.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Publikasi..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Publikasi -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publikasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->tahun_publikasi }}</td>
                    <td>{{ $item->dosen->nama }}</td>
                    <td>
                        <a href="{{ route('publikasi.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('publikasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('publikasi.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $publikasi->links() }}
@endsection
