@extends('layouts.app')

@section('content')
<div class="flex">
    @include('components.sidebar')
    <div class="p-6 bg-white shadow-md rounded w-ful">
        <h2 class="text-2xl font-semibold mb-4">Edit Data Penarikan</h2>

        <form action="{{ route('admin.data-penarikan.update', $penarikan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nasabah_id" class="block text-sm font-semibold text-gray-700">Nasabah</label>
                <select name="nasabah_id" id="nasabah_id" class="form-select mt-1 block w-full">
                    @foreach($nasabahs as $nasabah)
                        <option value="{{ $nasabah->id }}" {{ $penarikan->nasabah_id == $nasabah->id ? 'selected' : '' }}>
                            {{ $nasabah->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="jumlah_penarikan" class="block text-sm font-semibold text-gray-700">Jumlah Penarikan</label>
                <input type="number" name="jumlah_penarikan" id="jumlah_penarikan" class="form-input mt-1 block w-full" value="{{ $penarikan->jumlah_penarikan }}" required>
            </div>

            <div class="mb-4">
                <label for="tanggal_penarikan" class="block text-sm font-semibold text-gray-700">Tanggal Penarikan</label>
                <input type="date" name="tanggal_penarikan" id="tanggal_penarikan" class="form-input mt-1 block w-full" value="{{ $penarikan->tanggal_penarikan }}" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-semibold text-gray-700">Status</label>
                <select name="status" id="status" class="form-select mt-1 block w-full">
                    <option value="pending" {{ $penarikan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $penarikan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $penarikan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="keterangan" class="block text-sm font-semibold text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-textarea mt-1 block w-full">{{ $penarikan->keterangan }}</textarea>
            </div>

            <button type="submit" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </form>
    </div>
</div>
@endsection
