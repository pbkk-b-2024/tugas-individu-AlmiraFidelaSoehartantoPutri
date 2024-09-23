@extends('layouts.master')

@section('title', 'Daftar Universitas')

@section('content')
    <h1>Daftar Universitas</h1>

    <form action="{{ route('universitas.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari Universitas..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($universitas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <a href="{{ route('universitas.show', $item->id) }}" class="btn btn-primary">Detail</a>
                        <a href="{{ route('universitas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('universitas.create') }}">Tambah Universitas</a>
                        <form action="{{ route('universitas.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $universitas->links() }}
@endsection
