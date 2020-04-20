<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
