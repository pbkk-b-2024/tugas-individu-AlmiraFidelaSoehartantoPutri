@extends('layouts.master')

@section('title', 'Detail Mata Kuliah')

@section('content')
    <h1>Detail Mata Kuliah</h1>

    <p><strong>Nama Mata Kuliah:</strong> {{ $mata_kuliah->nama }}</p>
    <p><strong>SKS:</strong> {{ $mata_kuliah->sks }}</p>
    <p><strong>Program Studi:</strong> {{ $mata_kuliah->programStudi->nama }}</p>

    <a href="{{ route('mata-kuliah.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
