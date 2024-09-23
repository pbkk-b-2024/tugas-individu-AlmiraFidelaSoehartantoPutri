@extends('layouts.master')

@section('title', 'Edit Universitas')

@section('content')
    <h1>Edit Universitas</h1>

    <form action="{{ route('universitas.update', $universitas->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama Universitas:</label>
            <input type="text" name="nama" class="form-control" value="{{ $universitas->nama }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" class="form-control" value="{{ $universitas->alamat }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
