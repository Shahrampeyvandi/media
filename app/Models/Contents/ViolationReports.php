<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contents\Posts;

class ViolationReports extends Model
{
     public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
}
