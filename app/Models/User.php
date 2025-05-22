<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'user_id'; // primary key jadi user_id
    public $incrementing = true;       // true jika kolom ini auto-increment
    protected $keyType = 'int';        // tipe data primary key (biasanya int)

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nasabah()
    {
        return $this->hasOne(Nasabah::class, 'user_id', 'user_id');
    }
}
