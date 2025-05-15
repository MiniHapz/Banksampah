<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Nama tabel
    protected $primaryKey = 'kategori_id'; // Menentukan kolom primary key yang baru
    protected $fillable = ['nama'];

    public function sampah()
    {
        return $this->hasMany(DataSampah::class, 'kategori_id'); // Foreign key di tabel data_sampah
    }
}
