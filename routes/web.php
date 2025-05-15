<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataPenarikanController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\DataSampahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TabunganController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (cek role)
Route::get('/dashboard', function () {
    if (auth()->check()) { // Cek kalau sudah login
        if (auth()->user()->role === 'admin') {
            // Redirect ke admin dashboard kalau role admin
            return redirect()->route('admin.dashboard');
        }
    }
    // Masuk ke dashboard biasa kalau bukan admin
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang butuh login
Route::middleware(['auth'])->group(function () {

    // Route untuk profile user
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

});

// Route untuk admin (butuh login & role admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    // Dashboard Admin
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Halaman Kategori
    Route::resource('/kategori', KategoriController::class)->names('kategori');
    
    // Halaman Data Pengguna
    Route::get('/data-pengguna', [AdminController::class, 'dataPengguna'])->name('admin.data-pengguna');

    Route::get('/data-pengguna/{id}/edit', [AdminController::class, 'editPengguna'])->name('admin.data-pengguna.edit');

    // ➡ Route Update Data Pengguna (POST atau PUT)
    Route::put('/data-pengguna/{id}', [AdminController::class, 'updatePengguna'])->name('admin.data-pengguna.update');

    // ➡ Route Hapus Data Pengguna
    // Route::delete('/data-pengguna/{id}', [AdminController::class, 'hapusPengguna'])->name('admin.data-pengguna.hapus');

    Route::delete('/data-pengguna/destroy/{id}', [AdminController::class, 'hapusPengguna'])->name('admin.data-pengguna.destroy');
    
    // Halaman Data Sampah
    Route::resource('data-sampah', DataSampahController::class)->names('data-sampah');
    // Halaman Data Penarikan
    // Route::get('/data-penarikan', [AdminController::class, 'dataPenarikan'])->name('admin.data-penarikan');
    // Route::get('/data-penarikan/edit/{id}', [AdminController::class, 'editDataPenarikan'])->name('admin.data-penarikan.edit');
    // Route::delete('/data-penarikan/{id}', [AdminController::class, 'destroyDataPenarikan'])->name('admin.data-penarikan.destroy');
    // Halaman Data Penjualan
    Route::get('/data-penjualan', [AdminController::class, 'dataPenjualan'])->name('admin.data-penjualan');

    //Nasabah
    Route::resource('nasabah', NasabahController::class)->parameters([
        'nasabah' => 'nik'  // Menetapkan 'nik' sebagai parameter route
    ]);
    //Setoran
    Route::resource('setoran', SetoranController::class);

    //Penarikan
    // Route resource untuk Data Penarikan
    Route::resource('data-penarikan', DataPenarikanController::class)->names('admin.data_penarikan');

    //Tabungan
     // Menampilkan daftar tabungan
     Route::get('/tabungan', [TabunganController::class, 'index'])->name('admin.tabungan.index');

     // Menampilkan form untuk menambah tabungan
     Route::get('/tabungan/create', [TabunganController::class, 'create'])->name('admin.tabungan.create');
 
     // Menyimpan tabungan baru
     Route::post('/tabungan', [TabunganController::class, 'store'])->name('admin.tabungan.store');
 
     // Menampilkan detail tabungan
     Route::get('/tabungan/{no_tabungan}', [TabunganController::class, 'show'])->name('admin.tabungan.show');
 
     // Menghapus tabungan
     Route::delete('/tabungan/{no_tabungan}', [TabunganController::class, 'destroy'])->name('admin.tabungan.destroy');


});

// Autentikasi bawaan Laravel
require __DIR__.'/auth.php';
