@extends('layouts.app', ['title' => 'Tambah Data Sampah', 'section_header' => 'Form Tambah Sampah'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-4 py-4">

            <h4 class="mb-4 font-weight-bold">Form Tambah Data Sampah</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('data-sampah.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="nama">Nama Sampah</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->kategori_id }}" {{ old('kategori_id') == $kategori->kategori_id ? 'selected' : '' }}>
                                {{ $kategori->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan') }}" required>
                </div>

                <div class="form-group mb-4">
                    <label for="harga_per_kg">Harga per Kg</label>
                    <input type="number" name="harga_per_kg" id="harga_per_kg" class="form-control @error('harga_per_kg') is-invalid @enderror" value="{{ old('harga_per_kg') }}" required>
                </div>

                <div class="d-flex justify-content-start gap-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('data-sampah.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
