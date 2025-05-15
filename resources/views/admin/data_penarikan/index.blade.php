@extends('layouts.app', ['title' => 'Halaman Penarikan', 'section_header' => 'Data Penarikan'])

@section('content')
<div class="row">

    <div class="col-lg-12">
    <div class="card px-3 py-3 table-reponsive">
<!--         
        <a href="{{ route('admin.data_penarikan.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah Penarikan
        </a> -->
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                        Tambah Data
                    </button>
                </div>
            </div>
        <table class="table table-striped table-bordered">
            <thead class="bg-green-100">
                <tr>
                    <th class="border px-4 py-2 text-center">#</th>
                    <th class="border px-4 py-2 text-center">Nama Nasabah</th>
                    <th class="border px-4 py-2 text-center">Jumlah Penarikan</th>
                    <th class="border px-4 py-2 text-center">Tanggal Penarikan</th>
                    <th class="border px-4 py-2 text-center">Status</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_penarikan as $penarikan)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-center">{{ $penarikan->nasabah->nama_lengkap }}</td>
                        <td class="border px-4 py-2 text-center">Rp{{ number_format($penarikan->jumlah_penarikan, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2 text-center">{{ $penarikan->tanggal_penarikan }}</td>
                        <td class="border px-4 py-2 text-center">{{ ucfirst($penarikan->status) }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('admin.data_penarikan.edit', $penarikan->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.data_penarikan.destroy', $penarikan->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=btn btn-primary>Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($data_penarikan->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Belum ada data penarikan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
