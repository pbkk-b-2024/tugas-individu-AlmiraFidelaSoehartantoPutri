@extends('layouts.master')

@section('title', 'Daftar Dosen')

@section('content')
    <h1>Daftar Dosen</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('dosen.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Dosen..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Dosen -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dosen as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->fakultas->nama }}</td>
                    <td>
                        <a href="{{ route('dosen.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('dosen.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $dosen->links() }}
@endsection
