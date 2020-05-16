<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class AdvertLink extends Model
{
    protected $guarded = ['id'];
    public function categories()
    {
        return $this->belongsTo(Categories::class,'cat_id');
    }
    public function visits()
    {
        return $this->hasMany(AdvertVisit::class,'advertlink_id');
    }
}
