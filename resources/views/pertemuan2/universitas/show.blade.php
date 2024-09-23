@extends('layouts.master')

@section('title', 'Detail Universitas')

@section('content')
    <h1>Detail Universitas</h1>
    <p><strong>Nama:</strong> {{ $universitas->nama }}</p>
    <p><strong>Alamat:</strong> {{ $universitas->alamat }}</p>
    <a href="{{ route('universitas.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
