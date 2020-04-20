<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Posts::class);
    }
}
