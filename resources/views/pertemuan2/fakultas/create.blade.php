@extends('layouts.master')

@section('title', 'Tambah Fakultas')

@section('content')
    <h1>Tambah Fakultas</h1>

    <form action="{{ route('fakultas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Fakultas:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="universitas_id">Universitas:</label>
            <select name="universitas_id" class="form-control" required>
                <option value="">Pilih Universitas</option>
                @foreach($universitas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
