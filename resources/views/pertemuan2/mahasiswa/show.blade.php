@extends('layouts.master')

@section('title', 'Detail Mahasiswa')

@section('content')
    <h1>Detail Mahasiswa</h1>

    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
    <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $mahasiswa->tanggal_lahir }}</p>
    <p><strong>Program Studi:</strong> {{ $mahasiswa->programStudi->nama }}</p>

    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
