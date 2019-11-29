<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attributesValue';

    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class
        ,'attributeGroup_id');
    }

}
