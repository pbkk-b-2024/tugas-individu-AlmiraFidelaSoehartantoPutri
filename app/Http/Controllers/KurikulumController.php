<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    // Menampilkan semua kurikulum
    public function index()
    {
        $kurikulum = Kurikulum::with('programStudi')->get(); // Mengambil semua kurikulum beserta program studinya
        return view('kurikulum.index', compact('kurikulum')); // Menampilkan view kurikulum.index
    }

    // Menampilkan form untuk membuat kurikulum baru
    public function create()
    {
        $program_studi = ProgramStudi::all(); // Mengambil semua data program studi untuk dropdown pilihan
        return view('kurikulum.create', compact('program_studi')); // Menampilkan view create dengan data program studi
    }

    // Menyimpan data kurikulum baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'tahun_mulai' => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_selesai' => 'nullable|integer|gte:tahun_mulai',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        Kurikulum::create($request->all());

        return redirect()->route('kurikulum.index') // Redirect ke list kurikulum setelah sukses menyimpan data
                         ->with('success', 'Kurikulum berhasil ditambahkan.');
    }

    // Menampilkan detail kurikulum berdasarkan ID
    public function show($id)
    {
        $kurikulum = Kurikulum::with('programStudi')->find($id);
        if (!$kurikulum) {
            return redirect()->route('kurikulum.index')
                             ->with('error', 'Kurikulum tidak ditemukan.');
        }
        return view('kurikulum.show', compact('kurikulum')); // Menampilkan view detail kurikulum
    }

    // Menampilkan form untuk mengedit kurikulum
    public function edit($id)
    {
        $kurikulum = Kurikulum::find($id);
        if (!$kurikulum) {
            return redirect()->route('kurikulum.index')
                             ->with('error', 'Kurikulum tidak ditemukan.');
        }

        $program_studi = ProgramStudi::all(); // Mengambil semua program studi untuk dropdown
        return view('kurikulum.edit', compact('kurikulum', 'program_studi')); // Menampilkan form edit kurikulum
    }

    // Memperbarui data kurikulum di database
    public function update(Request $request, $id)
    {
        $kurikulum = Kurikulum::find($id);
        if (!$kurikulum) {
            return redirect()->route('kurikulum.index')
                             ->with('error', 'Kurikulum tidak ditemukan.');
        }

        $request->validate([
            'tahun_mulai' => 'required|integer|min:1900|max:' . date('Y'),
            'tahun_selesai' => 'nullable|integer|gte:tahun_mulai',
            'program_studi_id' => 'required|exists:program_studi,program_studi_id',
        ]);

        $kurikulum->update($request->all());

        return redirect()->route('kurikulum.index')
                         ->with('success', 'Kurikulum berhasil diperbarui.');
    }

    // Menghapus kurikulum dari database
    public function destroy($id)
    {
        $kurikulum = Kurikulum::find($id);
        if (!$kurikulum) {
            return redirect()->route('kurikulum.index')
                             ->with('error', 'Kurikulum tidak ditemukan.');
        }

        $kurikulum->delete();

        return redirect()->route('kurikulum.index')
                         ->with('success', 'Kurikulum berhasil dihapus.');
    }
}
