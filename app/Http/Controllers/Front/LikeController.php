<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents\Likes;
use App\Models\Contents\Posts;

class LikeController extends Controller
{
    public function LikePost(Request $request)
    {
       $user_id = auth()->user()->id;
        if(Likes::where(['posts_id'=>$request->id,'members_id'=>$user_id])->count()){
            return false;
        }
        $like=new Likes();
        $like->members_id=$user_id;
        $like->posts_id = $request->id;
        $like->save();
        $counts = Likes::where('posts_id',$request->id)->count();
       
        return response()->json(
            $counts
            , 200);
    
        
    }  

    public function LikeEpisode(Request $request)
    {

        $like=new Likes();
        $like->members_id=$request->id;
        $episode=Episodes::find($request->post)->first();
      
        $episode->likes->save($like);

        return back();
    }  

    public function UnLikePost(Request $request)
    {

        $like=Likes::where('members_id',$request->id)->where('posts_id',$request->pid)->delete();

    
       

        return back();
    }  

    public function UnLikeEpisode(Request $request)
    {

        $like=Likes::where('members_id',$request->id)->where('episodes_id',$request->pid)->delete();

        return back();
    }  


    public function LikeComment(Request $request)
    {
       $user_id = auth()->user()->id;
        if(Likes::where(['posts_id'=>$request->id,'members_id'=>$user_id])->count()){
            return false;
        }
        $like=new Likes();
        $like->members_id=$user_id;
        $like->posts_id = $request->id;
        $like->save();
        $counts = Likes::where('posts_id',$request->id)->count();
       
        return response()->json(
            $counts
            , 200);
    
        
    }  



}
