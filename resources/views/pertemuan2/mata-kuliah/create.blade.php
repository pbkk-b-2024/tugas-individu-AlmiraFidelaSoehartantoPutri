@extends('layouts.master')

@section('title', 'Tambah Mata Kuliah')

@section('content')
    <h1>Tambah Mata Kuliah</h1>

    <form action="{{ route('mata-kuliah.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Mata Kuliah:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="sks">SKS:</label>
            <input type="number" name="sks" class="form-control" required min="1" max="6">
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
