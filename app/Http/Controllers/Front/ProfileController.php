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
        $checkfollow = Follows::where('followed_id',$member->id)->where('follower_id',auth()->user()->id)->count();
       $moveis= Posts::where('confirmed',1)->where('categories_id',1)->take(10)->get();
        return view('Main.channel.user',compact([
            'member',
            'category',
            'moveis',
            'followers',
            'followings',
            'posts',
            'checkfollow'
            ]));
    }

    public function About($username)
    {
        $member = Members::whereUsername($username)->first();
        $checkfollow = Follows::where('followed_id',$member->id)->where('follower_id',auth()->user()->id)->count();
        $followers=Follows::where('followed_id',$member->id)->count();
        $followings=Follows::where('follower_id',$member->id)->count();

        return view('Main.channel.about',compact(['member','followers','followings','checkfollow']));
    }

    public function Follow(Request $request)
    {    
      $check = Follows::where('followed_id',$request->id)->where('follower_id',auth()->user()->id)->count();
     if($check){
        Follows::where('followed_id',$request->id)->where('follower_id',auth()->user()->id)->delete();
        return response()->json(
            'unfollow'
            , 200);
        
    }else{

      $follows=new Follows;
      $follows->followed_id=$request->id;
      $follows->follower_id=auth()->user()->id;

      $follows->save();
      

      return response()->json(
        'follow'
        , 200);
    }
}
}
