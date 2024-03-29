<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $guarded = ['id'];
    public function setContentAttribute($value)
    {
        return $this->attributes['content']= nl2br($value);
    }
}
