<?php

namespace App\Http\Controllers;

use App\Models\Contents\Advert;
use App\Models\Contents\ContactUs;
use App\Models\Contents\Policies;
use App\Models\Contents\Posts;
use App\Models\Contents\Testimonal;
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

    public function policies($slug = 's')
    {
        if($slug == 's')
        {
            $policy = Policies::where('relatedto','students')->latest()->first();

        }
        if($slug == 't')
        {
            $policy = Policies::where('relatedto','teachers')->latest()->first();

        }
        $content = $policy !== null ? $policy->content : '';

        return view('Main.policies',compact('content'));
    }

    public function Advert()
    {
        
       $advert =  Advert::latest()->first();
       if(!is_null($advert)){
        $content = $advert->content;
       }else{
           $content = '';
       }
        return view('Main.Advert',compact('content'));
        
    }

    public function ContactUs()
    {

       $contact_us =  ContactUs::latest()->first();
       if(!is_null($contact_us)){
        $content = $contact_us->content;
       }else{
           $content = '';
       }
        return view('Main.contactus',compact('content'));
    }
    public function Testimonials()
    {

       $testimonial =  Testimonal::latest()->first();
       if(!is_null($testimonial)){
        $content = $testimonial->content;
       }else{
           $content = '';
       }
        return view('Main.testimonials',compact('content'));
    }
    public function Search(Request $request)
    {
       if($request->key != ''){
       
      $posts =  Posts::where('title','like', '%' . $request->key . '%')->latest()->take(10)->get();
       }else{
           return false;
       }
      $li = '';
      if(count($posts) !== 0){
        foreach ($posts as $key => $post) {
            $li .='<li><a href="' . route('ShowItem', ['content'=>$post->categories->name,'slug'=>$post->slug]) . '" class="float-right text-primary">'.$post->title.'</a><span class="float-left fs-0-8"> '.$post->categories->name.'</span></li><br/>';
        }
      }else{
        $li .='<li><a href="#" class="float-right text-primary fs-0-8">موردی یافت نشد</a></li>';

      }
     

      return response()->json(
          $li,200
      );

    }

  
}
