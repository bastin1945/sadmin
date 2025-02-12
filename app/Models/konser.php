<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class konser extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'tanggal', 'jam', 'tanggal_penukaran','lokasi_penukaran','lokasi_id', 'deskripsi','image',];

    public function order (){
        return $this->hasMany(Order::class);
    }

    public function tiket(){
        return $this->hasMany(Tiket::class);
    }
    public function lokasi(){
        return $this->belongsTo(lokasi::class);
    }

}
