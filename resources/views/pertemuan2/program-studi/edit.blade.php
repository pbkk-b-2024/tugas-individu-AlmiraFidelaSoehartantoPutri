@extends('layouts.master')

@section('title', 'Edit Program Studi')

@section('content')
    <h1>Edit Program Studi</h1>

    <form action="{{ route('program-studi.update', $program_studi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Program Studi:</label>
            <input type="text" name="nama" class="form-control" value="{{ $program_studi->nama }}" required>
        </div>

        <div class="form-group">
            <label for="jenjang">Jenjang:</label>
            <input type="text" name="jenjang" class="form-control" value="{{ $program_studi->jenjang }}" required>
        </div>

        <div class="form-group">
            <label for="fakultas_id">Fakultas:</label>
            <select name="fakultas_id" class="form-control" required>
                @foreach($fakultas as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $program_studi->fakultas_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
