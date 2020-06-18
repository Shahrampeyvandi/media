<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents\Comments;
use App\Models\Contents\CommentsLikes;
use App\Models\Contents\Episodes;
use App\Models\Contents\Posts;
use App\Models\Members\Members;
use App\Models\Notifications\Notifications;

class CommentController extends Controller
{
    public function AddPostComment(Request $request)
    {
        $post = Posts::where('id',$request->post_id)->first();
        $comment=new Comments();
        $comment->members_id = auth()->user()->id;
        $comment->text=$request->comment;
        $comment->parent_id = $request->parent_id;
        
        $comment->posts_id = $request->post_id;
        $comment->confirmed = auth()->user()->is_admin() ? 1 : 0;
        $comment->save();


        

        foreach (Members::where('group', 'admin')->get() as $key => $admin) {
            $notification = new Notifications;
            $notification->members_id = $admin->id;
            $notification->title = 'دیدگاه جدید';
            $notification->text = 'کاربر با نام کاربری <a href="' . route('User.Show', auth()->user()->username) . '" class="text-primary">' . auth()->user()->username .
             '</a> برای پست با عنوان <a class="text-primary" href="'.route('ShowItem',['content'=>$post->categories->name,'slug'=>$post->slug]).'"> '
             .\Illuminate\Support\Str::limit($post->title,12).' </a> دیدگاه جدید نوشت';
            $notification->posts_id = 0;
            $notification->save();
        }


        toastr()->success('نظر شما با موفقیت ثبت شد');
        return back();
    }  

    public function AddEpisodeComment(Request $request)
    {

        $comment=new Comments();
        $comment->members_id = auth()->user()->id;
        $comment->text=$request->comment;
        $comment->parent_id = $request->parent_id;
        $post=Episodes::whereId($request->post_id)->first()->id;
        $comment->episodes_id = $post;
        $comment->confirmed = auth()->user()->is_admin() ? 1 : 0;
        $comment->save();
        toastr()->success('نظر شما با موفقیت ثبت شد');
        return back();
    }  

    public function ConfirmUnconfComment(Request $request)
    {

        $comment=Comments::find($request->id)->update('confirmed',$request->c);
      
        return back();
    }  

    public function DeleteComment(Request $request)
    {

        $comment=Comments::find($request->id)->delete();
      
        return back();
    }
    
    
    public function LikeComment(Request $request)
    {
       if( CommentsLikes::where('comments_id',$request->id)->where('members_id',auth()->user()->id)->count()){
           return false;
       }
        $commentlike= new CommentsLikes;
        $commentlike->members_id=auth()->user()->id;
        $commentlike->comments_id=$request->id;

        $commentlike->score='like';

        $commentlike->save();
        $likecounts =   CommentsLikes::where('comments_id',$request->id)->where('score','like')->count();
      
        return response()->json(
            $likecounts
            , 200);
            
    }

    public function DisLikeComment(Request $request)
    {

        if( CommentsLikes::where('comments_id',$request->id)->where('members_id',auth()->user()->id)->count()){
           return false;
       }
        $commentlike= new CommentsLikes;
        $commentlike->members_id=auth()->user()->id;
        $commentlike->comments_id=$request->id;

        $commentlike->score='dislike';

        $commentlike->save();
        $dislikeCount =   CommentsLikes::where('comments_id',$request->id)->where('score','dislike')->count();
      
        return response()->json(
            $dislikeCount
            , 200);
    }



}
