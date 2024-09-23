<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan semua mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa')); // Menampilkan view list mahasiswa
    }

    // Menampilkan form untuk membuat mahasiswa baru
    public function create()
    {
        $program_studi = ProgramStudi::all(); // Mengambil semua data program studi untuk form pilihan
        return view('mahasiswa.create', compact('program_studi')); // Menampilkan form create mahasiswa
    }

    // Menyimpan data mahasiswa baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim',
            'tanggal_lahir' => 'nullable|date',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index') // Redirect ke list mahasiswa setelah menyimpan
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan data mahasiswa berdasarkan ID
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                             ->with('error', 'Mahasiswa tidak ditemukan.');
        }
        return view('mahasiswa.show', compact('mahasiswa')); // Menampilkan view detail mahasiswa
    }

    // Menampilkan form untuk mengedit mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                             ->with('error', 'Mahasiswa tidak ditemukan.');
        }

        $program_studi = ProgramStudi::all(); // Mengambil data program studi untuk form pilihan
        return view('mahasiswa.edit', compact('mahasiswa', 'program_studi')); // Menampilkan form edit mahasiswa
    }

    // Memperbarui data mahasiswa di database
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                             ->with('error', 'Mahasiswa tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim,'.$id.',mahasiswa_id', // NIM harus unik kecuali untuk data mahasiswa yang sedang diupdate
            'tanggal_lahir' => 'nullable|date',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    // Menghapus mahasiswa dari database
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                             ->with('error', 'Mahasiswa tidak ditemukan.');
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
