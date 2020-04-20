<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
    }
}
