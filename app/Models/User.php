<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'role_id',
        'jenis_penyewa',
        'kamar_id',
        'no_wali',
        'no_ktp',
        'ktp',
        'birth',
        'alamat',
        'no_hp',
        'password',
        'email'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'kamar_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'penyewa_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
