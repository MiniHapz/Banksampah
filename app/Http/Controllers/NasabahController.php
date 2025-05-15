<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function index()
    {
        // Ambil semua data nasabah, atau sesuaikan dengan paginasi jika perlu
        $data_nasabah = Nasabah::all(); 
        return view('admin.nasabah.index', compact('data_nasabah'));
    }

    public function create()
    {
        return view('admin.nasabah.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'nik' => 'required|string|max:16|unique:data_nasabah,nik',  // Validasi untuk nik yang unik
            'nama_lengkap' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'dusun' => 'required|string|max:100',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'saldo' => 'nullable|numeric',  // Menambahkan saldo jika diperlukan
            'aktif' => 'required|boolean', // Status aktif nonaktif
        ]);

        // Menambahkan data nasabah baru
        Nasabah::create($request->all());

        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil ditambahkan.');
    }

    public function edit($nik)
    {
        // Menemukan nasabah berdasarkan nik
        $nasabah = Nasabah::findOrFail($nik);
        return view('admin.nasabah.edit', compact('nasabah'));
    }

    public function update(Request $request, $nik)
    {
        // Validasi input dari form
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_telp' => 'nullable|string|max:20',
            'dusun' => 'required|string|max:100',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'saldo' => 'nullable|numeric',  // Menambahkan saldo jika diperlukan
            'aktif' => 'required|boolean', // Status aktif nonaktif
        ]);

        // Menemukan nasabah berdasarkan nik
        $nasabah = Nasabah::findOrFail($nik);

        // Mengupdate data nasabah
        $nasabah->update($request->all());

        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil diupdate.');
    }

    public function destroy($nik)
    {
        // Menemukan nasabah berdasarkan nik
        $nasabah = Nasabah::findOrFail($nik);

        // Menghapus data nasabah
        $nasabah->delete();

        return redirect()->route('nasabah.index')->with('success', 'Nasabah berhasil dihapus.');
    }
}
