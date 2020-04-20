<?php

namespace App\Http\Controllers;

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

    public function policies()
    {
        return view('Main.policies');
    }
}
