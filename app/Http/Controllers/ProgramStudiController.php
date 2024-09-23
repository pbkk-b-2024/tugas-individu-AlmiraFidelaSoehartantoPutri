<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    // Menampilkan semua program studi
    public function index()
    {
        $program_studi = ProgramStudi::with('fakultas')->get(); // Mengambil semua program studi beserta fakultasnya
        return view('programstudi.index', compact('program_studi')); // Menampilkan view programstudi.index
    }

    // Menampilkan form untuk membuat program studi baru
    public function create()
    {
        $fakultas = Fakultas::all(); // Mengambil semua data fakultas untuk dropdown pilihan
        return view('programstudi.create', compact('fakultas')); // Menampilkan view create dengan data fakultas
    }

    // Menyimpan data program studi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenjang' => 'required',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        ProgramStudi::create($request->all());

        return redirect()->route('programstudi.index') // Redirect ke list program studi setelah sukses menyimpan data
                         ->with('success', 'Program studi berhasil ditambahkan.');
    }

    // Menampilkan detail program studi berdasarkan ID
    public function show($id)
    {
        $program_studi = ProgramStudi::with('fakultas')->find($id);
        if (!$program_studi) {
            return redirect()->route('programstudi.index')
                             ->with('error', 'Program studi tidak ditemukan.');
        }
        return view('programstudi.show', compact('program_studi')); // Menampilkan view detail program studi
    }

    // Menampilkan form untuk mengedit program studi
    public function edit($id)
    {
        $program_studi = ProgramStudi::find($id);
        if (!$program_studi) {
            return redirect()->route('programstudi.index')
                             ->with('error', 'Program studi tidak ditemukan.');
        }

        $fakultas = Fakultas::all(); // Mengambil semua fakultas untuk dropdown
        return view('programstudi.edit', compact('program_studi', 'fakultas')); // Menampilkan form edit program studi
    }

    // Memperbarui data program studi di database
    public function update(Request $request, $id)
    {
        $program_studi = ProgramStudi::find($id);
        if (!$program_studi) {
            return redirect()->route('programstudi.index')
                             ->with('error', 'Program studi tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'jenjang' => 'required',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        $program_studi->update($request->all());

        return redirect()->route('programstudi.index')
                         ->with('success', 'Program studi berhasil diperbarui.');
    }

    // Menghapus program studi dari database
    public function destroy($id)
    {
        $program_studi = ProgramStudi::find($id);
        if (!$program_studi) {
            return redirect()->route('programstudi.index')
                             ->with('error', 'Program studi tidak ditemukan.');
        }

        $program_studi->delete();

        return redirect()->route('programstudi.index')
                         ->with('success', 'Program studi berhasil dihapus.');
    }
}
