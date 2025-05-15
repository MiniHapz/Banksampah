@extends('layouts.app')

@section('content')
<div class="flex">

        <div class="p-6 bg-white rounded shadow flex-1">
            <h1 class="text-2xl font-bold mb-4">Data Penarikan</h1>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="py-2 px-4 border-b">No</th>
                            <th class="py-2 px-4 border-b">ID Penarikan</th>
                            <th class="py-2 px-4 border-b">Tanggal Penarikan</th>
                            <th class="py-2 px-4 border-b">ID User</th>
                            <th class="py-2 px-4 border-b">Nama Penarik</th>
                            <th class="py-2 px-4 border-b">Jumlah yang Ditarik</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        {{-- Contoh data statis, nanti bisa diganti dengan data dari database --}}
                        @php
                            $dataPenarikan = [
                                ['id' => 1, 'tanggal' => '2025-03-05', 'id_user' => 101, 'nama' => 'Budi', 'jumlah' => 500000],
                                ['id' => 2, 'tanggal' => '2025-03-06', 'id_user' => 102, 'nama' => 'Siti', 'jumlah' => 300000],
                            ];
                        @endphp

                        @foreach ($dataPenarikan as $index => $penarikan)
                            <tr class="border-b">
                                <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 text-center">{{ $penarikan['id'] }}</td>
                                <td class="py-2 px-4 text-center">{{ $penarikan['tanggal'] }}</td>
                                <td class="py-2 px-4 text-center">{{ $penarikan['id_user'] }}</td>
                                <td class="py-2 px-4 text-center">{{ $penarikan['nama'] }}</td>
                                <td class="py-2 px-4 text-center">Rp{{ number_format($penarikan['jumlah'], 0, ',', '.') }}</td>
                                <td class="py-2 px-4 text-center">
                                    <a href="{{ route('admin.data-penarikan.edit', $penarikan['id']) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <form action="{{ route('admin.data-penarikan.destroy', $penarikan['id']) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
