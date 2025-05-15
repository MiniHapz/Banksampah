<?php

namespace App\Http\Controllers;

use App\Models\DetailSetoran;
use App\Models\Setoran;
use App\Models\DataSampah;
use Illuminate\Http\Request;

class DetailSetoranController extends Controller
{
    public function show($no_transaksi)
    {
        $setoran = Setoran::with('nasabah')->where('no_transaksi', $no_transaksi)->firstOrFail();
        $detail_setoran = DetailSetoran::with('sampah')->where('no_transaksi', $no_transaksi)->get();
        $data_sampah = DataSampah::all();

        return view('admin.setoran.detail', compact('setoran', 'detail_setoran', 'data_sampah'));
    }

    public function store(Request $request, $no_transaksi)
    {
        $request->validate([
            'id_sampah' => 'required|exists:data_sampah,id',
            'harga' => 'required|numeric|min:0',
            'jumlah' => 'required|numeric|min:0.1',
        ]);

        $subtotal = $request->harga * $request->jumlah;

        DetailSetoran::create([
            'no_transaksi' => $no_transaksi,
            'id_sampah' => $request->id_sampah,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'sub_total' => $subtotal,
        ]);

        return redirect()->back()->with('success', 'Detail setoran berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $detail = DetailSetoran::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Detail setoran berhasil dihapus!');
    }
}
