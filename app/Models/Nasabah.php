<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'data_nasabah';
    protected $primaryKey = 'nik';
    public $incrementing = false;

    protected $fillable = [
        'nik',
        'user_id', // pastikan kolom ini ada di tabel
        'nama_lengkap',
        'no_telp',
        'dusun',
        'rt',
        'rw',
        'jenis_kelamin',
        'tanggal_lahir',
        'aktif',
    ];

    /**
     * Relasi ke user (pemilik akun)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relasi ke data setoran (duplikat fungsi sebelumnya dihapus)
     */
    public function setoran()
    {
        return $this->hasMany(Setoran::class, 'nik', 'nik');
    }

    /**
     * Relasi ke tabungan
     */
    public function tabungan()
    {
        return $this->hasOne(Tabungan::class, 'nik', 'nik');
    }
}
