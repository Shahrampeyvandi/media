<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Contents\Advert;
use App\Models\Contents\AdvertLink;
use App\Models\Contents\Policies;
use App\Models\Contents\ContactUs;
use App\Models\Contents\Income;
use App\Models\Contents\PostBanner;
use App\Models\Contents\Posts;
use App\Models\Contents\Testimonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->route('Panel.Dashboard');
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
        return redirect()->route('Panel.Dashboard');
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
       return redirect()->route('Panel.Dashboard');
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
        return redirect()->route('Panel.Dashboard');
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
       return redirect()->route('Panel.Dashboard');
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
        return redirect()->route('Panel.Dashboard');
    }

    public function BannerPost()
    {
       $postbanners = PostBanner::all();
        return view('Panel.BannerPostList',compact('postbanners'));
    }

    public function CreateBannerPost()
    {
        return view('Panel.BannerPost');
    }

    public function GetAjaxContent(Request $request)
    {
        
        $posts = Posts::where('categories_id',$request->type)->where('languages_id',$request->lang)->get();
        $list = '<option value="0">باز کردن فهرست انتخاب</option>';
      if (count($posts)) {
        foreach ($posts as $key => $post) {
            $list .='<option value="'.$post->id.'">'.$post->title.'</option>';
        }
      }
        return response()->json(
            $list
            , 200);
    
    }
    public function SaveBannesPost(Request $request)
    {
        
        if ($request->position == null || $request->type == null || $request->lang == null) {
            toastr()->error('ورودی ها را کامل کنید');
            return back();
        }
        if($request->content == "0"){
            toastr()->error('محتوایی پیدا نشد');
            return back();
        }

        $post = PostBanner::where('type',$request->position)->first();
        $validator = Validator::make($request->all(), [
            'pic' => 'mimes:jpeg,png,jpg',
        ]);

        if ($validator->fails()) {
            toastr()->error('لطفا تصویر را وارد نمایید');
            return back();
        }

        $destinationPath = "files/postbanner/";
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        if ($request->hasFile('pic')) {
            if(!is_null($post)){
                File::delete(public_path() . '/' . $post->image);
            }
            $picextension = $request->file('pic')->getClientOriginalExtension();
            $fileName = 'pic_' . time() . '.' . $picextension;
            $request->file('pic')->move($destinationPath, $fileName);
            $picPath = "files/postbanner/$fileName";
        }else{
            $picPath = is_null($post) ? 'assets/images/theater.jpeg' : $post->image;
        }
     
        if(!is_null($post)){
            PostBanner::first()->update([
                'content_id' => $request->content,
                'image' => $picPath,
                'text' => $request->title,
            ]);
    
        }else{
            PostBanner::create([
                'content_id' => $request->content,
                'image' => $picPath,
                'text' => $request->title,
                'type' => $request->position
            ]);
        }
            toastr()->success('با موفقیت افزوده شد');
            return back();



    }

    public function Testimonials()
    {
        return view('Panel.Testimonials');
    }

    public function SaveTestimonials(Request $request)
    {
        if(is_null($request->content)){
            toastr()->error('لطفا متن وارد کنید');
            return back();
        }
        Testimonal::create([
        'content' => $request->content
       ]);
       toastr()->success('با موفقیت ذخیره شد');
       return redirect()->route('Testimonials');
    }

    public function EditTestimonials(Request $request)
    {
        $testimonial = Testimonal::latest()->first();
        if (is_null($testimonial)) {
            toastr()->warning('موردی برای ویرایش وجود ندارد');
            return back();
          }
        return view('Panel.EditTestimonials',compact('testimonial'));
    }

    public function SaveEditTestimonials(Request $request)
    {
        Testimonal::where('id',$request->id)->update([
            'content' => $request->content
        ]);
        toastr()->success('با موفقیت آپدیت شد');
        return redirect()->route('Testimonials');
    }
    public function ShowAdvertList()
    {

        $advertLinks = AdvertLink::latest()->get();
        return view('Panel.ShowAdvertList',compact('advertLinks'));
    }

    
    
    public function AddContentAdvert()
    {

        
        return view('Panel.AddContentAdvert');
    }

    public function SubmitAdvertContent(Request $request)
    {  
        
        if($request->link == null && !$request->has('file')){
            toastr()->error('لطفا لینک فایل را وارد و یا فایل مورد نظر را آپلود کنید');
            return back();
        }
        
        $newAdvert = new AdvertLink();

        

        if ($request->content_type == "image") {
           

           $newAdvert->content_link = $request->link;

           $destinationPath = "files/adverts/";
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $picextension = $request->file('pic_address')->getClientOriginalExtension();
                $fileName = 'pic' . time() . '.' . $picextension;
                $request->file('pic_address')->move($destinationPath, $fileName);
                $picPath = "/files/adverts/$fileName";
               
               
                $newAdvert->pic_address = route('BaseUrl').$picPath;
                
                
                
                $newAdvert->type = "image";

           
        }
        if ($request->content_type == "video") {
            if($request->link !== null){
                $newAdvert->content_link = $request->link;
            }else{
                $destinationPath = "files/adverts/";
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $picextension = $request->file('file')->getClientOriginalExtension();
                $fileName = 'advert_' . time() . '.' . $picextension;
                $request->file('file')->move($destinationPath, $fileName);
                $filePath = "/files/adverts/$fileName";
                $newAdvert->content_link = route('BaseUrl').$filePath;
                if(in_array($request->file('file')->getClientOriginalExtension(),['jpg','jpeg','png','JPG','JPEG','PNG'])){
                    $newAdvert->type = 'image';
                }
                if(in_array($request->file('file')->getClientOriginalExtension(),['avi','mp4','mov','ogg','qt','mp3','mpga','mkv','3gp'])){
                   $newAdvert->type = 'video';
               }
            }
           
         }
       

        $newAdvert->cat_id = $request->category;
        $newAdvert->view_count = $request->count;
        $newAdvert->status = 1;
        $newAdvert->save();
        //  $newAdvert->type 
        toastr()->success('با موفقیت ذخیره شد');
        return redirect()->route('Panel.Content.AdvertList');
        

        

       
     
        
          
    
       
            
        



    }

    
  
}
