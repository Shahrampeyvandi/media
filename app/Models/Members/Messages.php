<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
    }
    public function setMessageAttribute($value)
    {
        return $this->attributes['message']= nl2br($value);
    }
    public function setResponseAttribute($value)
    {
        return $this->attributes['response']= nl2br($value);
    }
}
