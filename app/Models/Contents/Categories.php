<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $quarded= [];

    public function posts()
    {
        return $this->belongsToMany(Posts::class);
    }
}
