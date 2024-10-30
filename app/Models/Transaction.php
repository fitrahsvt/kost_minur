<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'status_bayar',
        'kamar_id',
        'status_order',
        'bukti',
        'metode_pembayaran',
        'total_bayar',
        'penyewa_id',
        'tanggal',
    ];

    public function kamar()
    {
        return $this->belongsTo(Room::class);
    }

    public function penyewa()
    {
        return $this->belongsTo(User::class, 'penyewa_id');
    }
}
