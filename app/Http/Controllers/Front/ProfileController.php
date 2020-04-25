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
       $lastpost=$member->posts->where('confirmed',1)->where('categories_id',$category->id)->first();

      if(!is_null($lastpost)){
        $postsloghat=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',1)->where('confirmed',1)->take(10);
        $postsgrammer=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',2)->where('confirmed',1)->take(10);
        $postsestelahat=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',3)->where('confirmed',1)->take(10);
        $postsconversaion=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',4)->where('confirmed',1)->take(10);
        $postswriting=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',5)->where('confirmed',1)->take(10);
        $postsreading=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',6)->where('confirmed',1)->take(10);
        $postslessening=$member->posts->where('id','!=',$lastpost->id)->where('categories_id',$category->id)->where('subjects_id',7)->where('confirmed',1)->take(10);
 
      }else{
        $postsloghat=[];
        $postsgrammer=[];
        $postsestelahat=[];
        $postsconversaion=[];
        $postswriting=[];
        $postsreading=[];
        $postslessening=[];
 
      }
       $checkfollow=0;
       if(auth()->user()){
        $checkfollow = Follows::where('followed_id',$member->id)->where('follower_id',auth()->user()->id)->count();
       }
        $moveis= Posts::where('confirmed',1)->where('categories_id',1)->take(10)->get();
        return view('Main.channel.user',compact([
            'member',
            'category',
            'moveis',
            'checkfollow',
            'lastpost',
            'postsloghat',
            'postsgrammer',
            'postsestelahat',
            'postsconversaion',
            'postswriting',
            'postsreading',
            'postslessening'

            ]));
    }

    public function About($username)
    {
        $member = Members::whereUsername($username)->first();
        $checkfollow=0;
        if(auth()->user()){
        $checkfollow = Follows::where('followed_id',$member->id)->where('follower_id',auth()->user()->id)->count();
        }
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
