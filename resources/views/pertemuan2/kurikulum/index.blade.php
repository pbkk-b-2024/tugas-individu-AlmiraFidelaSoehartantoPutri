@extends('layouts.master')

@section('title', 'Daftar Kurikulum')

@section('content')
    <h1>Daftar Kurikulum</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('kurikulum.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Kurikulum..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Kurikulum -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Program Studi</th>
                <th>Tahun Mulai</th>
                <th>Tahun Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kurikulum as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->programStudi->nama }}</td>
                    <td>{{ $item->tahun_mulai }}</td>
                    <td>{{ $item->tahun_selesai ?? 'Masih Berlaku' }}</td>
                    <td>
                        <a href="{{ route('kurikulum.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('kurikulum.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kurikulum.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $kurikulum->links() }}
@endsection
