<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Setoran;
use App\Models\Tabungan;
use App\Models\DetailSetoran;
use App\Models\DetailTabungan;
use App\Models\DataSampah;
use App\Models\Nasabah;

class SetoranController extends Controller
{
    public function index(Request $request)
    {
        $data_setoran = Setoran::with('nasabah')->latest()->get();
        $detail_setoran = null;

        if ($request->has('no_transaksi')) {
            $detail_setoran = Setoran::with(['nasabah', 'detailSetoran.sampah'])
                ->where('no_transaksi', $request->no_transaksi)
                ->first();
        }

        return view('admin.setoran.index', compact('data_setoran', 'detail_setoran'));
    }

    public function create()
    {
        $nasabah = Nasabah::where('aktif', true)->get();
        $sampah = DataSampah::all();

        return view('admin.setoran.create', compact('nasabah', 'sampah'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nik' => 'required|exists:data_nasabah,nik',
        'tanggal_transaksi' => 'required|date',
        'detail' => 'required|array',
        'detail.*.sampah_id' => 'required|exists:data_sampah,sampah_id',
        'detail.*.jumlah' => 'required|numeric|min:0.1',
    ]);

    DB::beginTransaction();

    try {
        // Ambil atau buat tabungan berdasarkan NIK
        $tabungan = Tabungan::firstOrCreate(
            ['nik' => $request->nik],
            [
                'no_tabungan' => 'TBG-' . strtoupper(uniqid()),
                'total_tabungan' => 0,
            ]
        );

        // Penomoran otomatis untuk transaksi
        $last = Setoran::latest('no_transaksi')->first();
        $noUrut = $last ? (int) substr($last->no_transaksi, 4) + 1 : 1;
        $no_transaksi = 'STR-' . str_pad($noUrut, 5, '0', STR_PAD_LEFT);

        // Simpan data setoran utama
        $setoran = Setoran::create(attributes: [
            'no_transaksi' => $no_transaksi,
            'no_tabungan' => $tabungan->no_tabungan,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'total_kasar' => 0,
        ]);

        // Proses detail setoran
        $total_kg = 0;
$nominal_total = 0;

foreach ($request->detail as $d) {
    $sampah = DataSampah::where('sampah_id', $d['sampah_id'])->firstOrFail();

    $sub_total = $sampah->harga_per_kg * $d['jumlah'];

    DetailSetoran::create([
        'no_transaksi' => $no_transaksi,
        'sampah_id' => $sampah->sampah_id, // atau langsung $d['sampah_id']
        'harga' => $sampah->harga_per_kg,
        'jumlah' => $d['jumlah'],
        'sub_total' => $sub_total,
    ]);

    $total_kg += $d['jumlah'];
    $nominal_total += $sub_total;
}

// Update total kasar di setoran
$setoran->update(['total_kasar' => $nominal_total]);

// Update atau buat detail tabungan
DetailTabungan::updateOrCreate(
    ['no_tabungan' => $tabungan->no_tabungan, 'no_transaksi' => $no_transaksi],
    ['total_kg' => $total_kg, 'nominal_seluruh' => $nominal_total]
);
        DB::commit();
        return redirect()->route('setoran.index')->with('success', 'Setoran berhasil ditambahkan!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors('Terjadi kesalahan saat menyimpan setoran: ' . $e->getMessage());
    }
}

    public function show($no_transaksi)
    {
        $setoran = Setoran::with(['nasabah', 'detailSetoran.sampah'])
            ->where('no_transaksi', $no_transaksi)
            ->firstOrFail();

        $sampah = DataSampah::all();
        return view('admin.setoran.show', compact('setoran', 'sampah'));
    }

    public function storeDetail(Request $request, $no_transaksi)
    {
        $request->validate([
            'sampah_id' => 'required|exists:data_sampah,id',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|numeric|min:0.1', // Ganti 'berat' dengan 'jumlah'
        ]);
    
        $setoran = Setoran::where('no_transaksi', $no_transaksi)->firstOrFail();
        $sub_total = $request->harga * $request->jumlah;
    
        DetailSetoran::create([
            'no_transaksi' => $no_transaksi,
            'sampah_id' => $request->sampah_id,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah, // Menggunakan 'jumlah'
            'sub_total' => $sub_total,
        ]);
    
        $this->updateTotalSetoranDanTabungan($setoran);
    
        return redirect()->back()->with('success', 'Detail setoran ditambahkan!');
    }
    
    public function deleteDetail($no_transaksi, $id)
    {
        $detail = DetailSetoran::findOrFail($id);
        $detail->delete();

        $setoran = Setoran::where('no_transaksi', $no_transaksi)->firstOrFail();
        $this->updateTotalSetoranDanTabungan($setoran);

        return redirect()->back()->with('success', 'Detail setoran dihapus!');
    }

    public function destroy($no_transaksi)
    {
        $setoran = Setoran::where('no_transaksi', $no_transaksi)->firstOrFail();

        DetailSetoran::where('no_transaksi', $no_transaksi)->delete();
        DetailTabungan::where('no_transaksi', $no_transaksi)->delete();
        $setoran->delete();

        return redirect()->route('setoran.index')->with('success', 'Setoran berhasil dihapus!');
    }

    /**
     * Fungsi pembantu untuk mengupdate total kg dan nominal total
     */
    protected function updateTotalSetoranDanTabungan($setoran)
    {
        $no_transaksi = $setoran->no_transaksi;

        $total_kg = DetailSetoran::where('no_transaksi', $no_transaksi)->sum('jumlah');
        $nominal_total = DetailSetoran::where('no_transaksi', $no_transaksi)->sum('sub_total');

        $setoran->update(['total_kasar' => $nominal_total]);

        DetailTabungan::updateOrCreate(
            ['no_tabungan' => $setoran->no_tabungan, 'no_transaksi' => $no_transaksi],
            ['total_kg' => $total_kg, 'nominal_seluruh' => $nominal_total]
        );
    }
}
