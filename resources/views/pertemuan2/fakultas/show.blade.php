@extends('layouts.master')

@section('title', 'Detail Fakultas')

@section('content')
    <h1>Detail Fakultas</h1>

    <p><strong>Nama Fakultas:</strong> {{ $fakultas->nama }}</p>
    <p><strong>Universitas:</strong> {{ $fakultas->universitas->nama }}</p>

    <a href="{{ route('fakultas.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
