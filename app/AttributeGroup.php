<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    protected $table = 'attributesGroup';

    public function attributesValue()
    {
        $this->hasMany(AttributeValue::class
        ,'id');
    }
}
