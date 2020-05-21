<?php

namespace App\Models\Members;

use App\Models\Contents\Posts;
use App\Models\Contents\Comments;
use App\Models\Members\Favorites;
use App\Models\Members\Follows;
use App\Models\Accounting\Purchase;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\PayesSubscribes;

class ChannelInformations extends Model
{
    protected $guarded= ['id'];

    public function member()
    {
        return $this->belongsTo(Members::class,'id');
    }

}