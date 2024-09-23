@extends('layouts.master')

@section('title', 'Edit Kurikulum')

@section('content')
    <h1>Edit Kurikulum</h1>

    <form action="{{ route('kurikulum.update', $kurikulum->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="program_studi_id">Program Studi:</label>
            <select name="program_studi_id" class="form-control" required>
                @foreach($program_studi as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $kurikulum->program_studi_id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tahun_mulai">Tahun Mulai:</label>
            <input type="number" name="tahun_mulai" class="form-control" value="{{ $kurikulum->tahun_mulai }}" required min="1900" max="{{ date('Y') }}">
        </div>

        <div class="form-group">
            <label for="tahun_selesai">Tahun Selesai (Opsional):</label>
            <input type="number" name="tahun_selesai" class="form-control" value="{{ $kurikulum->tahun_selesai }}" min="1900" max="{{ date('Y') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
