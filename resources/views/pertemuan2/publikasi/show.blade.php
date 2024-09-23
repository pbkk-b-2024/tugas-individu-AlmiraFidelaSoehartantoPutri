@extends('layouts.master')

@section('title', 'Detail Publikasi')

@section('content')
    <h1>Detail Publikasi</h1>

    <p><strong>Judul:</strong> {{ $publikasi->judul }}</p>
    <p><strong>Tahun Publikasi:</strong> {{ $publikasi->tahun_publikasi }}</p>
    <p><strong>Dosen:</strong> {{ $publikasi->dosen->nama }}</p>

    <a href="{{ route('publikasi.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
