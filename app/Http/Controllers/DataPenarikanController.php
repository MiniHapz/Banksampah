<?php

namespace App\Http\Controllers;

use App\Models\DataPenarikan;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class DataPenarikanController extends Controller
{
    public function index()
    {
        // Menampilkan semua data penarikan
        $data_penarikan = DataPenarikan::with('nasabah')->get();
        return view('admin.data_penarikan.index', compact('data_penarikan'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah penarikan
        $nasabah = Nasabah::all();
        return view('admin.data_penarikan.create', compact('nasabah'));
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data penarikan
        $request->validate([
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jumlah_penarikan' => 'required|numeric',
            'tanggal_penarikan' => 'required|date',
            'status' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        DataPenarikan::create($request->all());

        return redirect()->route('admin.data_penarikan.index')->with('success', 'Data penarikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // Menampilkan form untuk mengedit penarikan berdasarkan ID
        $penarikan = DataPenarikan::findOrFail($id);
        $nasabah = Nasabah::all(); // Data nasabah untuk dropdown
        return view('admin.data_penarikan.edit', compact('penarikan', 'nasabah'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data penarikan
        $request->validate([
            'nasabah_id' => 'required|exists:nasabahs,id',
            'jumlah_penarikan' => 'required|numeric',
            'tanggal_penarikan' => 'required|date',
            'status' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $penarikan = DataPenarikan::findOrFail($id);
        $penarikan->update($request->all());

        return redirect()->route('admin.data_penarikan.index')->with('success', 'Data penarikan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menghapus data penarikan
        $penarikan = DataPenarikan::findOrFail($id);
        $penarikan->delete();

        return redirect()->route('admin.data_penarikan.index')->with('success', 'Data penarikan berhasil dihapus.');
    }
}
