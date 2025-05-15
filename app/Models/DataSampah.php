<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSampah extends Model
{
    // Tentukan nama tabel
    protected $table = 'data_sampah';

    // Kalau primary key-nya bukan 'id', tentukan nama kolom primary key-nya
    protected $primaryKey = 'sampah_id'; // Ganti dengan kolom primary key yang sesuai jika bukan 'id'
    public $incrementing = false; // Hanya jika sampah_id bukan auto-increment (misal UUID)
    public $timestamps = true; // Aktifkan jika tabel ada kolom created_at & updated_at

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'nama',
        'kategori_id',
        'satuan',
        'harga_per_kg'
    ];

    /**
     * Relasi ke Kategori (relasi belongsTo)
     * Menghubungkan data_sampah dengan kategori_id dari tabel kategoris
     */
    public function kategori()
    {
        // Mengasumsikan tabel 'kategoris' memiliki primary key 'kategori_id'
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    /**
     * Relasi ke Setoran (jika ada tabel data_setoran)
     * Menghubungkan data_sampah dengan data_setoran melalui sampah_id
     */
    public function data_setoran()
    {
        return $this->hasMany(Setoran::class, 'sampah_id', 'sampah_id');
    }
}
