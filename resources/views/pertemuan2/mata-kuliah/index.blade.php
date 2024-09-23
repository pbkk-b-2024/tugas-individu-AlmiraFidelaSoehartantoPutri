@extends('layouts.master')

@section('title', 'Daftar Mata Kuliah')

@section('content')
    <h1>Daftar Mata Kuliah</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('mata-kuliah.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Mata Kuliah..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Mata Kuliah -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mata_kuliah as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->sks }}</td>
                    <td>{{ $item->programStudi->nama }}</td>
                    <td>
                        <a href="{{ route('mata-kuliah.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('mata-kuliah.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mata-kuliah.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $mata_kuliah->links() }}
@endsection
