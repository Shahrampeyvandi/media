<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contents\Posts;

class Transaction extends Model
{
    public function posts()
    {
        return $this->belongsto(Posts::class);
    }
    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
    }
}
