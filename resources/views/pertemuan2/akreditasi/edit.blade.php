@extends('layouts.master')

@section('title', 'Edit Akreditasi')

@section('content')
    <h1>Edit Akreditasi</h1>

    <form action="{{ route('akreditasi.update', $akreditasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="program_studi_id">Program Studi:</label>
            <select name="program_studi_id" class="form-control" required>
                @foreach($program_studi as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $akreditasi->program_studi_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="peringkat">Peringkat Akreditasi:</label>
            <input type="text" name="peringkat" class="form-control" value="{{ $akreditasi->peringkat }}" required maxlength="2">
        </div>

        <div class="form-group">
            <label for="tanggal_berlaku">Tanggal Berlaku:</label>
            <input type="date" name="tanggal_berlaku" class="form-control" value="{{ $akreditasi->tanggal_berlaku }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control" value="{{ $akreditasi->tanggal_kadaluarsa }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
