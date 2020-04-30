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
                'footer_slide_count' => $request->count
            ]);
        }
      
        toastr()->success('با موفقیت تغییر کرد');
        return back();
    }
}
