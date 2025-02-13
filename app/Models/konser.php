<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konser extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal',
        'jam',
        'tanggal_penukaran',
        'lokasi_penukaran',
        'lokasi_id',
        'deskripsi',
        'image',
        'views',          // Tambahkan kolom views di sini
        'sales',          // Tambahkan kolom sales di sini
        'is_recommended'  // Tambahkan kolom is_recommended di sini
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function tiket()
    {
        return $this->hasMany(Tiket::class);
    }
    public function views()
    {
        return $this->hasMany(views::class);
    }
    public function sales()
    {
        return $this->hasMany(sales::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class);
    }
}
