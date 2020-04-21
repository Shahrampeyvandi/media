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
    public function Show($username,$slug='videos')
    {    

       $category = Categories::where('latin_name',$slug)->first();
       $member = Members::whereUsername($username)->first();
       $posts=$member->posts->where('categories_id',$category->id)->where('confirmed',1)->take(10);

       $followers=Follows::where('followed_id',$member->id)->count();
       $followings=Follows::where('follower_id',$member->id)->count();

       $moveis= Posts::where('confirmed',1)->where('categories_id',1)->take(10)->get();
        return view('Main.channel.user',compact(['member','category','moveis','followers','followings','posts']));
    }

    public function About($username)
    {
        $member = Members::whereUsername($username)->first();

        $followers=Follows::where('followed_id',$member->id)->count();
        $followings=Follows::where('follower_id',$member->id)->count();

        return view('Main.channel.about',compact(['member','followers','followings']));
    }

    public function Follow(Request $request)
    {    
        
      $follows=new Follows;
      $follows->followed_id=$request->id;
      $follows->follower_id=auth()->user()->id;

      $follows->save();
      

       return back();
    }
}
