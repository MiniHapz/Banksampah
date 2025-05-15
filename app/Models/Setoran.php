<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setoran extends Model
{
    use HasFactory;

    protected $table = 'setoran';
    protected $primaryKey = 'no_transaksi';  // Primary key Setoran
    public $incrementing = false;            // Karena no_transaksi bukan auto-increment
    protected $keyType = 'string';           // Karena no_transaksi berbentuk string

    protected $fillable = [
        'no_transaksi',       // ✅ ini WAJIB ditambahkan!
        'no_tabungan',
        'tanggal_transaksi',
        'total',
        'total_kasar',
    ];

    // Relasi ke model Tabungan melalui no_tabungan
    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'no_tabungan', 'no_tabungan');
    }

    // Relasi ke detail setoran
    public function detailSetoran()
    {
        return $this->hasMany(DetailSetoran::class, 'no_transaksi', 'no_transaksi');
    }

    public function nasabah()
{
    return $this->belongsTo(Nasabah::class, 'nik', 'nik'); // Menyesuaikan dengan 'nik' yang ada di tabungan dan setoran
}
}
