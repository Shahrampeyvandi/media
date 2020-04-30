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

    public function AddAboutUs()
    {
        return view('Panel.aboutus');
    }

    public function SaveAboutUs(Request $request)
    {
       
        if(is_null($request->content)){
            toastr()->error('لطفا متن وارد کنید');
            return back();
        }
       Members::where('id',auth()->user()->id)->update([
        'aboutus' => $request->content
       ]);
       toastr()->success('با موفقیت ذخیره شد');
       return back();
    }

   
}
