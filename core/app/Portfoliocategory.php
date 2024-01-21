<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfoliocategory extends Model
{
    protected $guarded = [];
    public function portfolios()
    {
        return $this->hasMany('App\Portfolio');
    }
}
