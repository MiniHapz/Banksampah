@extends('layouts.app', ['title' => 'Edit Nasabah', 'section_header' => 'Edit Data Nasabah'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3">
            <h2 class="text-2xl font-semibold mb-4">Edit Nasabah</h2>

            <form action="{{ route('nasabah.update', $nasabah->nik) }}" method="POST">
                @csrf
                @method('PUT')

                <x-form.input name="nama_lengkap" label="Nama Lengkap" :value="$nasabah->nama_lengkap" required />
                <x-form.input name="no_telp" label="No Telepon" :value="$nasabah->no_telp" />
                <x-form.input name="dusun" label="Dusun" :value="$nasabah->dusun" required />
                <x-form.input name="rt" label="RT" :value="$nasabah->rt" />
                <x-form.input name="rw" label="RW" :value="$nasabah->rw" />

                {{-- Jenis Kelamin --}}
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="Laki-laki" {{ $nasabah->jenis_kelamin === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $nasabah->jenis_kelamin === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <x-form.input name="tanggal_lahir" label="Tanggal Lahir" type="date" :value="$nasabah->tanggal_lahir" />

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
