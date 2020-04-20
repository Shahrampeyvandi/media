<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use App\Models\Notifications\Notifications;
use App\Models\Contents\Posts;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    
    public function UploadFile()
    {
        return view('Panel.UploadFile');

    }

    public function SubmitUploadFile(Request $request)
    {
       dd($request->all());
        
        if($request->hasFile('file')) {

            // Upload path
            $destinationPath = 'files/';
     
            // Create directory if not exists
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }
     
            // Get file extension
            $extension = $request->file('file')->getClientOriginalExtension();
     
            // Valid extensions
            $validextensions = array("jpeg","jpg","png","pdf");
     
            // Check extension
          
     
              // Rename file 
              $fileName =time() .'.' . $extension;
     
              // Uploading file to given path
              $request->file('file')->move($destinationPath, $fileName); 
     
            
     
          }
    }

      public function MyVideos($content='')
    {
        
        $member = auth()->user();
      
        if($content == '' ){
           
            //get all related videos orderby created at 
         $posts =  Posts::where('members_id',$member->id)->whereHas('categories',function($q){
            $q->where('latin_name','videos');
         })->latest()->paginate(8);
     
        }
        if($content == 'clips'){
            //get all related videos orderby created at 
         $posts =  Posts::where('members_id',$member->id)->whereHas('categories',function($q){
            $q->where('latin_name','clips');
         })->latest()->get();
        }
        if($content == 'animations'){
            //get all related clips orderby created at 
         $posts =  Posts::where('members_id',$member->id)->whereHas('categories',function($q){
            $q->where('latin_name','animations');
         })->latest()->get();
        }
       

        return view('Panel.MyVideos',compact('posts'));
    }

    public function MyAudios($content='')
    {   
        $member = auth()->user();
        if($content==''){
            //get all related musics orderby created at 
         $posts =  Posts::where('members_id',$member->id)->whereHas('categories',function($q){
            $q->where('latin_name','musics');
         })->latest()->get();
       
        }
        if($content == 'podcasts'){
            //get all related podcasts orderby created at 
         $posts =  Posts::where('members_id',$member->id)->whereHas('categories',function($q){
            $q->where('latin_name','podcasts');
         })->latest()->get();
        }
        return view('Panel.MyAudios',compact('posts'));

    }

    public function UnsubscribeFiles()
    {
        $member = auth()->user();

        $posts=Posts::where('members_id',$member->id)->where('confirmed',2)->get();


        return view('Panel.UnsubscribeFiles',compact('posts'));
    }
   
    public function Index($content='')
    {

      if($content == '' ){
         $posts=Posts::where('categories_id',1)->where('confirmed',1)->get();
     }
     if($content == 'animations'){
      $posts=Posts::where('categories_id',2)->where('confirmed',1)->get();

     }
     if($content == 'clips'){
      $posts=Posts::where('categories_id',3)->where('confirmed',1)->get();
     }
     if($content=='musics'){
      $posts=Posts::where('categories_id',4)->where('confirmed',1)->get();

     }
     if($content == 'podcasts'){
      $posts=Posts::where('categories_id',5)->where('confirmed',1)->get();

     }
     if($content == 'learnings'){
      $posts=Posts::where('categories_id',6)->where('confirmed',1)->get();

     }

        return view('Panel.Posts',compact('posts'));
    }

    public function unconfirmed()
    {

      $posts=Posts::where('confirmed',0)->get();
      return view('Panel.PostsDraft',compact('posts'));
    }


    
    public function rejected()
    {

      $posts=Posts::where('confirmed',2)->get();


        return view('Panel.PostsDraft',compact('posts'));
    }

    public function confirm($id)
    {


        Posts::where('id',$id)->update([
            'confirmed'=>1,
            'title' =>request()->title,
            'desc' =>request()->desc,
            'categories_id' =>request()->type,
            'languages_id' =>request()->lang,
            'subjects_id' =>request()->subject,
            'levels_id' =>request()->level,
            'type' =>request()->price_type,
            'price' =>request()->price,
            'otheroninformation' =>request()->desc2
            
            ]);
        // send notifications to user where post
        toastr()->success('محتوا با موفقیت ثبت شد');
        return back();
    }

    public function reject(Request $request)
    {
      

        $validator = Validator::make($request->all(), [
               
            'post_id' => 'required',
            'reason' => 'required'
        
        ]);

    
        
    if ($validator->fails()) {
        return back();
    }

    $post=Posts::whereId($request->post_id)->first();
       


        $notification=new Notifications;

        $notification->members_id=$request->member_id;
        $notification->title='پست شما تایید نشد!';
        $notification->text='پست اخیر شما با نام '.$post->title.' به دلیل '.$post->rejectreason.' توسط مدیر رد تایید گردید.';
        $notification->posts_id=$post->id;

        $notification->save();

        $post->update([
            'confirmed'=>2,
            'rejectreason'=>$request->reason
        ]);
        toastr()->success('محتوا حذف و پیام شما برای کاربر ارسال شد');
        return back();
    }

    public function ReadNoty(Request $request)
    {

        $notification=Notifications::where($request->id)->first();
        $notification->read=1;
        $notification->update();
        
    }

    public function Delete(Request $request)
    {
        
        Posts::where('id',$request->post_id)->delete();
        toastr()->success('پست با موفقیت حذف شد');
        return back();

    }

    public function UploadImage()
    {
        if(request()->hasFile('upload')) {

            // Upload path
            $destinationPath = 'files/images/';
     
            // Create directory if not exists
            if (!file_exists($destinationPath)) {
               mkdir($destinationPath, 0755, true);
            }
     
            // Get file extension
            $extension = request()->file('upload')->getClientOriginalExtension();
     
            // Valid extensions
            $validextensions = array("jpeg","jpg","png");
     
            // Check extension
          
     
              // Rename file 
              $fileName =time() .'.' . $extension;
     
              // Uploading file to given path
              request()->file('upload')->move($destinationPath, $fileName); 
                $url = $destinationPath . $fileName;
            
            return "<script>window.parent.CKEDITOR.tools.callFunction(1,'{$url}','')</script>";
          }


    }

    public function UploadEpizode(Request $request)
    {
        dd($request->all());
    }

    public function CheckPost()
    {
        $member = Members::whereId(request()->member)->first();
        $post= Posts::whereId(request()->id)->first();
    
       return view('Panel.CheckPost',compact(['member','post']));
    }
   
}
