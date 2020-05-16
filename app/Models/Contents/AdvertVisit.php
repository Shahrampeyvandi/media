<?php

namespace App\Models\Contents;

use Illuminate\Database\Eloquent\Model;

class AdvertVisit extends Model
{
    protected $guarded = ['id'];
    public function advert()
    {
        return $this->belongsTo(AdvertLink::class,'advertlink_id');
    }
}
