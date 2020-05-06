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
        //dd($request);
        $mainpage=$request->mainpage;
        $film=0;
        $animation=0;
        $plus=0;
        $music=0;
        $podcast=0;
        $taturial=0;

        foreach($mainpage as $main){
            if($main==1){
                $film=1;
            }else if($main==2){
                $animation=1;
            }else if($main==3){
                $plus=1;
            }else if($main==4){
                $music=1;
            }else if($main==5){
                $podcast=1;
            }else if($main==6){
                $taturial=1;
            }
        }

            Setting::first()->update([
                'commission' => $request->commission,
                'mainpage_films'=>$film,
                'mainpage_animations'=>$animation,
                'mainpage_plus'=>$plus,
                'mainpage_musics'=>$music,
                'mainpage_podcasts'=>$podcast,
                'mainpage_taturials'=>$taturial,
            ]);
    

      
        toastr()->success('با موفقیت تغییر کرد');
        return back();
    }

    public function index()
    {

            $setting=Setting::first();

      
        return view('Panel.Setting',compact('setting'));
    }
}

