@extends('layouts.master')

@section('title', 'Tambah Akreditasi')

@section('content')
    <h1>Tambah Akreditasi</h1>

    <form action="{{ route('akreditasi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="program_studi_id">Program Studi:</label>
            <select name="program_studi_id" class="form-control" required>
                <option value="">Pilih Program Studi</option>
                @foreach($program_studi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="peringkat">Peringkat Akreditasi:</label>
            <input type="text" name="peringkat" class="form-control" required maxlength="2">
        </div>

        <div class="form-group">
            <label for="tanggal_berlaku">Tanggal Berlaku:</label>
            <input type="date" name="tanggal_berlaku" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
            <input type="date" name="tanggal_kadaluarsa" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
