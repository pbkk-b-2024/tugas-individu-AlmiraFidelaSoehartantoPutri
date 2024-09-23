@extends('layouts.master')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h1>Edit Mahasiswa</h1>

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" class="form-control" value="{{ $mahasiswa->tanggal_lahir }}">
        </div>

        <div class="form-group">
            <label for="program_studi_id">Program Studi:</label>
            <select name="program_studi_id" class="form-control" required>
                @foreach($program_studi as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $mahasiswa->program_studi_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
