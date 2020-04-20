<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contents\Categories;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use Illuminate\Http\Request;
use App\Models\Members\Follows;

class ProfileController extends Controller
{
    public function Show($username)
    {    
        
       $categories = Categories::all();
       $member = Members::whereUsername($username)->first();

       $followers=Follows::where('followed_id',$member->id)->count();
       $followings=Follows::where('follower_id',$member->id)->count();

       $moveis= Posts::where('confirmed',1)->where('categories_id',1)->take(10)->get();
        return view('Main.channel.user',compact(['member','categories','moveis','followers','followings']));
    }

    public function About($username)
    {
        $member = Members::whereUsername($username)->first();

        $followers=Follows::where('followed_id',$member->id)->count();
        $followings=Follows::where('follower_id',$member->id)->count();

        return view('Main.channel.about',compact(['member','followers','followings']));
    }
}
