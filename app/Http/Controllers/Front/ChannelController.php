<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function List()
    {

        
        return view('Main.channel.list');
    }
}
