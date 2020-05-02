<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    public function setTextAttribute($value)
    {
        return $this->attributes['text']= nl2br($value);
    }
}
