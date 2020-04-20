<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\SlideShow\Slideshow;
use App\Models\Contents\Categories;

class IndexController extends Controller
{
    public function Index()
    {

        $categories=Categories::all();

        $slideshows=Slideshow::all();

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
