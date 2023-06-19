<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'room_id',
        'name',
        'nama',
        'checkin_date',
        'checkout_date',
        'kategori_kamar',
        'category_id',
        'status',
        'user_id',
        'gambar_pembayaran',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
