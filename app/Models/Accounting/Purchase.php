<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contents\Posts;

class Purchase extends Model
{
    public function members()
    {
        return $this->belongsTo('App\Models\Members\Members');
    }
    public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
}
