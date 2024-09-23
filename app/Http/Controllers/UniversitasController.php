<?php

namespace App\Http\Controllers;

use App\Models\Universitas;
use Illuminate\Http\Request;

class UniversitasController extends Controller
{
    // Menampilkan semua universitas
    public function index()
    {
        $universitas = Universitas::all();
        return view('universitas.index', compact('universitas')); // Ganti '/' dengan 'universitas.index' sesuai view yang kamu miliki
    }

    // Menampilkan form untuk membuat universitas baru
    public function create()
    {
        return view('universitas.create'); // Mengarahkan ke form untuk membuat data universitas baru
    }

    // Menyimpan data universitas baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable|string',
            'kota' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        Universitas::create($request->all());

        return redirect()->route('universitas.index') // Redirect ke halaman list universitas setelah menyimpan
                         ->with('success', 'Universitas berhasil ditambahkan.');
    }

    // Menampilkan data universitas berdasarkan ID
    public function show($id)
    {
        $universitas = Universitas::find($id);
        if (!$universitas) {
            return redirect()->route('universitas.index')
                             ->with('error', 'Universitas tidak ditemukan.');
        }
        return view('universitas.show', compact('universitas'));
    }

    // Menampilkan form untuk mengedit universitas
    public function edit($id)
    {
        $universitas = Universitas::find($id);
        if (!$universitas) {
            return redirect()->route('universitas.index')
                             ->with('error', 'Universitas tidak ditemukan.');
        }
        return view('universitas.edit', compact('universitas'));
    }

    // Memperbarui data universitas di database
    public function update(Request $request, $id)
    {
        $universitas = Universitas::find($id);
        if (!$universitas) {
            return redirect()->route('universitas.index')
                             ->with('error', 'Universitas tidak ditemukan.');
        }

        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable|string',
            'kota' => 'nullable|string',
            'provinsi' => 'nullable|string',
            'telepon' => 'nullable|string|max:20',
        ]);

        $universitas->update($request->all());

        return redirect()->route('universitas.index')
                         ->with('success', 'Universitas berhasil diperbarui.');
    }

    // Menghapus universitas dari database
    public function destroy($id)
    {
        $universitas = Universitas::find($id);
        if (!$universitas) {
            return redirect()->route('universitas.index')
                             ->with('error', 'Universitas tidak ditemukan.');
        }

        $universitas->delete();

        return redirect()->route('universitas.index')
                         ->with('success', 'Universitas berhasil dihapus.');
    }
}
