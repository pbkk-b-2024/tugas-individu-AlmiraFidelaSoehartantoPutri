<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    // Menampilkan semua fakultas
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas')); // Menampilkan view fakultas.index
    }

    // Menampilkan form untuk membuat fakultas baru
    public function create()
    {
        return view('fakultas.create'); // Mengarahkan ke form untuk membuat fakultas baru
    }

    // Menyimpan data fakultas baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'universitas_id' => 'required|exists:universitas,universitas_id',
        ]);

        Fakultas::create($request->all());

        return redirect()->route('fakultas.index') // Redirect ke list fakultas setelah sukses menyimpan data
                         ->with('success', 'Fakultas berhasil ditambahkan.');
    }

    // Menampilkan data fakultas berdasarkan ID
    public function show($id)
    {
        $fakultas = Fakultas::find($id);
        if (!$fakultas) {
            return redirect()->route('fakultas.index')
                             ->with('error', 'Fakultas tidak ditemukan.');
        }
        return view('fakultas.show', compact('fakultas')); // Menampilkan view detail fakultas
    }

    // Menampilkan form untuk mengedit fakultas
    public function edit($id)
    {
        $fakultas = Fakultas::find($id);
        if (!$fakultas) {
            return redirect()->route('fakultas.index')
                             ->with('error', 'Fakultas tidak ditemukan.');
        }
        return view('fakultas.edit', compact('fakultas')); // Menampilkan form edit fakultas
    }

    // Memperbarui data fakultas di database
    public function update(Request $request, $id)
    {
        $fakultas = Fakultas::find($id);
        if (!$fakultas) {
            return redirect()->route('fakultas.index')
                             ->with('error', 'Fakultas tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'universitas_id' => 'required|exists:universitas,universitas_id',
        ]);

        $fakultas->update($request->all());

        return redirect()->route('fakultas.index')
                         ->with('success', 'Fakultas berhasil diperbarui.');
    }

    // Menghapus fakultas dari database
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        if (!$fakultas) {
            return redirect()->route('fakultas.index')
                             ->with('error', 'Fakultas tidak ditemukan.');
        }

        $fakultas->delete();

        return redirect()->route('fakultas.index')
                         ->with('success', 'Fakultas berhasil dihapus.');
    }
}
