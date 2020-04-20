<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents\Episodes;

class EpisodeController extends Controller
{
    public function ConfirmUnConfEpisode(Request $request)
    {

        $episode=Episodes::find($request->id)->update('confirmed',$request->c);
      
        return back();
    }  
}
