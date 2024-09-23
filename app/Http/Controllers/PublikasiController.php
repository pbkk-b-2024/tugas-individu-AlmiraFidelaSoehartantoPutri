<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use App\Models\Dosen;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    // Menampilkan semua publikasi
    public function index()
    {
        $publikasi = Publikasi::with('dosen')->get(); // Mengambil semua publikasi beserta dosennya
        return view('publikasi.index', compact('publikasi')); // Menampilkan view publikasi.index
    }

    // Menampilkan form untuk membuat publikasi baru
    public function create()
    {
        $dosen = Dosen::all(); // Mengambil semua data dosen untuk dropdown pilihan
        return view('publikasi.create', compact('dosen')); // Menampilkan view create dengan data dosen
    }

    // Menyimpan data publikasi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tahun_publikasi' => 'required|integer|min:1900|max:' . date('Y'),
            'dosen_id' => 'required|exists:dosen,dosen_id',
        ]);

        Publikasi::create($request->all());

        return redirect()->route('publikasi.index') // Redirect ke list publikasi setelah sukses menyimpan data
                         ->with('success', 'Publikasi berhasil ditambahkan.');
    }

    // Menampilkan detail publikasi berdasarkan ID
    public function show($id)
    {
        $publikasi = Publikasi::with('dosen')->find($id);
        if (!$publikasi) {
            return redirect()->route('publikasi.index')
                             ->with('error', 'Publikasi tidak ditemukan.');
        }
        return view('publikasi.show', compact('publikasi')); // Menampilkan view detail publikasi
    }

    // Menampilkan form untuk mengedit publikasi
    public function edit($id)
    {
        $publikasi = Publikasi::find($id);
        if (!$publikasi) {
            return redirect()->route('publikasi.index')
                             ->with('error', 'Publikasi tidak ditemukan.');
        }

        $dosen = Dosen::all(); // Mengambil semua dosen untuk dropdown
        return view('publikasi.edit', compact('publikasi', 'dosen')); // Menampilkan form edit publikasi
    }

    // Memperbarui data publikasi di database
    public function update(Request $request, $id)
    {
        $publikasi = Publikasi::find($id);
        if (!$publikasi) {
            return redirect()->route('publikasi.index')
                             ->with('error', 'Publikasi tidak ditemukan.');
        }

        $request->validate([
            'judul' => 'required',
            'tahun_publikasi' => 'required|integer|min:1900|max:' . date('Y'),
            'dosen_id' => 'required|exists:dosen,dosen_id',
        ]);

        $publikasi->update($request->all());

        return redirect()->route('publikasi.index')
                         ->with('success', 'Publikasi berhasil diperbarui.');
    }

    // Menghapus publikasi dari database
    public function destroy($id)
    {
        $publikasi = Publikasi::find($id);
        if (!$publikasi) {
            return redirect()->route('publikasi.index')
                             ->with('error', 'Publikasi tidak ditemukan.');
        }

        $publikasi->delete();

        return redirect()->route('publikasi.index')
                         ->with('success', 'Publikasi berhasil dihapus.');
    }
}
