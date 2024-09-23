@extends('layouts.master')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1>Tambah Mahasiswa</h1>

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control">
        </div>

        <div class="form-group">
            <label for="program_studi_id">Program Studi:</label>
            <select name="program_studi_id" class="form-control" required>
                <option value="">Pilih Program Studi</option>
                @foreach($program_studi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
