<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolioimage extends Model
{
    protected $guarded = [];
    public function portfolio()
    {
        return $this->belongsTo('App\Portfolio');
    }

}
