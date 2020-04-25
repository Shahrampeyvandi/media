<?php

namespace App\Http\Controllers;

use App\Models\Contents\Policies;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function Index()
    {
        return view('Main.index');
    }

    public function show(Request $request)
    {
        return view('Main.single');
    }

    public function policies($slug = 's')
    {
        if($slug == 's')
        {
            $policy = Policies::where('relatedto','students')->latest()->first();

        }
        if($slug == 't')
        {
            $policy = Policies::where('relatedto','teachers')->latest()->first();

        }
        $content = $policy !== null ? $policy->content : '';

        return view('Main.policies',compact('content'));
    }

  
}
