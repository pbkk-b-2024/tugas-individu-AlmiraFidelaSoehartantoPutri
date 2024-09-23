@extends('layouts.master')

@section('title', 'Detail Tendik')

@section('content')
    <h1>Detail Tendik</h1>

    <p><strong>NIP:</strong> {{ $tendik->nip }}</p>
    <p><strong>Nama:</strong> {{ $tendik->nama }}</p>
    <p><strong>Universitas:</strong> {{ $tendik->universitas->nama }}</p>

    <a href="{{ route('tendik.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
