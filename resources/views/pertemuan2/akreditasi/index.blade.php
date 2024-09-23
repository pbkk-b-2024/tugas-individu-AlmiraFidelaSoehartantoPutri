@extends('layouts.master')

@section('title', 'Daftar Akreditasi')

@section('content')
    <h1>Daftar Akreditasi</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('akreditasi.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Akreditasi..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Akreditasi -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Program Studi</th>
                <th>Peringkat</th>
                <th>Tanggal Berlaku</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akreditasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->programStudi->nama }}</td>
                    <td>{{ $item->peringkat }}</td>
                    <td>{{ $item->tanggal_berlaku }}</td>
                    <td>{{ $item->tanggal_kadaluarsa }}</td>
                    <td>
                        <a href="{{ route('akreditasi.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('akreditasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('akreditasi.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $akreditasi->links() }}
@endsection
