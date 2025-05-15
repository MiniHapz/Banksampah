<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSetoran extends Model
{
    use HasFactory;

    protected $table = 'detail_setoran';

    protected $fillable = [
        'no_transaksi',
        'sampah_id',
        'harga',
        'jumlah',
        'sub_total',
    ];

    public function setoran()
    {
        return $this->belongsTo(Setoran::class, 'no_transaksi', 'no_transaksi');
    }

    public function sampah()
    {
        return $this->belongsTo(DataSampah::class, 'sampah_id');
    }
}
