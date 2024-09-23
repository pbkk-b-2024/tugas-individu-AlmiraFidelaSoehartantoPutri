@extends('layouts.master')

@section('title', 'Tambah Kurikulum')

@section('content')
    <h1>Tambah Kurikulum</h1>

    <form action="{{ route('kurikulum.store') }}" method="POST">
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
            <label for="tahun_mulai">Tahun Mulai:</label>
            <input type="number" name="tahun_mulai" class="form-control" required min="1900" max="{{ date('Y') }}">
        </div>

        <div class="form-group">
            <label for="tahun_selesai">Tahun Selesai (Opsional):</label>
            <input type="number" name="tahun_selesai" class="form-control" min="1900" max="{{ date('Y') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
