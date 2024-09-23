@extends('layouts.master')

@section('title', 'Detail Akreditasi')

@section('content')
    <h1>Detail Akreditasi</h1>

    <p><strong>Program Studi:</strong> {{ $akreditasi->programStudi->nama }}</p>
    <p><strong>Peringkat:</strong> {{ $akreditasi->peringkat }}</p>
    <p><strong>Tanggal Berlaku:</strong> {{ $akreditasi->tanggal_berlaku }}</p>
    <p><strong>Tanggal Kadaluarsa:</strong> {{ $akreditasi->tanggal_kadaluarsa }}</p>

    <a href="{{ route('akreditasi.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
