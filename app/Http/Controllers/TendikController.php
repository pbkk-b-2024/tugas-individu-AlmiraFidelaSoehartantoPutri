<?php

namespace App\Http\Controllers;

use App\Models\Tendik;
use App\Models\Universitas;
use Illuminate\Http\Request;

class TendikController extends Controller
{
    // Menampilkan semua tendik
    public function index()
    {
        $tendik = Tendik::with('universitas')->get(); // Mengambil semua tendik beserta universitasnya
        return view('tendik.index', compact('tendik')); // Menampilkan view tendik.index
    }

    // Menampilkan form untuk membuat tendik baru
    public function create()
    {
        $universitas = Universitas::all(); // Mengambil semua data universitas untuk dropdown pilihan
        return view('tendik.create', compact('universitas')); // Menampilkan view create dengan data universitas
    }

    // Menyimpan data tendik baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:tendik,nip',
            'universitas_id' => 'required|exists:universitas,universitas_id',
        ]);

        Tendik::create($request->all());

        return redirect()->route('tendik.index') // Redirect ke list tendik setelah sukses menyimpan data
                         ->with('success', 'Tendik berhasil ditambahkan.');
    }

    // Menampilkan detail tendik berdasarkan ID
    public function show($id)
    {
        $tendik = Tendik::with('universitas')->find($id);
        if (!$tendik) {
            return redirect()->route('tendik.index')
                             ->with('error', 'Tendik tidak ditemukan.');
        }
        return view('tendik.show', compact('tendik')); // Menampilkan view detail tendik
    }

    // Menampilkan form untuk mengedit tendik
    public function edit($id)
    {
        $tendik = Tendik::find($id);
        if (!$tendik) {
            return redirect()->route('tendik.index')
                             ->with('error', 'Tendik tidak ditemukan.');
        }

        $universitas = Universitas::all(); // Mengambil semua universitas untuk dropdown
        return view('tendik.edit', compact('tendik', 'universitas')); // Menampilkan form edit tendik
    }

    // Memperbarui data tendik di database
    public function update(Request $request, $id)
    {
        $tendik = Tendik::find($id);
        if (!$tendik) {
            return redirect()->route('tendik.index')
                             ->with('error', 'Tendik tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:tendik,nip,'.$id.',tendik_id', // NIP harus unik kecuali untuk tendik yang sedang diupdate
            'universitas_id' => 'required|exists:universitas,universitas_id',
        ]);

        $tendik->update($request->all());

        return redirect()->route('tendik.index')
                         ->with('success', 'Tendik berhasil diperbarui.');
    }

    // Menghapus tendik dari database
    public function destroy($id)
    {
        $tendik = Tendik::find($id);
        if (!$tendik) {
            return redirect()->route('tendik.index')
                             ->with('error', 'Tendik tidak ditemukan.');
        }

        $tendik->delete();

        return redirect()->route('tendik.index')
                         ->with('success', 'Tendik berhasil dihapus.');
    }
}
