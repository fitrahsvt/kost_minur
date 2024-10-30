<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = "rooms";

    protected $fillable = [
        'nomor',
        'foto',
        'harga',
        'status_ketersediaan',
        'ukuran',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'kamar_id');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'facility_room');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
