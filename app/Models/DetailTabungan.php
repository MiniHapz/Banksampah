<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTabungan extends Model
{
    protected $table = 'detail_tabungan';

    protected $fillable = [
        'no_tabungan',
        'no_transaksi',
        'total_kg',
        'nominal_seluruh',
    ];

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class, 'no_tabungan', 'no_tabungan');
    }

    public function setoran()
    {
        return $this->belongsTo(Setoran::class, 'no_transaksi', 'no_transaksi');
    }
}
