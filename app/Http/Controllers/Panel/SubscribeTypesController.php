<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Contents\Posts;
use Illuminate\Http\Request;

class SubscribeTypesController extends Controller
{
  
    public function UnsubscribeAudios()
    {
        return view('Panel.MyAudios');

    }
  

    public function UnsubscribeFiles()
    {
        return view('Panel.UnsubscribeFiles');
    }
}
