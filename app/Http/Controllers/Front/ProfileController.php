<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contents\Categories;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Show($username)
    {    
        
       $categories = Categories::all();
       $user = Members::whereUsername($username)->first();
    
       $moveis= Posts::where('confirmed',1)->where('categories_id',1)->take(10)->get();
        return view('Main.channel.user',compact(['user','categories','moveis']));
    }

    public function About()
    {
        
        return view('Main.channel.about');
    }
}
