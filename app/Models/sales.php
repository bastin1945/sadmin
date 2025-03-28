<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    protected $fillable = ['konser_id'];

    public function konser()
    {
        return $this->belongsTo(konser::class, 'konser_id');
    }
}
