<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Members\Favorites;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    
    public function AddFavorite(Request $request)
    {
       $user_id = auth()->user()->id;
        if(Favorites::where(['posts_id'=>$request->id,'members_id'=>$user_id])->count()){
           $favorite = new Favorites();
           $favorite->removeFromFavorite($user_id,$request->id);
           return response()->json(
            'remove'
            , 200);
        }else{
            $favorite=new Favorites();
            $favorite->members_id=$user_id;
            $favorite->posts_id = $request->id;
            $favorite->save();
            return response()->json(
                'add'
                , 200);
        }
       
        
    }  
}
