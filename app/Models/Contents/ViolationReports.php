<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contents\Posts;
use App\Models\Members\Members;

class ViolationReports extends Model
{
     public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
    public function members()
    {
        return $this->belongsTo(Members::class);
    }
}
