<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $guarded = [];

    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
