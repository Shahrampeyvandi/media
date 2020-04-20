<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Follows;
use App\Models\Members\Members;

class FollowersController extends Controller
{
    public function index()
    {
        
        $member=auth()->user();

        $followersid=Follows::where('followed_id',$member->id)->get();
      $followers=[];

        foreach($followersid as $key=>$follower){

            $followers[$key]=Members::where('id',$follower->follower_id)->first();

        }

        return view('Panel.MyFollowers',compact('followers'));
    }
}
