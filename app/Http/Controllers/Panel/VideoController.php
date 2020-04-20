<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function MyVideos()
    {
    // pass subscribe videos
        return view('Panel.MyVideos');
    }

    public function UnsubscribeVideos()
    {
        // pass unsubscribe videos
        return view('Panel.MyVideos');
    }
}
