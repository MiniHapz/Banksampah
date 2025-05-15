@extends('layouts.app', ['title' => 'Halaman Nasabah', 'section_header' => 'Data Setoran'])

@section('content')
<div class="flex">
    <div class="row w-full">
        <div class="col-lg-12">
            <div class="card px-3 py-3 table-responsive">
                <a href="{{ route('setoran.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    + Tambah Setoran
                </a>

                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">No Transaksi</th>
                            <th class="border px-4 py-2">Nama Nasabah</th>
                            <th class="border px-4 py-2">Tanggal Transaksi</th>
                            <th class="border px-4 py-2">Total Kasar</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_setoran as $setoran)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $setoran->no_transaksi }}</td>
                                <td class="border px-4 py-2">
                                    {{ $setoran->nasabah ? $setoran->nasabah->nama_lengkap : 'Nasabah Tidak Ditemukan' }}
                                </td>
                                <td class="border px-4 py-2">{{ $setoran->tanggal_transaksi }}</td>
                                <td class="border px-4 py-2">Rp{{ number_format($setoran->total_kasar, 0, ',', '.') }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('setoran.index', ['no_transaksi' => $setoran->no_transaksi]) }}" class="text-blue-600 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach

                        @if ($data_setoran->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data setoran.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Tampilkan detail jika ada --}}
            @if ($detail_setoran)
                <div class="mt-8 bg-white border rounded shadow p-4">
                    <h2 class="text-lg font-semibold mb-3">Detail Setoran: {{ $detail_setoran->no_transaksi }}</h2>
                    <p><strong>Nasabah:</strong> {{ $detail_setoran->nasabah ? $detail_setoran->nasabah->nama_lengkap : 'Nasabah Tidak Ditemukan' }}</p>
                    <p><strong>Tanggal Transaksi:</strong> {{ $detail_setoran->tanggal_transaksi }}</p>

                    <table class="min-w-full mt-4 table-auto border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">Sampah</th>
                                <th class="border px-4 py-2">Harga</th>
                                <th class="border px-4 py-2">Jumlah (kg)</th>
                                <th class="border px-4 py-2">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail_setoran->detailSetoran as $detail)
                                <tr>
                                    <td class="border px-4 py-2">{{ $detail->sampah->nama }}</td>
                                    <td class="border px-4 py-2">Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2">{{ $detail->jumlah }}</td>
                                    <td class="border px-4 py-2">Rp{{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
