@extends('layouts.master')

@section('title', 'Detail Program Studi')

@section('content')
    <h1>Detail Program Studi</h1>

    <p><strong>Nama Program Studi:</strong> {{ $program_studi->nama }}</p>
    <p><strong>Jenjang:</strong> {{ $program_studi->jenjang }}</p>
    <p><strong>Fakultas:</strong> {{ $program_studi->fakultas->nama }}</p>

    <a href="{{ route('program-studi.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
