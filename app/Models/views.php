<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class views extends Model
{
    protected $fillable = ['konser_id'];

    public function views()
    {
        return $this->belongsTo(konser::class,'konser_id');
    }
}
