<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sampah;
use App\Models\Penarikan;
use App\Models\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengguna = User::count();
        $totalSampahTerkumpul = Sampah::where('created_at', '>=', now()->subMonth())->sum('berat');
        $totalPenarikan = Penarikan::where('created_at', '>=', now()->subMonth())->sum('jumlah');
        $totalPenjualan = Penjualan::where('created_at', '>=', now()->subMonth())->sum('total_harga');
        $sampahTerkumpul = [];
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        for ($i = 1; $i <= 12; $i++) {
            $sampahTerkumpul[] = Sampah::whereMonth('created_at', $i)->sum('berat');
        }

        return view('admin.dashboard', compact('totalPengguna', 'totalSampahTerkumpul', 'totalPenarikan', 'totalPenjualan', 'sampahTerkumpul', 'labels'));
    }
}