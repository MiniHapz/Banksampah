@extends('layouts.app', ['title' => 'Halaman Nasabah', 'section_header' => 'Data Nasabah'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3 table-responsive">
            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('nasabah.create') }}" style="color: white; text-decoration: none;">
                            Tambah Data
                        </a>
                    </button>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2 text-center">#</th>
                        <th class="border px-4 py-2 text-center">Nama</th>
                        <th class="border px-4 py-2 text-center">Dusun</th>
                        <th class="border px-4 py-2 text-center">RT/RW</th>
                        <th class="border px-4 py-2 text-center">No Telp</th>
                        <!-- Kolom saldo dihapus -->
                        <th class="border px-4 py-2 text-center">Status</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_nasabah as $no => $nasabah)
                        <tr class="border-t">
                            <td class="border px-4 py-2 text-center">{{ $no + 1 }}</td>
                            <td class="border px-4 py-2 text-center">{{ $nasabah->nama_lengkap }}</td>
                            <td class="border px-4 py-2 text-center">{{ $nasabah->dusun }}</td>
                            <td class="border px-4 py-2 text-center">{{ $nasabah->rt }}/{{ $nasabah->rw }}</td>
                            <td class="border px-4 py-2 text-center">{{ $nasabah->no_telp ?? '-' }}</td>
                            <!-- Kolom saldo dihapus -->
                            <td class="border px-4 py-2 text-center">{{ $nasabah->aktif ? 'Aktif' : 'Nonaktif' }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('nasabah.edit', $nasabah->nik) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('nasabah.destroy', $nasabah->nik) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus nasabah ini?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if ($data_nasabah->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data nasabah.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
