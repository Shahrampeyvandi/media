<?php

namespace App\Models\Members;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $quarded= [];

    public function posts()
    {
        return $this->belongsTo('App\Models\Contents\Posts');

    }

    public function removeFromFavorite($user,$id)
    {
        $this->where('posts_id',$id)->where('members_id',$user)->delete();
    }
}
