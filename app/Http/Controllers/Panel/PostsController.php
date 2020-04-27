<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\Contents\Episodes;
use App\Models\Members\Members;
use App\Models\Notifications\Notifications;
use App\Models\Contents\Posts;
use App\Models\Contents\ViolationReports;
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


    public function MyTutorials()
    {

        $tutorials = Posts::where('categories_id',6)->where('members_id',auth()->user()->id)->get();
        return view('Panel.MyTutorials',compact('tutorials'));
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

    public function confirm()
    {

        if(request()->price !== "0" || request()->price !== null){
            $price_type = 'money';
         
        }else{
        $price_type = 'free';
     
        }
       $update_post = Posts::where('id',request()->id)->update([
            'confirmed'=>1,
            'title' =>request()->title,
            'desc' =>request()->desc,
            'categories_id' =>request()->type,
            'languages_id' =>request()->lang,
            'subjects_id' =>request()->subject,
            'levels_id' =>request()->level,
            'price' =>request()->price,
            'type'=>$price_type,
            'otheroninformation' =>request()->desc2
            
            ]);
         $post = Posts::whereId(request()->id)->first();
        
            if ($update_post){
                Notifications::where('posts_id',request()->id)->update([
                    'title' => 'پیام مدیر سایت',
                    'text' => 'پست شما با عنوان '.$post->title.' تایید و در سایت قرار گرفت',
                    'read'=>0
                    ]);
            }


        // send notifications to user where post
        toastr()->success('محتوا با موفقیت تایید شد');
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
       
        $notification=Notifications::whereId($request->id)->first();
        $notification->read=1;
        $notification->update();
        
    }

    public function Delete(Request $request)
    {
       
      
        Posts::whereId($request->post_id)->delete();
        toastr()->success('پست با موفقیت حذف شد');
        return back();

    }

    public function UploadImage()
    {
        if(request()->hasFile('upload')) {

            $tmpName  	   = $_FILES['upload']['tmp_name'];
          
            $size 		   = $_FILES['upload']['size'];
            $filePath      = "files/images/" . date('d-m-Y-H-i-s');
            $filename = request()->file('upload')->getClientOriginalName();
           
            if (!file_exists($filePath)) {
                mkdir($filePath, 0755, true);
            }
            $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $type 		   = $_GET['type'];
            $funcNum 	   = isset($_GET['CKEditorFuncNum']) ? $_GET['CKEditorFuncNum']: null;
        
            if ($type == 'image') {
                $allowedfileExtensions = array('jpg', 'jpeg', 'gif', 'png');
            } else {
                //file
                $allowedfileExtensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'doc', 'docx');
            }
        
	//contrinue only if file is allowed
	if (in_array($fileExtension, $allowedfileExtensions)) {

	
        if(request()->file('upload')->move(public_path($filePath),$filename)){
			// if (move_uploaded_file($tmpName, $filePath)) {
                $file = "$filePath/$filename";
				// $filePath = str_replace('../', 'http://filemanager.localhost/elfinder/', $filePath);
			    $data = ['uploaded' => 1, 'fileName' => $filename, 'url' => route('BaseUrl') .'/'. $file];

			    if ($type == 'file') {

					return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$filePath','');</script>";
					
				}

			} else {

			    $error = 'There has been an error, please contact support.';

			    if ($type == 'file') {
					$message = $error;

					return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$filePath', '$message');</script>";
					
				}

			    $data = array('uploaded' => 0, 'error' => array('message' => $error));

			}

	

	} else {

		$error = 'The file type uploaded is not allowed.';

		if ($type == 'file') {
			$funcNum = $_GET['CKEditorFuncNum'];
			$message = $error;

			return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$filePath', '$message');</script>";
			
		}

	    
	    $data = array('uploaded' => 0, 'error' => array('message' => $error));

	}

	//return response
	     return json_encode($data);
          }


    }

    public function UploadEpizode(Request $request)
    {
        $post = Posts::whereId($request->post_id)->first();
        if ($request->file !== null) {
            $destinationPath = "files/posts/$request->title/episodes";
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('file')->getClientOriginalExtension();
            // Valid extensions
            $fileName = 'file_' . time() . '.' . $extension;
            $request->file('file')->move($destinationPath, $fileName);
            $filePathepisode = "$destinationPath/$fileName";
        } else {
            $filePathepisode = null;
        }
        if ($request->hasFile('episode_pic')) {

            $picextension = $request->file('episode_pic')->getClientOriginalExtension();
            $fileName = 'pic_' . time() . '.' . $picextension;
            $request->file('pic')->move($destinationPath, $fileName);
            $picPath = "$destinationPath/$fileName";
        } else {
            $picPath = '';
        }
        if ($request->hasFile('episode_subtitle')) {

            $picextension = $request->file('episode_subtitle')->getClientOriginalExtension();
            $fileName = 'subtitle_' . time() . '.' . $picextension;
            $request->file('subtitle')->move($destinationPath, $fileName);
            $subTitle = "$destinationPath/$fileName";
        } else {
            $subTitle = '';
        }
        if ($request->type == 4 || $request->type == 5) {

            $media = 'audio';
        } else {
            $media = 'video';
        }
        $getID3 = new \getID3;
        $file = $getID3->analyze($filePathepisode);
        $duration = date('H:i:s', $file['playtime_seconds']);

        $newepisode = new Episodes();
        $newepisode->posts_id = $request->post_id;
        $newepisode->title = $request->epizode_title;
        $newepisode->number = $request->epizode_number;
        $newepisode->desc = $request->epizode_desc;
        $newepisode->categories_id = $post->categories_id;
        $newepisode->languages_id = $post->languages_id;
        $newepisode->subjects_id = $post->subjects_id;
        $newepisode->levels_id = $post->levels_id;
        $newepisode->picture = $picPath;
        $newepisode->content_link = $filePathepisode;
        $newepisode->duration = $duration;
        $newepisode->type = 'free';
        $newepisode->price = 0;
        $newepisode->members_id = auth()->user()->id;
        if (auth()->user()->ability == 'admin' || auth()->user()->ability == 'mid-level-admin') {
            $newepisode->confirmed = 1;
        }
        $newepisode->save();
        toastr()->success('فایل با موفقیت آپلود شد');
        return back();
    }

    public function CheckPost()
    {
        $member = Members::whereId(request()->member)->first();
        $post= Posts::whereId(request()->id)->first();
    
       return view('Panel.CheckPost',compact(['member','post']));
    }

    public function report(Request $request)
    {
      
        $member = auth()->user()->id;
        $post = Posts::whereId($request->postid)->first();
        if(ViolationReports::where(['posts_id'=>$request->postid,'members_id'=>$member])->count())
        {
            toastr()->warning('شما تنها یک بار میتوانید گزارش تخلف ثبت کنید');
            return back();
        }
        
        $report=new ViolationReports;
        $report->info=$request->info;
        $report->members_id=$member;
        $report->posts_id=$request->postid;
        $report->save();

foreach (Members::where('group','admin')->get() as $key => $admin) {
    $notification = new Notifications;
    $notification->members_id = $admin->id;
    $notification->title = 'گزارش تخلف پست';
    $notification->text = 'یک گزارش تخلف برای پست با نام '.'<a class="text-primary" href="'.route('ShowItem',$post->id).'">'.$post->title.'</a>'.' ثبت شد';
    $notification->save();
}
       


        toastr()->success('گزارش شما با موفقیت ثبت شد');
       return back();
    }

    public function allreport()
    {

        $reports=ViolationReports::all();


     

    return view('Panel.ViolationReports',compact('reports'));

    }
   
}
