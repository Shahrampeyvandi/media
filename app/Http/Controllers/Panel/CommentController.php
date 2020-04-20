<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contents\Comments;

class CommentController extends Controller
{
    public function myComments()
    {

        $member = auth()->user();

        

        return view('Panel.MyComments',compact('member'));
    }

    public function Index($content='')
    {

        if($content == '' ){
            $comments=Comments::where('confirmed',1)->get();
       }
       if($content == 'unconfirmed'){
        $comments=Comments::where('confirmed',0)->get();
    }
       if($content == 'rejected'){
        $comments=Comments::where('confirmed',2)->get();
    }

        

        return view('Panel.Comments',compact('comments'));
    }

    public function unconfirm(Request $request)
    {
       
        Comments::where('id',$request->comment_id)->orWhere('parent_id',$request->comment_id)->delete();
        return back();
    }
    public function confirm($id)
    {
     
        Comments::where('id',$id)->update(['confirmed'=>1]);
        return back();
    }
}
