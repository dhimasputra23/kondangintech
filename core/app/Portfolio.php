<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded = [];
    /* public function service(){
        return $this->belongsTo('App\Service');
    } */
    public function portfoliocategory()
    {
        return $this->belongsTo('App\Portfoliocategory');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}
