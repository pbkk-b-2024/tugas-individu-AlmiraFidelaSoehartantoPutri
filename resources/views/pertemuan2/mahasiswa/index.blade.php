@extends('layouts.master')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('mahasiswa.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Mahasiswa..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Mahasiswa -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->programStudi->nama }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $mahasiswa->links() }}
@endsection
