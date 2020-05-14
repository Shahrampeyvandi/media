<?php

namespace App\Models\Members;

use App\Models\Contents\Posts;
use App\Models\Contents\Comments;
use App\Models\Members\Favorites;
use App\Models\Members\Follows;
use App\Models\Accounting\Purchase;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\PayesSubscribes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Members extends Model  implements Authenticatable
{
    use AuthenticableTrait;

    protected $guarded =[];


    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
    public function payesSubscribes()
    {
        return $this->hasMany(PayesSubscribes::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

    public function followers()
    {
        return $this->hasMany(Follows::class,'followed_id');
    }

    public function followings()
    {
        return $this->hasMany(Follows::class,'follower_id');
    }


    public function path()
    {
        
        return $this->username;
    }

    public function is_admin()
    {
        return auth()->user()->ability == 'admin' ? true : false;
    }
    public function is_mid_admin()
    {
        return auth()->user()->ability == 'mid-level-admin' ? true : false;
    }

    public function channelInformations()
    {
        return $this->hasOne(ChannelInformations::class);
    }
}
