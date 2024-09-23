@extends('layouts.master')

@section('title', 'Edit Fakultas')

@section('content')
    <h1>Edit Fakultas</h1>

    <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Fakultas:</label>
            <input type="text" name="nama" class="form-control" value="{{ $fakultas->nama }}" required>
        </div>

        <div class="form-group">
            <label for="universitas_id">Universitas:</label>
            <select name="universitas_id" class="form-control" required>
                @foreach($universitas as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $fakultas->universitas_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
