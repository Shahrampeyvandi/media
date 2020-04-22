<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function List()
    {

        $channels=Members::where('approved',1)->get();
        
        return view('Main.channel.list',compact('channels'));
    }
}
