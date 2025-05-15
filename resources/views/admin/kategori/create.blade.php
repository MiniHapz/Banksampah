@extends('layouts.app', ['title' => 'Tambah Kategori', 'section_header' => 'Tambah Kategori'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3">
            <h1 class="text-2xl font-bold mb-4">Tambah Kategori</h1>

            <form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" class="w-full border border-gray-300 rounded px-4 py-2" required>
                    @error('nama')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="ml-2 text-gray-600 hover:text-black">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
