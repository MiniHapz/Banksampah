<@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar') {{-- Ganti sesuai lokasi komponen sidebar kamu --}}
    
        <div class="p-6 bg-white shadow-md rounded w-full">
            <h2 class="text-2xl font-semibold mb-4">Edit Data Sampah</h2>

            <form action="{{ route('data-sampah.update', $sampah->sampah_id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700">Nama Sampah</label>
                    <input type="text" name="nama" value="{{ $sampah->nama }}" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Kategori</label>
                    <select name="kategori_id" class="w-full border px-3 py-2 rounded" required>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->kategori_id }}" {{ $kategori->kategori_id == $sampah->kategori_id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Satuan</label>
                    <input type="text" name="satuan" value="{{ $sampah->satuan }}" class="w-full border px-3 py-2 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Harga per Kg</label>
                    <input type="number" name="harga_per_kg" value="{{ $sampah->harga_per_kg }}" class="w-full border px-3 py-2 rounded" required>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            </form>
        </div>
    </div>
    @endsection