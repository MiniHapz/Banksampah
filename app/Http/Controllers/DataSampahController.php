<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DataSampahController extends Controller
{
    public function index()
    {
        $data_sampah = DataSampah::with('kategori')->get(); // Menampilkan data sampah beserta kategorinya
        return view('admin.data_sampah.index', compact('data_sampah'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // Mengambil semua data kategori
        return view('admin.data_sampah.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', // Pastikan nama sampah valid
            'satuan' => 'required|string|max:50', // Validasi satuan
            'harga_per_kg' => 'required|numeric', // Validasi harga per kg
            'kategori_id' => 'required|exists:kategoris,kategori_id', // Perbaikan: validasi kategori_id
        ]);

        // Menyimpan data sampah
        DataSampah::create([
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'harga_per_kg' => $request->harga_per_kg,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('data-sampah.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sampah = DataSampah::findOrFail($id); // Ambil data sampah berdasarkan id
        $kategoris = Kategori::all(); // Ambil semua kategori
        return view('admin.data_sampah.edit', compact('sampah', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $sampah = DataSampah::findOrFail($id); // Ambil data sampah yang akan diupdate

        $request->validate([
            'nama' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'harga_per_kg' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,kategori_id', // Validasi kategori_id
        ]);

        // Update data sampah
        $sampah->update([
            'nama' => $request->nama,
            'satuan' => $request->satuan,
            'harga_per_kg' => $request->harga_per_kg,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect()->route('data-sampah.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $sampah = DataSampah::findOrFail($id); // Ambil data sampah yang akan dihapus
        $sampah->delete(); // Hapus data sampah

        return back()->with('success', 'Data berhasil dihapus');
    }
}
