@extends('layouts.app', ['title' => 'Halaman Sampah', 'section_header' => 'Data Sampah'])
@section('content')
    <div class="row">

        {{-- Konten Utama --}}
        <div class="col-lg-12">
        <div class="card px-3 py-3 table-reponsive">
            <!-- <a href="{{ route('data-sampah.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Sampah</a>

            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif -->
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                <a href="{{ route('data-sampah.create') }}" class="btn btn-primary">
                    Tambah Data
                </a>

                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="border py-2 px-4 text-center">#</th>
                        <th class="border py-2 px-4 text-center">Nama</th>
                        <th class="border py-2 px-4 text-center">Kategori</th>
                        <th class="border py-2 px-4 text-center">Satuan</th>
                        <th class="border py-2 px-4 text-center">Harga per Kg</th>
                        <th class="border py-2 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data_sampah as $no => $sampah)
                        <tr class="border-b">
                            <td class="border py-2 px-4 text-center">{{ $no + 1 }}</td>
                            <td class="border py-2 px-4 text-center">{{ $sampah->nama }}</td>
                            <td class="border py-2 px-4 text-center">{{ $sampah->kategori->nama }}</td>
                            <td class="border py-2 px-4 text-center">{{ $sampah->satuan }}</td>
                            <td class="border py-2 px-4 text-center">Rp{{ number_format($sampah->harga_per_kg, 0, ',', '.') }}</td>
                            <td class="border py-2 px-4 text-center">
                                <a href="{{ route('data-sampah.edit', $sampah->sampah_id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('data-sampah.destroy', $sampah->sampah_id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-primary">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data sampah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection
