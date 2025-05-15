@extends('layouts.app', ['title' => 'Halaman Kategori', 'section_header' => 'Data Kategori'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3 table-responsive">
            <!-- Menampilkan pesan sukses jika ada -->
            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 px-3 py-3 text-right">
                    <!-- Ganti tombol dengan link yang mengarah ke halaman create -->
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                        + Tambah Kategori
                    </a>
                </div>
            </div>

            <table class="table table-striped table-bordered">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="border py-2 px-4 text-center">No</th>
                        <th class="border py-2 px-4 text-center">Nama Kategori</th>
                        <th class="border py-2 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris as $index => $kategori)
                        <tr>
                            <td class="border py-2 px-4 text-center">{{ $index + 1 }}</td>
                            <td class="border py-2 px-4 text-center">{{ $kategori->nama }}</td>
                            <td class="border py-2 px-4 text-center">
                                <a href="{{ route('kategori.edit', $kategori->kategori_id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('kategori.destroy', $kategori->kategori_id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
