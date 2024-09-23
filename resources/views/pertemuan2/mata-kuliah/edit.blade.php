@extends('layouts.master')

@section('title', 'Edit Mata Kuliah')

@section('content')
    <h1>Edit Mata Kuliah</h1>

    <form action="{{ route('mata-kuliah.update', $mata_kuliah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Mata Kuliah:</label>
            <input type="text" name="nama" class="form-control" value="{{ $mata_kuliah->nama }}" required>
        </div>

        <div class="form-group">
            <label for="sks">SKS:</label>
            <input type="number" name="sks" class="form-control" value="{{ $mata_kuliah->sks }}" required min="1" max="6">
        </div>

        <div class="form-group">
            <label for="program_studi_id">Program Studi:</label>
            <select name="program_studi_id" class="form-control" required>
                @foreach($program_studi as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $mata_kuliah->program_studi_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
