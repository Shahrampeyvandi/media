<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\SlideShow\Slideshow;
use App\Models\Contents\Categories;
use App\Models\Contents\Visit;
use Morilog\Jalali\Jalalian;

class IndexController extends Controller
{
    public function Index()
    {
       

        if (!request()->hasCookie($_SERVER['REMOTE_ADDR'])) {
           Visit::create([
               'ip' => $_SERVER['REMOTE_ADDR'],
               'day' => Jalalian::now()->format('%A')
           ]);
             // ۱۰ دقیقه
            cookie()->queue(cookie($_SERVER['REMOTE_ADDR'], null, 15));
        }

        $categories=Categories::all();
        $slideshows=Slideshow::latest()->get();
        $moveis=Posts::where('confirmed',1)->where('categories_id',1)->take(10)->get();
        $animations=Posts::where('confirmed',1)->where('categories_id',2)->take(10)->get();
        $clips=Posts::where('confirmed',1)->where('categories_id',3)->take(10)->get();
        $musics=Posts::where('confirmed',1)->where('categories_id',4)->take(10)->get();
        $podcasts=Posts::where('confirmed',1)->where('categories_id',5)->take(4)->get();
        $learning=Posts::where('confirmed',1)->where('categories_id',6)->take(10)->get();

        //dd($moveis[0]->languages);

        return view('Main.index',compact(['categories','moveis','animations','clips','musics','podcasts','learning','slideshows']));

    }
}
