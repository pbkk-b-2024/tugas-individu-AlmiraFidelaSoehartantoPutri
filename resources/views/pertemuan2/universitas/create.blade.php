@extends('layouts.master')

@section('title', 'Tambah Universitas')

@section('content')
    <h1>Tambah Universitas</h1>

    <form action="{{ route('universitas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Universitas:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
