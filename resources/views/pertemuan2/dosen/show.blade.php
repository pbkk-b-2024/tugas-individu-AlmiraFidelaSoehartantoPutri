@extends('layouts.master')

@section('title', 'Detail Dosen')

@section('content')
    <h1>Detail Dosen</h1>

    <p><strong>NIP:</strong> {{ $dosen->nip }}</p>
    <p><strong>Nama:</strong> {{ $dosen->nama }}</p>
    <p><strong>Fakultas:</strong> {{ $dosen->fakultas->nama }}</p>

    <a href="{{ route('dosen.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
