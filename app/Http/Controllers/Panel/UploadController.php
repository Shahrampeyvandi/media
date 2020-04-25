<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ConvertVideoForDownloading;
use App\Jobs\ConvertVideoForStreaming;
use App\Models\Contents\Posts;
use App\Models\Contents\Episodes;
use App\Models\Contents\Comments;
use App\Models\Contents\CommentsLikes;
use App\Models\Members\Members;

class UploadController extends Controller
{
    public function uploadvideo(Request $request){

        if ($request->type !== "6") {
            $validator = Validator::make($request->all(), [
                'file' => 'mimes:avi,x-m4v,mp4,mov,ogg,qt,mp3,mpga,mkv,3gp|required', new VideoDimension($request->type),
                'pic' => 'nullable|mimes:jpeg,png,jpg',
              
            ]);
            if ($validator->fails()) {
                toastr()->error('فایل دارای فرمت نامعتبر می باشد');
            return back();
            }
            
          }
              
            if(!is_null($request->subtitle) && $request->file('subtitle')->getClientOriginalExtension() !== "vtt"){
                toastr()->error('فایل زیرنویس دارای فرمت نامعتبر می باشد');
            return back();
            }
            
          try {
             
                // Upload path
            $destinationPath = "files/posts/$request->title";
            if($request->file !== null) {
              if (!file_exists($destinationPath)) {
                  mkdir($destinationPath, 0755, true);
              }
              $extension = $request->file('file')->getClientOriginalExtension();
              // Valid extensions
      
              $fileNamevideo = 'file_' . time() . '.' . $extension;
              $request->file('file')->move($destinationPath, $fileNamevideo);
              $filePath = "files/posts/$request->title/$fileNamevideo";
           }else{
               $filePath=null;
           }
              if ($request->hasFile('pic')) {
                  
                  $picextension = $request->file('pic')->getClientOriginalExtension();
                  $fileName = 'pic_' . time() . '.' . $picextension;
                  $request->file('pic')->move($destinationPath, $fileName);
                  $picPath = "files/posts/$request->title/$fileName";
              }else{
                  $picPath='';
              }
              if ($request->hasFile('subtitle')) {
                  
                  $picextension = $request->file('subtitle')->getClientOriginalExtension();
                  $fileName = 'subtitle_' . time() . '.' . $picextension;
                  $request->file('subtitle')->move($destinationPath, $fileName);
                  $subTitle = "files/posts/$request->title/$fileName";
              }else{
                  $subTitle='';
              }
              if($request->type == 4 || $request->type==5){
      
                  $media='audio';
              }else{
                  $media='video';
      
              }
              $getID3 = new \getID3;
              $file = $getID3->analyze($filePath);
              $duration = date('H:i:s', $file['playtime_seconds']);
             
      
              $post = new Posts();
              $post->title = $request->title;
              $post->desc = $request->desc;
              $post->picture = $picPath;
              $post->content_name = $fileNamevideo;
              $post->content_link = $filePath;
              $post->categories_id = $request->type;
              $post->languages_id = $request->lang;
              $post->subjects_id = $request->subject;
              $post->levels_id = $request->level;
              $post->media = $media;
              $post->duration = $duration;
      
              if($request->price !== "0" || $request->price !== null){
                  $post->type = 'money';
                  $post->price = $request->price;
              }else{
              $post->type = $request->price_type;
              $post->price =0;
              }
              $post->members_id = auth()->user()->id;
              $post->subtitle = $subTitle;
              $post->otheroninformation = $request->desc2;
              $post->views = 0;
              if(auth()->user()->ability == 'admin' || auth()->user()->ability == 'mid-level-admin'){
                  $post->confirmed = 1;
              }
            
              
              $post->save();
      
           
              // notification for user
            
             if (!auth()->user()->is_admin() && !auth()->user()->is_mid_admin()) {
              $notification=new Notifications;
              $notification->members_id=auth()->user()->id;
              $notification->title='پست شما در انتظار تایید میباشد';
              $notification->text='عنوان: '.$post->title.'<br/>دسته بندی: '.$post->categories->name.'';
              $notification->posts_id=$post->id;
              $notification->save();
             }




             $this->dispatch(new ConvertVideoForDownloading($post));
             $this->dispatch(new ConvertVideoForStreaming($post));


      
      
             if($request->type !== "6"){
              toastr()->success('فایل با موفقیت آپلود شد');
              return back();
             }
              if($request->type == "6"){
                  toastr()->success('دوره آموزشی با موفقیت آپلود شد');
                  return back();
             }
          } catch (\Throwable $th) {
              
            toastr()->error('آپلود ناموفق');
            return back();
          }
    }

}