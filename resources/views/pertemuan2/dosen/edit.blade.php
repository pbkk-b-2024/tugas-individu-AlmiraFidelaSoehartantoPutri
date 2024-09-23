@extends('layouts.master')

@section('title', 'Edit Dosen')

@section('content')
    <h1>Edit Dosen</h1>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nip">NIP:</label>
            <input type="text" name="nip" class="form-control" value="{{ $dosen->nip }}" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Dosen:</label>
            <input type="text" name="nama" class="form-control" value="{{ $dosen->nama }}" required>
        </div>

        <div class="form-group">
            <label for="fakultas_id">Fakultas:</label>
            <select name="fakultas_id" class="form-control" required>
                @foreach($fakultas as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $dosen->fakultas_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
