<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function CountSlideShow(Request $request)
    {

        if ($request->slider_type == 'header slider') {
            Setting::first()->update([
                'header_slide_count' => $request->count
            ]);
        }
        if ($request->slider_type == 'client slider') {
            Setting::first()->update([
                'footer_slide_count' => $request->count,
                'footer_slider_title' => $request->header
            ]);
        }
      
        toastr()->success('با موفقیت تغییر کرد');
        return back();
    }


    public function commission(Request $request)
    {
        
        $mainpage=$request->mainpage;
       
        $setting = Setting::first();
        $setting->commission = $request->commission;
        foreach($mainpage as $key=>$main){
          $setting->$key = 1;
        }
        $setting->update();

        
        toastr()->success('با موفقیت تغییر کرد');
        return back();
    }

    public function index()
    {

            $setting=Setting::first();

      
        return view('Panel.Setting',compact('setting'));
    }
}

