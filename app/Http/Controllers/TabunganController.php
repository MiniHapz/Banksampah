<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    // Menampilkan data tabungan
    public function index()
    {
        // Mengambil semua data tabungan dengan relasi ke nasabah
        $data_tabungan = Tabungan::with('nasabah')->latest()->get();
        
        // Mengirim data ke view
        return view('admin.tabungan.index', compact('data_tabungan'));
    }

    // Menambahkan data tabungan (jika diperlukan)
    public function create()
    {
        // Tampilkan form untuk menambah tabungan (jika diperlukan)
        return view('admin.tabungan.create');
    }

    // Menyimpan data tabungan (jika diperlukan)
    public function store(Request $request)
    {
        $request->validate([
            'no_tabungan' => 'required|unique:tabungan,no_tabungan',
            'nasabah_id' => 'required|exists:data_nasabah,id',
            'total_kg' => 'required|numeric|min:1',
            'nominal_seluruh' => 'required|numeric|min:0',
        ]);

        Tabungan::create([
            'no_tabungan' => $request->no_tabungan,
            'nasabah_id' => $request->nasabah_id,
            'total_kg' => $request->total_kg,
            'nominal_seluruh' => $request->nominal_seluruh,
        ]);

        return redirect()->route('admin.tabungan.index')->with('success', 'Tabungan berhasil disimpan!');
    }

    // Menampilkan detail tabungan (jika diperlukan)
    public function show($no_tabungan)
    {
        // Menampilkan detail tabungan berdasarkan no_tabungan
        $tabungan = Tabungan::where('no_tabungan', $no_tabungan)->firstOrFail();
        return view('admin.tabungan.show', compact('tabungan'));
    }

    // Menghapus data tabungan (jika diperlukan)
    public function destroy($no_tabungan)
    {
        $tabungan = Tabungan::where('no_tabungan', $no_tabungan)->firstOrFail();
        $tabungan->delete();

        return redirect()->route('admin.tabungan.index')->with('success', 'Tabungan berhasil dihapus!');
    }
}
