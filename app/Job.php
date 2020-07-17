<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $guarded = [];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}
