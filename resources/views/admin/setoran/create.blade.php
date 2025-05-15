@extends('layouts.app', ['title' => 'Tambah Setoran', 'section_header' => 'Form Tambah Setoran'])

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card px-3 py-3">
            <h4 class="mb-4 font-weight-bold">Form Tambah Setoran</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('setoran.store') }}" method="POST" id="form-setoran">
                @csrf

                <div class="form-group mb-3">
                    <label for="nik">Pilih NIK Nasabah</label>
                    <select name="nik" id="nik" class="form-control" required>
                        <option value="">-- Pilih NIK Nasabah --</option>
                        @foreach ($nasabah as $n)
                            <option value="{{ $n->nik }}">{{ $n->nama_lengkap }} (Dusun {{ $n->dusun }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="tanggal_transaksi">Tanggal Transaksi</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>

                <hr>
                <h5>Tambah Detail Sampah</h5>

                <div class="row align-items-end mb-3">
                    <div class="col-md-4">
                        <label>Jenis Sampah</label>
                        <select id="sampah-select" class="form-control" required>
                            <option value="">-- Pilih Sampah --</option>
                            @foreach ($sampah as $s)
                                <option value="{{ $s->sampah_id }}" data-nama="{{ $s->nama }}" data-harga="{{ $s->harga_per_kg }}">
                                    {{ $s->nama }} - Rp{{ number_format($s->harga_per_kg, 0, ',', '.') }}/{{ $s->satuan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label>Harga</label>
                        <input type="text" id="harga-input" class="form-control" readonly>
                    </div>
                    <div class="col-md-2">
                        <label>Jumlah (kg)</label>
                        <input type="number" id="jumlah-input" class="form-control" step="0.1" min="0.1" required>
                    </div>
                    <div class="col-md-2">
                        <label>Subtotal</label>
                        <input type="text" id="subtotal-input" class="form-control" readonly>
                    </div>
                    <div class="col-md-2">
                        <button type="button" id="btn-add-row" class="btn btn-primary mt-4">+ Tambah Sampah</button>
                    </div>
                </div>

                <h5 class="mt-4">Detail Setoran</h5>
                <table class="table table-bordered" id="tabel-detail">
                    <thead>
                        <tr>
                            <th>Jenis Sampah</th>
                            <th>Harga (Rp)</th>
                            <th>Jumlah (kg)</th>
                            <th>Subtotal (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

                <button type="submit" class="btn btn-success mt-3">Simpan</button>
                <a href="{{ route('setoran.index') }}" class="btn btn-secondary mt-3">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    let detailIndex = 0;

    // Update harga dan subtotal
    function updateHargaSubtotal() {
        const selected = $('#sampah-select option:selected');
        const harga = parseFloat(selected.data('harga')) || 0;
        const jumlah = parseFloat($('#jumlah-input').val()) || 0;
        const subtotal = harga * jumlah;

        $('#harga-input').val(harga.toLocaleString('id-ID'));
        $('#subtotal-input').val(subtotal.toLocaleString('id-ID'));
    }

    $('#sampah-select').on('change', updateHargaSubtotal);
    $('#jumlah-input').on('input', updateHargaSubtotal);

    $('#btn-add-row').click(function () {
        const selected = $('#sampah-select option:selected');
        const sampahId = selected.val();
        const namaSampah = selected.data('nama');
        const harga = parseFloat(selected.data('harga')) || 0;
        const jumlah = parseFloat($('#jumlah-input').val()) || 0;
        const subtotal = harga * jumlah;

        if (!sampahId || jumlah <= 0) {
            alert('Silakan pilih jenis sampah dan isi jumlah dengan benar!');
            return;
        }

        const row = `
            <tr>
                <td>${namaSampah}<input type="hidden" name="detail[${detailIndex}][sampah_id]" value="${sampahId}"></td>
                <td><input type="hidden" name="detail[${detailIndex}][harga]" value="${harga}">${harga.toLocaleString('id-ID')}</td>
                <td><input type="hidden" name="detail[${detailIndex}][jumlah]" value="${jumlah}">${jumlah}</td>
                <td><input type="hidden" name="detail[${detailIndex}][subtotal]" value="${subtotal}">${subtotal.toLocaleString('id-ID')}</td>
                <td><button type="button" class="btn btn-danger btn-sm btn-delete-row">Hapus</button></td>
            </tr>
        `;

        $('#tabel-detail tbody').append(row);
        detailIndex++;

        // Reset input
        $('#sampah-select').val('');
        $('#harga-input').val('');
        $('#jumlah-input').val('');
        $('#subtotal-input').val('');
    });

    // Hapus baris
    $(document).on('click', '.btn-delete-row', function () {
        $(this).closest('tr').remove();
    });
});
</script>
@endpush
