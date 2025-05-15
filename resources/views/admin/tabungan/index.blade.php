@extends('layouts.app', ['title' => 'Halaman Tabungan', 'section_header' => 'Data Tabungan'])

@section('content')
<div class="flex">
    <div class="row w-full">
        <div class="col-lg-12">
            <div class="card px-3 py-3 table-responsive">
                <h2 class="text-xl font-semibold mb-4">Data Tabungan Nasabah</h2>

                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-green-100">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">No Tabungan</th>
                            <th class="border px-4 py-2">Nama Nasabah</th>
                            <th class="border px-4 py-2">Total Kg</th>
                            <th class="border px-4 py-2">Nominal Seluruh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_tabungan as $tabungan)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $tabungan->no_tabungan }}</td>
                                <td class="border px-4 py-2">{{ $tabungan->nasabah->nama_lengkap }}</td>
                                <td class="border px-4 py-2">{{ $tabungan->total_kg }} kg</td>
                                <td class="border px-4 py-2">Rp{{ number_format($tabungan->nominal_seluruh, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach

                        @if ($data_tabungan->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">Belum ada data tabungan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
