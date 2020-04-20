<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents\Comments;
use App\Models\Contents\CommentsLikes;
use App\Models\Contents\Posts;

class CommentController extends Controller
{
    public function AddPostComment(Request $request)
    {
    
        $comment=new Comments();
        $comment->members_id = auth()->user()->id;
        $comment->text=$request->comment;
        $comment->parent_id = $request->parent_id;
        $post=Posts::whereId($request->post_id)->first()->id;
        $comment->posts_id = $post;
        $comment->save();
        toastr()->success('پیام شما با موفقیت ثبت شد');
        return back();
    }  

    public function AddEpisodeComment(Request $request)
    {

        $comment=new Comments();
        $comment->members_id=$request->id;
        $comment->text=$request->text;
        $post=Posts::find($request->post)->first();
      
        $post->comments->save($comment);
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
