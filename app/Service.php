<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $guarded = [];

    public function specs()
    {
        return $this->belongsToMany('App\Spec', 'service_specs', 'service_id','specs_id');
    }
    
   public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
