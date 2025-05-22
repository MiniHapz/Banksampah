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
        'no_transaksi',       
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

//     public function nasabah()
// {
//     return $this->belongsTo(Nasabah::class, 'nik', 'nik'); // Menyesuaikan dengan 'nik' yang ada di tabungan dan setoran
// }

public function getNamaNasabahAttribute()
{
    // Cek dulu apakah relasi tabungan dan nasabah-nya ada
    return $this->tabungan && $this->tabungan->nasabah
        ? $this->tabungan->nasabah->nama_lengkap
        : '-'; // fallback jika data tidak lengkap
}
public function nasabah()
{
    return $this->hasOneThrough(
        Nasabah::class,
        Tabungan::class,
        'no_tabungan', // Foreign key Tabungan di Setoran
        'nik',         // Foreign key Nasabah di Tabungan
        'no_tabungan', // Local key Setoran
        'nik'          // Local key Tabungan
    );
}
}
