<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $table = 'tabungan';
    protected $primaryKey = 'no_tabungan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'no_tabungan',
        'nik',
        'total_tabungan',
    ];

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nik', 'nik');
    }
}
