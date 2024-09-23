<?php

use App\Http\Controllers\UniversitasController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TendikController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AkreditasiController;
use App\Http\Controllers\KurikulumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pertemuan1Controller;

Route::get('/', function () {
    return view('layout.welcome');
});

Route::prefix('/pertemuan1')->group(function(){
    Route::get('/genap-ganjil',[Pertemuan1Controller::class,'genapGanjil'])->name('genap-ganjil');
    Route::get('/fibbonaci',[Pertemuan1Controller::class,'fibonacci'])->name('fibonacci');
    Route::get('/prima', [Pertemuan1Controller::class, 'bilanganPrima'])->name('bilangan-prima');
});

Route::prefix('/pertemuan2')->group(function(){
    Route::resource('/universitas', UniversitasController::class)
    ->parameters(['universitas' => 'universitas'])
    ->names([
        'index' => 'universitas.index',
        'create' => 'universitas.create',
        'store' => 'universitas.store',
        'show' => 'universitas.show',
        'edit' => 'universitas.edit',
        'update' => 'universitas.update',
        'destroy' => 'universitas.destroy',
    ]);
    // Route::resource('/universitas', UniversitasController::class)->parameters(['universitas' => 'universitas'])->name('universitas');
    Route::resource('/fakultas', FakultasController::class)->parameters(['fakultas' => 'fakultas']);
    Route::resource('/program-studi', ProgramStudiController::class)->parameters(['program-studi' => 'program-studi']);
    Route::resource('/mahasiswa', MahasiswaController::class)->parameters(['mahasiswa' => 'mahasiswa']);
    Route::resource('/dosen', DosenController::Class)->parameters(['dosen' => 'dosen']);
    Route::resource('/tendik', TendikController::Class)->parameters(['tendik' => 'tendik']);
    Route::resource('/publikasi', PublikasiController::Class)->parameters(['publikasi' => 'publikasi']);
    Route::resource('/mata-kuliah', MataKuliahController::Class)->parameters(['mata-kuliah' => 'mata-kuliah']);
    Route::resource('/akreditasi', AkreditasiController::Class)->parameters(['akreditasi' => 'akreditasi']);
    Route::resource('/kurikulum', KurikulumController::Class)->parameters(['kurikulum' => 'kurikulum']);
});

Route::fallback(function () {
    return redirect('/');
});