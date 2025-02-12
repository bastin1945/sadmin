<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = ['user_id', 'tiket_id', 'jumlah_tiket', 'harga_total', 'promo_id','email','contact','alamat','status_pembayaran'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->kode_tiket = 'TIK-' . strtoupper(Str::random(8));  // Generate kode unik
        });
    }


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
