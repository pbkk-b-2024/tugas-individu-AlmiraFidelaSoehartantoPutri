<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    // Menampilkan semua mata kuliah
    public function index()
    {
        $mata_kuliah = MataKuliah::with('programStudi')->get(); // Mengambil semua mata kuliah beserta program studinya
        return view('matakuliah.index', compact('mata_kuliah')); // Menampilkan view matakuliah.index
    }

    // Menampilkan form untuk membuat mata kuliah baru
    public function create()
    {
        $program_studi = ProgramStudi::all(); // Mengambil semua data program studi untuk dropdown pilihan
        return view('matakuliah.create', compact('program_studi')); // Menampilkan view create dengan data program studi
    }

    // Menyimpan data mata kuliah baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'sks' => 'required|integer|min:1|max:6', // Jumlah SKS harus valid antara 1-6
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index') // Redirect ke list mata kuliah setelah sukses menyimpan data
                         ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    // Menampilkan detail mata kuliah berdasarkan ID
    public function show($id)
    {
        $mata_kuliah = MataKuliah::with('programStudi')->find($id);
        if (!$mata_kuliah) {
            return redirect()->route('matakuliah.index')
                             ->with('error', 'Mata kuliah tidak ditemukan.');
        }
        return view('matakuliah.show', compact('mata_kuliah')); // Menampilkan view detail mata kuliah
    }

    // Menampilkan form untuk mengedit mata kuliah
    public function edit($id)
    {
        $mata_kuliah = MataKuliah::find($id);
        if (!$mata_kuliah) {
            return redirect()->route('matakuliah.index')
                             ->with('error', 'Mata kuliah tidak ditemukan.');
        }

        $program_studi = ProgramStudi::all(); // Mengambil semua program studi untuk dropdown
        return view('matakuliah.edit', compact('mata_kuliah', 'program_studi')); // Menampilkan form edit mata kuliah
    }

    // Memperbarui data mata kuliah di database
    public function update(Request $request, $id)
    {
        $mata_kuliah = MataKuliah::find($id);
        if (!$mata_kuliah) {
            return redirect()->route('matakuliah.index')
                             ->with('error', 'Mata kuliah tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'sks' => 'required|integer|min:1|max:6',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        $mata_kuliah->update($request->all());

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    // Menghapus mata kuliah dari database
    public function destroy($id)
    {
        $mata_kuliah = MataKuliah::find($id);
        if (!$mata_kuliah) {
            return redirect()->route('matakuliah.index')
                             ->with('error', 'Mata kuliah tidak ditemukan.');
        }

        $mata_kuliah->delete();

        return redirect()->route('matakuliah.index')
                         ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
