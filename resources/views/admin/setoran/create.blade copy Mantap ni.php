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

            <form action="{{ route('setoran.store') }}" method="POST">
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
                <h5>Detail Sampah</h5>

                <div id="detail-container">
                    <div class="row align-items-end detail-row mb-3">
                        <div class="col-md-4">
                            <label>Jenis Sampah</label>
                            <select name="detail[0][sampah_id]" class="form-control sampah-select" required>
                                <option value="">-- Pilih Sampah --</option>
                                @foreach ($sampah as $s)
                                    <option value="{{ $s->sampah_id }}" data-harga-per-kg="{{ $s->harga_per_kg }}">
                                        {{ $s->nama }} - Rp{{ number_format($s->harga_per_kg, 0, ',', '.') }}/{{ $s->satuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Harga</label>
                            <input type="text" class="form-control harga-input" readonly>
                        </div>
                        <div class="col-md-2">
                            <label>Jumlah (kg)</label>
                            <input type="number" step="0.1" name="detail[0][jumlah]" class="form-control jumlah-input" required>
                        </div>
                        <div class="col-md-2">
                            <label>Subtotal</label>
                            <input type="text" class="form-control subtotal-input" readonly>
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-remove d-none">Hapus</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="btn-add-detail" class="btn btn-primary mt-2 mb-4">+ Tambah Sampah</button>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('setoran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    let detailIndex = 1;

    // Fungsi untuk menghitung harga dan subtotal
    function updateSubtotal(row) {
        const hargaPerKg = parseFloat(row.find('.sampah-select option:selected').data('harga-per-kg')) || 0;
        const jumlah = parseFloat(row.find('.jumlah-input').val()) || 0;
        const subtotal = hargaPerKg * jumlah;

        // Menampilkan harga per kg dan subtotal
        row.find('.harga-input').val(hargaPerKg.toLocaleString('id-ID')); // Menampilkan harga per kg
        row.find('.subtotal-input').val(subtotal.toLocaleString('id-ID')); // Menampilkan subtotal
    }

    // Event handler saat ada perubahan pada pilih jenis sampah atau jumlah
    $(document).on('change', '.sampah-select, .jumlah-input', function () {
        const row = $(this).closest('.detail-row');
        updateSubtotal(row);
    });

    // Menambahkan baris detail baru
    $('#btn-add-detail').on('click', function () {
        const newRow = $('.detail-row:first').clone();
        newRow.find('select, input').each(function () {
            const name = $(this).attr('name');
            if (name) {
                const newName = name.replace(/\[\d+\]/, `[${detailIndex}]`);
                $(this).attr('name', newName);
            }
            $(this).val(''); // Reset value input baru
        });
        newRow.find('.btn-remove').removeClass('d-none');
        $('#detail-container').append(newRow);
        detailIndex++;
    });

    // Menghapus baris detail sampah
    $(document).on('click', '.btn-remove', function () {
        $(this).closest('.detail-row').remove();
    });

    // Mengupdate harga dan subtotal pada baris pertama saat halaman dimuat
    $('.detail-row').each(function () {
        updateSubtotal($(this)); // Mengupdate harga dan subtotal pada baris pertama
    });
});
</script>
@endpush
