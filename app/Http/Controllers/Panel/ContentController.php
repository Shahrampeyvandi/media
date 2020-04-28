<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Contents\Advert;
use App\Models\Contents\Policies;
use App\Models\Contents\ContactUs;
use App\Models\Contents\Income;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function Policies($type = 's')
    {
        
        return view('Panel.Policies');
    }

    public function SavePolicy(Request $request)
    {

            Policies::create([
                'relatedto' => $request->relatedto,
                'content' => $request->content
            ]);
            toastr()->success('با موفقیت ذخیره شد');
            return back();
    }

    public function EditPolicies($type = 'students')
    {
        
        $policy = Policies::where('relatedto',$type)->latest()->first();
      if (is_null($policy)) {
        toastr()->warning('موردی برای ویرایش وجود ندارد');  
        return back();
        }
        return view('Panel.EditPolicy',compact('policy'));
    }

    public function SaveEditPolicy(Request $request)
    {
        Policies::where('id',$request->id)->update([
            'content' => $request->content
        ]);
        toastr()->success('با موفقیت آپدیت شد');
        return back();
    }

    public function ContactUs()
    {
        return view('Panel.ContactUs');
    }

    public function SaveContactUs(Request $request)
    {
       
        if(is_null($request->content)){
            toastr()->error('لطفا متن وارد کنید');
            return back();
        }
       ContactUs::create([
        'content' => $request->content
       ]);
       toastr()->success('با موفقیت ذخیره شد');
       return back();
    }

    public function EditContactUs()
    {
        $contactus = ContactUs::latest()->first();
        if (is_null($contactus)) {
            toastr()->warning('موردی برای ویرایش وجود ندارد');
            return back();
          }
        return view('Panel.EditContactUs',compact('contactus'));
    }
    public function SaveEditContactUs(Request $request)
    {
        ContactUs::where('id',$request->id)->update([
            'content' => $request->content
        ]);
        toastr()->success('با موفقیت آپدیت شد');
        return back();
    }

    public function Income()
    {
        return view('Panel.Income');
    }

    public function SaveIncome(Request $request)
    {
       
        if(is_null($request->content)){
            toastr()->error('لطفا متن وارد کنید');
            return back();
        }
       Income::create([
        'content' => $request->content
       ]);
       toastr()->success('با موفقیت ذخیره شد');
       return back();
    }

    public function Advert()
    {
        return view('Panel.Advert');
    }
    public function SaveAdvert(Request $request)
    {
    
        if(is_null($request->content)){
            toastr()->error('لطفا متن وارد کنید');
            return back();
        }
       Advert::create([
        'content' => $request->content
       ]);
       toastr()->success('با موفقیت ذخیره شد');
       return back();
    }

    public function EditAdvert()
    {
        
        $advert = Advert::latest()->first();
        if (is_null($advert)) {
            toastr()->warning('موردی برای ویرایش وجود ندارد');
            return back();
          }
        return view('Panel.EditAdvert',compact('advert'));
    }
    public function SaveEditAdvert(Request $request)
    {
        Advert::where('id',$request->id)->update([
            'content' => $request->content
        ]);
        toastr()->success('با موفقیت آپدیت شد');
        return back();
    }

  
}
