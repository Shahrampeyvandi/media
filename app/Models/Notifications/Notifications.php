<?php

namespace App\Models\Notifications;

use App\Models\Contents\Posts;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    public function setTextAttribute($value)
    {
        return $this->attributes['text']= nl2br($value);
    }
}
