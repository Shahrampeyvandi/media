<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
    }
    public function setTextAttribute($value)
    {
        return $this->attributes['text']= nl2br($value);
    }

    public function commentlikes()
    {
        return $this->hasMany(CommentsLikes::class);
    }
}

