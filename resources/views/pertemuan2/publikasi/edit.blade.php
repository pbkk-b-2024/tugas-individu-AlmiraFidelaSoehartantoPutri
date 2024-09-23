@extends('layouts.master')

@section('title', 'Edit Publikasi')

@section('content')
    <h1>Edit Publikasi</h1>

    <form action="{{ route('publikasi.update', $publikasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="judul">Judul Publikasi:</label>
            <input type="text" name="judul" class="form-control" value="{{ $publikasi->judul }}" required>
        </div>

        <div class="form-group">
            <label for="tahun_publikasi">Tahun Publikasi:</label>
            <input type="number" name="tahun_publikasi" class="form-control" value="{{ $publikasi->tahun_publikasi }}" required min="1900" max="{{ date('Y') }}">
        </div>

        <div class="form-group">
            <label for="dosen_id">Dosen:</label>
            <select name="dosen_id" class="form-control" required>
                @foreach($dosen as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $publikasi->dosen_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
