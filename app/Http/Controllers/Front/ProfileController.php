<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contents\Categories;
use App\Models\Members\Members;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function Show($username)
    {    
        
       $categories = Categories::all();
       $user = Members::whereUsername($username)->first();
        return view('Main.user',compact(['user','categories']));
    }
}
