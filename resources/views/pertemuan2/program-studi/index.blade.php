@extends('layouts.master')

@section('title', 'Daftar Program Studi')

@section('content')
    <h1>Daftar Program Studi</h1>

    <!-- Form Pencarian -->
    <form action="{{ route('program-studi.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Program Studi..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tabel Program Studi -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Program Studi</th>
                <th>Jenjang</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($program_studi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenjang }}</td>
                    <td>{{ $item->fakultas->nama }}</td>
                    <td>
                        <a href="{{ route('program-studi.show', $item->id) }}" class="btn btn-primary btn-sm">Detail</a>
                        <a href="{{ route('program-studi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('program-studi.destroy', $item->id) }}" method="POST" style="display:inline;">
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
    {{ $program_studi->links() }}
@endsection
