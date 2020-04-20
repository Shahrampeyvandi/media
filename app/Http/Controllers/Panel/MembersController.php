<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;

class MembersController extends Controller
{
    public function Index($content='')
    {

      if($content == '' ){
          $members=Members::where('group','student')->get();
     }
     if($content == 'teacher'){
        $members=Members::where('group','teacher')->get();
     }
     if($content == 'deactive'){
        $members=Members::where('active',0)->get();
    }
    
        return view('Panel.Members',compact('members'));
    }
}
