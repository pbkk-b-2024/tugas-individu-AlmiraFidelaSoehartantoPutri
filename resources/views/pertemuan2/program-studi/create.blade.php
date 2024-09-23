@extends('layouts.master')

@section('title', 'Tambah Program Studi')

@section('content')
    <h1>Tambah Program Studi</h1>

    <form action="{{ route('program-studi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Program Studi:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jenjang">Jenjang:</label>
            <input type="text" name="jenjang" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fakultas_id">Fakultas:</label>
            <select name="fakultas_id" class="form-control" required>
                <option value="">Pilih Fakultas</option>
                @foreach($fakultas as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
