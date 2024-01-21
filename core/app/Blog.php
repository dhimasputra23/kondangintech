<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function bcategory()
    {
        return $this->belongsTo('App\Bcategory');
    }

    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    public function getAllTagsAttribute()
    {
        if ($this->tags) {
            return explode(',', $this->tags);
        }
        return [];
    }
}
