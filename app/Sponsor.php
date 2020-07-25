<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public $guarded = [];

    public function address()
    {
        return $this->belongsTo(Address::class,'address_id','id');
    }
}
