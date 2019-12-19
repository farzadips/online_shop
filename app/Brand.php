<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
