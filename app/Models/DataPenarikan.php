<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenarikan extends Model
{
    use HasFactory;

    protected $table = 'data_penarikan'; // Nama tabel

    protected $fillable = [
        'nasabah_id',
        'jumlah_penarikan',
        'tanggal_penarikan',
        'status',
        'keterangan',
    ];

    // Relasi dengan Nasabah (asumsi ada relasi dengan Nasabah)
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class);
    }
}
