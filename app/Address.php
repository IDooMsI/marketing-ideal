<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    public $guarded = [];

    public function locality()
    {
        return $this->belongsTo(Locality::class,'locality_id','id');
    }

     public function addressComplete($id): string
    {
        $address = Address::find($id);
        $complete = $address->street." ".$address->number." (".$address->locality->name.")";
        return $complete;
    }
}
