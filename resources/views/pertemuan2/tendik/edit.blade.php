@extends('layouts.master')

@section('title', 'Edit Tendik')

@section('content')
    <h1>Edit Tendik</h1>

    <form action="{{ route('tendik.update', $tendik->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nip">NIP:</label>
            <input type="text" name="nip" class="form-control" value="{{ $tendik->nip }}" required>
        </div>

        <div class="form-group">
            <label for="nama">Nama Tendik:</label>
            <input type="text" name="nama" class="form-control" value="{{ $tendik->nama }}" required>
        </div>

        <div class="form-group">
            <label for="universitas_id">Universitas:</label>
            <select name="universitas_id" class="form-control" required>
                @foreach($universitas as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $tendik->universitas_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
