@extends('layouts.master')

@section('title', 'Tambah Tendik')

@section('content')
    <h1>Tambah Tendik</h1>

    <form action="{{ route('tendik.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nip">NIP:</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Tendik:</label>
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
