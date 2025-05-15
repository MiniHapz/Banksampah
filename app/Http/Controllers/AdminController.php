<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    // Dashboard Admin
    public function index()
    {
        // Cek role admin langsung
        if (Auth::user() && Auth::user()->role === 'admin') {
            return view('admin.dashboard');
        } else {
            return redirect('/dashboard')->with('error', 'Kamu bukan admin!');
        }
    }

    // Halaman Kategori
    public function kategori()
    {
        return view('admin.kategori');
    }

    // ➡ Halaman Data Pengguna
    public function dataPengguna()
    {
        $users = User::all(); // Ambil semua data pengguna
        return view('admin.data-pengguna', compact('users'));
    }

    // ➡ Form Edit Data Pengguna
    public function editPengguna($id)
    {
        $user = User::findOrFail($id); // Ambil data pengguna berdasarkan ID
        return view('admin.edit-pengguna', compact('user'));
    }

    // ➡ Proses Update Data Pengguna
    public function updatePengguna(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'telepon' => 'required',
        ]);

        $user = User::findOrFail($id); // Ambil data pengguna
        $user->update($request->all()); // Update data

        return redirect()->route('admin.data-pengguna')->with('success', 'Data pengguna berhasil diperbarui!');
    }

    // ➡ Hapus Data Pengguna
    public function hapusPengguna($id)
    {
        $user = User::findOrFail($id); // Ambil data pengguna
        $user->delete(); // Hapus data

        return redirect()->route('admin.data-pengguna')->with('success', 'Data pengguna berhasil dihapus!');
    }

    // Halaman Data Sampah
    public function dataSampah()
{
    return view('admin.data-sampah');
}

// Edit Data Sampah
public function editDataSampah($id)
{
    // Ambil data sampah dari database (contoh: Sampah::find($id))
    return view('admin.edit-data-sampah', compact('id'));
}

// Hapus Data Sampah
public function destroyDataSampah($id)
{
    // Hapus data dari database (contoh: Sampah::destroy($id))
    return redirect()->route('admin.data-sampah')->with('success', 'Data berhasil dihapus.');
}

    // Halaman Data Penarikan
    public function dataPenarikan()
    {
        return view('admin.data-penarikan');
    }

    public function editDataPenarikan($id)
{
    // Ambil data penarikan dari database (contoh: Penarikan::find($id))
    return view('admin.edit-data-penarikan', compact('id'));
}

// Hapus Data Penarikan
public function destroyDataPenarikan($id)
{
    // Hapus data dari database (contoh: Penarikan::destroy($id))
    return redirect()->route('admin.data-penarikan')->with('success', 'Data berhasil dihapus.');
}
    // Halaman Data Penjualan
    public function dataPenjualan()
    {
        return view('admin.data-penjualan');
    }
}
