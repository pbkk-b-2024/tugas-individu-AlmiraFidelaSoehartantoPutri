@extends('layouts.master')

@section('title', 'Detail Kurikulum')

@section('content')
    <h1>Detail Kurikulum</h1>

    <p><strong>Program Studi:</strong> {{ $kurikulum->programStudi->nama }}</p>
    <p><strong>Tahun Mulai:</strong> {{ $kurikulum->tahun_mulai }}</p>
    <p><strong>Tahun Selesai:</strong> {{ $kurikulum->tahun_selesai ?? 'Masih Berlaku' }}</p>

    <a href="{{ route('kurikulum.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
@endsection
