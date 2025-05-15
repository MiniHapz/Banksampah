<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'data_nasabah';

    protected $primaryKey = 'nik';  // Menetapkan 'nik' sebagai primary key
    public $incrementing = false;   // Menyatakan 'nik' bukan auto-increment

    protected $fillable = [
        'nik', 'nama_lengkap', 'no_telp', 'dusun', 'rt', 'rw', 'jenis_kelamin', 'tanggal_lahir', 'saldo', 'aktif',
    ];

    public function data_setoran()
    {
        return $this->hasMany(Setoran::class, 'nik', 'nik');
    }
    // Model Nasabah

public function setoran()
{
    return $this->hasMany(Setoran::class, 'nik', 'nik');
}

}
