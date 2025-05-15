@extends('layouts.app', ['title' => 'Tambah Nasabah', 'section_header' => 'Tambah Data Nasabah'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3">
            <h4>Tambah Nasabah Baru</h4>
            <form action="{{ route('nasabah.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp">
                </div>
                <div class="form-group">
                    <label for="dusun">Dusun</label>
                    <input type="text" class="form-control" id="dusun" name="dusun" required>
                </div>
                <div class="form-group">
                    <label for="rt">RT</label>
                    <input type="text" class="form-control" id="rt" name="rt">
                </div>
                <div class="form-group">
                    <label for="rw">RW</label>
                    <input type="text" class="form-control" id="rw" name="rw">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
