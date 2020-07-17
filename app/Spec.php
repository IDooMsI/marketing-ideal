<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    public $guarded = [];

    public function services()
    {
        return $this->belongsToMany('App\Service');
    }
}
