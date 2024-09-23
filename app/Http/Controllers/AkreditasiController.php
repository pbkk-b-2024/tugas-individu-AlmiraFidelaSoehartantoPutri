<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    // Menampilkan semua akreditasi
    public function index()
    {
        $akreditasi = Akreditasi::with('programStudi')->get(); // Mengambil semua akreditasi beserta program studinya
        return view('akreditasi.index', compact('akreditasi')); // Menampilkan view akreditasi.index
    }

    // Menampilkan form untuk membuat akreditasi baru
    public function create()
    {
        $program_studi = ProgramStudi::all(); // Mengambil semua data program studi untuk dropdown pilihan
        return view('akreditasi.create', compact('program_studi')); // Menampilkan view create dengan data program studi
    }

    // Menyimpan data akreditasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'peringkat' => 'required|string|max:2', // Peringkat akreditasi harus valid (misal: A, B, C)
            'tanggal_berlaku' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after:tanggal_berlaku',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        Akreditasi::create($request->all());

        return redirect()->route('akreditasi.index') // Redirect ke list akreditasi setelah sukses menyimpan data
                         ->with('success', 'Akreditasi berhasil ditambahkan.');
    }

    // Menampilkan detail akreditasi berdasarkan ID
    public function show($id)
    {
        $akreditasi = Akreditasi::with('programStudi')->find($id);
        if (!$akreditasi) {
            return redirect()->route('akreditasi.index')
                             ->with('error', 'Akreditasi tidak ditemukan.');
        }
        return view('akreditasi.show', compact('akreditasi')); // Menampilkan view detail akreditasi
    }

    // Menampilkan form untuk mengedit akreditasi
    public function edit($id)
    {
        $akreditasi = Akreditasi::find($id);
        if (!$akreditasi) {
            return redirect()->route('akreditasi.index')
                             ->with('error', 'Akreditasi tidak ditemukan.');
        }

        $program_studi = ProgramStudi::all(); // Mengambil semua program studi untuk dropdown
        return view('akreditasi.edit', compact('akreditasi', 'program_studi')); // Menampilkan form edit akreditasi
    }

    // Memperbarui data akreditasi di database
    public function update(Request $request, $id)
    {
        $akreditasi = Akreditasi::find($id);
        if (!$akreditasi) {
            return redirect()->route('akreditasi.index')
                             ->with('error', 'Akreditasi tidak ditemukan.');
        }

        $request->validate([
            'peringkat' => 'required|string|max:2',
            'tanggal_berlaku' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date|after:tanggal_berlaku',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        $akreditasi->update($request->all());

        return redirect()->route('akreditasi.index')
                         ->with('success', 'Akreditasi berhasil diperbarui.');
    }

    // Menghapus akreditasi dari database
    public function destroy($id)
    {
        $akreditasi = Akreditasi::find($id);
        if (!$akreditasi) {
            return redirect()->route('akreditasi.index')
                             ->with('error', 'Akreditasi tidak ditemukan.');
        }

        $akreditasi->delete();

        return redirect()->route('akreditasi.index')
                         ->with('success', 'Akreditasi berhasil dihapus.');
    }
}
