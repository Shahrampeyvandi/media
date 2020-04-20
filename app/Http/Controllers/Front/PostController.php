<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\Contents\Categories;
use App\Models\Contents\Comments;
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
        
       
        $relateds = Posts::where('categories_id', $content->categories_id)->where('id','!=',$id)->take(5)->get();
        $categories = Categories::all();
        $countcategoryposts = Posts::where('categories_id',$content->categories_id)->count();
        $comments = 
        Comments::where('posts_id', $id)
       ->where('parent_id',0)
       ->where('confirmed',1)
       ->latest()->get();

        if($content->categories_id == 6){
          
            return view('Main.tutorial', compact(['content','comments','likes','favorite_status', 'relateds', 'categories', 'countcategoryposts']));
            
        }else{
            // get Epizodes
            

            return view('Main.single', compact(['content', 'comments','likes','favorite_status', 'relateds', 'categories', 'countcategoryposts']));
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
}
