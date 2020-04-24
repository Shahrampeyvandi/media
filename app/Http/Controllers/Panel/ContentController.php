<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Model\Policies;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function Policies()
    {
        
        return view('Panel.Policies');
    }

    public function SavePolicy(Request $request)
    {
        Policies::create([
            'relatedto' => $request->relatedto,
            'content' => $request->content
        ]);
    }
}
