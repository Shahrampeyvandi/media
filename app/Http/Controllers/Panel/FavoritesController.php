<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Favorites;

class FavoritesController extends Controller
{
    public function index($content='')
    {
        $member = auth()->user();

        $favorites=Favorites::where('members_id',$member->id)->get();
        $posts=[];
        $key=0;


        if($content == '' ){
            foreach($favorites as $favorite){
                if($favorite->posts->categories_id==1){
                $posts[$key]=$favorite->posts;
                $key++;
                }
            }
        }
        if($content == 'clips'){
            foreach($favorites as $favorite){
                if($favorite->posts->categories_id==2){
                $posts[$key]=$favorite->posts;
                $key++;
                }
            }
        }
        if($content == 'animations'){
            foreach($favorites as $favorite){
                if($favorite->posts->categories_id==3){
                $posts[$key]=$favorite->posts;
                $key++;
                }
            }
        }
        if($content=='musics'){
            foreach($favorites as $favorite){
                if($favorite->posts->categories_id==4){
                $posts[$key]=$favorite->posts;
                $key++;
                }
            }
        }
        if($content == 'podcasts'){
            foreach($favorites as $favorite){
                if($favorite->posts->categories_id==5){
                $posts[$key]=$favorite->posts;
                $key++;
                }
            }
        }
        if($content == 'learnings'){
            foreach($favorites as $favorite){
                if($favorite->posts->categories_id==6){
                $posts[$key]=$favorite->posts;
                $key++;
                }
            }
        }



      

        return view('Panel.MyFavorites',compact('posts'));
    }
}
