<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\Contents\Episodes;
use App\Models\Contents\Categories;
use App\Models\Contents\Comments;
use App\Models\Accounting\Purchase;
use App\Models\Contents\Likes;
use App\Models\Members\Favorites;

class PostController extends Controller
{
    public function index($id)
    {
        $content = Posts::whereId($id)->first();
        
        $favorite_status=0;
        if(auth()->user()){
        $user_id = auth()->user()->id;
        $favorite_status = Favorites::where('posts_id',$content->id)->where('members_id',$user_id)->count();
       }
       
        $likes = Likes::where('posts_id',$content->id)->count();
        $content->views = $content->views + 1;
        $views = Posts::whereId($id)->update(['views' => $content->views]);
        $content->update();
        
        $isbuyedit=false;
        if(auth()->user()){
        $purchase=Purchase::where('members_id',auth()->user()->id)->where('posts_id',$id)->where('success',1)->first();
        if($purchase){
            $isbuyedit=true;
        }
        if($content->members_id==auth()->user()->id){
            $isbuyedit=true;
        }


        }
        if($content->type=='free'){
            $isbuyedit=true;
        }

        $relateds = Posts::where('categories_id', $content->categories_id)->where('id','!=',$id)->take(5)->get();
        $categories = Categories::all();
        $countcategoryposts = Posts::where('categories_id',$content->categories_id)->count();
        $comments = 
        Comments::where('posts_id', $id)
       ->where('parent_id',0)
       ->where('confirmed',1)
       ->latest()->get();

        if($content->categories_id == 6){
         
            $episodes = Episodes::where('posts_id',$id)->orderBy('number', 'asc')->get();

            $post=$content;
            //dd($episodes);
            return view('Main.tutorial', compact(['isbuyedit','id','post','content','comments','likes','favorite_status', 'relateds', 'categories', 'countcategoryposts','episodes']));
            
        }else{
            // get Epizodes
            

            return view('Main.single', compact(['isbuyedit','id','content', 'comments','likes','favorite_status', 'relateds', 'categories', 'countcategoryposts']));
        }

    }

    public function ConfirmUnConfPost(Request $request)
    {

        $post = Posts::find($request->id)->update('confirmed', $request->c);

        return back();
    }

    public function create(Request $request)
    {
    }


    public function episode($id,$ep)
    {
        $content = Episodes::where('posts_id',$id)->where('number',$ep)->first();
        $post=Posts::whereId($id)->first();
        $favorite_status=0;
        $isbuyedit=true;

        if(auth()->user()){
        $user_id = auth()->user()->id;
        $favorite_status = Favorites::where('posts_id',$id)->where('members_id',$user_id)->count();
    
    }

    if($post->type='money'){
        if(auth()->user()){
        $purchase=Purchase::where('members_id',auth()->user()->id)->where('posts_id',$id)->where('success',1)->first();
        $isbuyedit=false;
        if($purchase){
            $isbuyedit=true;
        }
        if($content->members_id==auth()->user()->id){
            $isbuyedit=true;
        }
    }else{
        return back();

    }
       }
       

       
        $likes = Likes::where('episodes_id',$content->id)->count();
        $content->views = $content->views + 1;
        $views = Episodes::whereId($content->id)->update(['views' => $content->views]);
        $content->update();
        
       
        $relateds = Posts::where('categories_id', $post->categories_id)->where('id','!=',$id)->take(5)->get();
        $categories = Categories::all();
        $countcategoryposts = Posts::where('categories_id',$post->categories_id)->count();
        $comments = 
        Comments::where('episodes_id', $content->id)
       ->where('parent_id',0)
       ->where('confirmed',1)
       ->latest()->get();

       $content->tags=[];

       $episodes = Episodes::where('posts_id',$id)->orderBy('number', 'asc')->get();

           // $episodes=Episodes::where('posts_id',$)
            return view('Main.tutorial', compact(['isbuyedit','id','content','comments','likes','favorite_status', 'relateds', 'categories', 'countcategoryposts','post','episodes']));
            
       

    }
}
