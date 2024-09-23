<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Menampilkan semua dosen
    public function index()
    {
        $dosen = Dosen::with('fakultas')->get(); // Mengambil semua dosen beserta fakultasnya
        return view('dosen.index', compact('dosen')); // Menampilkan view dosen.index
    }

    // Menampilkan form untuk membuat dosen baru
    public function create()
    {
        $fakultas = Fakultas::all(); // Mengambil semua data fakultas untuk dropdown pilihan
        return view('dosen.create', compact('fakultas')); // Menampilkan view create dengan data fakultas
    }

    // Menyimpan data dosen baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosen,nip',
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index') // Redirect ke list dosen setelah sukses menyimpan data
                         ->with('success', 'Dosen berhasil ditambahkan.');
    }

    // Menampilkan detail dosen berdasarkan ID
    public function show($id)
    {
        $dosen = Dosen::with('fakultas')->find($id);
        if (!$dosen) {
            return redirect()->route('dosen.index')
                             ->with('error', 'Dosen tidak ditemukan.');
        }
        return view('dosen.show', compact('dosen')); // Menampilkan view detail dosen
    }

    // Menampilkan form untuk mengedit dosen
    public function edit($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return redirect()->route('dosen.index')
                             ->with('error', 'Dosen tidak ditemukan.');
        }

        $fakultas = Fakultas::all(); // Mengambil semua fakultas untuk dropdown
        return view('dosen.edit', compact('dosen', 'fakultas')); // Menampilkan form edit dosen
    }

    // Memperbarui data dosen di database
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return redirect()->route('dosen.index')
                             ->with('error', 'Dosen tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:dosen,nip,'.$id.',dosen_id', // NIP harus unik kecuali untuk dosen yang sedang diupdate
            'fakultas_id' => 'required|exists:fakultas,fakultas_id',
        ]);

        $dosen->update($request->all());

        return redirect()->route('dosen.index')
                         ->with('success', 'Dosen berhasil diperbarui.');
    }

    // Menghapus dosen dari database
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return redirect()->route('dosen.index')
                             ->with('error', 'Dosen tidak ditemukan.');
        }

        $dosen->delete();

        return redirect()->route('dosen.index')
                         ->with('success', 'Dosen berhasil dihapus.');
    }
}
