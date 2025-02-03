<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['user_id', 'tiket_id', 'jumlah_tiket', 'harga_total', 'promo_id'];

    public function tiket (){
        return $this->belongsTo(tiket::class, 'tiket_id');
    }
    public function promo (){
        return $this->belongsTo(promo::class,'promo_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
