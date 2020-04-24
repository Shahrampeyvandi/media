<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Contents\Posts;
use App\Models\Contents\Episodes;
use App\Models\Contents\Comments;
use App\Models\Contents\CommentsLikes;
use App\Models\Members\Members;
use App\Models\Members\Messages;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\Notifications\Notifications;
use App\Rules\VideoDimension;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $messages = [];
        $member = auth()->user();
        if ($member->group == 'admin') {
            $countfilms = Posts::where('categories_id', 1)->count();
            $countanimations = Posts::where('categories_id', 2)->count();
            $countclips = Posts::where('categories_id', 3)->count();
            $countmusics = Posts::where('categories_id', 4)->count();
            $countpodcasts = Posts::where('categories_id', 5)->count();
            $countlearnings = Posts::where('categories_id', 6)->count();
            $countcomments = Comments::all()->count();
        } else {
            $countfilms = Posts::where('members_id', $member->id)->where('categories_id', 1)->count();
            $countanimations = Posts::where('members_id', $member->id)->where('categories_id', 2)->count();
            $countclips = Posts::where('members_id', $member->id)->where('categories_id', 3)->count();
            $countmusics = Posts::where('members_id', $member->id)->where('categories_id', 4)->count();
            $countpodcasts = Posts::where('members_id', $member->id)->where('categories_id', 5)->count();
            $countlearnings = Posts::where('members_id', $member->id)->where('categories_id', 6)->count();
            $countcomments = Comments::where('members_id', $member->id)->count();
        }


        $comments=Comments::all();
        $from= date("Y-m-01 00:00:00");
        $to=date("Y-m-29 23:59:59");
        $likebefore=0;   
        $disikebefore=0;

        $mostlikeid=1;
        $mostdislikeid=1;
        foreach($comments as $comment){

            $like=CommentsLikes::wherebetween('created_at',[$from,$to])->where('comments_id',$comment->id)->where('score','like')->count();
            $dislike=CommentsLikes::wherebetween('created_at',[$from,$to])->where('comments_id',$comment->id)->where('score','dislike')->count();

            if($like > $likebefore){
                $mostlikeid=$comment->id;
            }

            if($dislike > $disikebefore){
                $mostdislikeid=$comment->id;
            }

        }

        $mostlikedcomment=Comments::whereId($mostlikeid)->first();
        $mostdislikedcomment=Comments::whereId($mostdislikeid)->first();

    

        return view('Panel.Dashboard', compact(['countfilms', 'countanimations', 'countclips', 'countmusics', 'countpodcasts', 'countlearnings', 'messages','countcomments','mostlikedcomment','mostdislikedcomment']));
    }

    public function UploadFile()
    {
        $member=auth()->user();
        return view('Panel.UploadFile',compact('member'));
    }

    public function SubmitUploadFile(Request $request)
    {
        
        
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
  
          $fileName = 'file_' . time() . '.' . $extension;
          $request->file('file')->move($destinationPath, $fileName);
          $filePath = "files/posts/$request->title/$fileName";
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
  
          if($request->episoodes){
  
              foreach($request->episoodes as $key=>$episode){
  
                  if ($episode->file !== null) {
                      if (!file_exists($destinationPath)) {
                          mkdir($destinationPath, 0755, true);
                      }
                      $extension = $episode->file('file')->getClientOriginalExtension();
                      // Valid extensions
              
                      $fileName = 'file_' . time() . '.' . $extension;
                      $episode->file('file')->move($destinationPath, $fileName);
                      $filePathepisode = "$filePath/$fileName";
                   }else{
                       $filePath=null;
                   }
                      if ($episode->hasFile('pic')) {
                          
                          $picextension = $episode->file('pic')->getClientOriginalExtension();
                          $fileName = 'pic_' . time() . '.' . $picextension;
                          $request->file('pic')->move($destinationPath, $fileName);
                          $picPath = "$filePath/$fileName";
                      }else{
                          $picPath='';
                      }
                      if ($$filePath->hasFile('subtitle')) {
                          
                          $picextension = $episode->file('subtitle')->getClientOriginalExtension();
                          $fileName = 'subtitle_' . time() . '.' . $picextension;
                          $episode->file('subtitle')->move($destinationPath, $fileName);
                          $subTitle = "$filePath/$fileName";
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
              
                      $newepisode=new Episodes();
                      $newepisode->posts_id=$post->id;
                      $newepisode->title=$episode->title;
                      $newepisode->desc=$episode->desc;
                      $newepisode->picture=$picPath;
                      $newepisode->content_link=$filePathepisode;
                      $newepisode->duration=$duration;
                      $newepisode->type='free';
                      $newepisode->price=0;
                      $newepisode->members_id=auth()->user()->id;
  
                     
                      if(auth()->user()->ability == 'admin' || auth()->user()->ability == 'mid-level-admin'){
                          $newepisode->confirmed = 1;
                      }
                    
                      
                      $newepisode->save();
  
  
  
  
              }
  
          }
  
          // notification for user
        
         if (!auth()->user()->is_admin() && !auth()->user()->is_mid_admin()) {
          $notification=new Notifications;
          $notification->members_id=auth()->user()->id;
          $notification->title='پست شما در انتظار تایید میباشد';
          $notification->text='عنوان: '.$post->title.'<br/>دسته بندی: '.$post->categories->name.'';
          $notification->posts_id=$post->id;
          $notification->save();
         }
  
  
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

    public function Profile()
    {

        $member = auth()->user();


        return view('Panel.Profile',compact('member'));
    }

    public function ProfileSave(Request $request)
    {
        
        $validatedData = $request->validate(
            [
                'user_email' => 'required', \Illuminate\Validation\Rule::unique('members')->ignore($request->id),

                'user_name' => 'required', \Illuminate\Validation\Rule::unique('members')->ignore($request->id),

            ],
            [
                'user_email.unique' => 'کاربری با این ایمیل از قبل وجود دارد',
                'user_name.unique'    => 'کاربری با این نام کاربری از قبل وجود دارد',

            ]
        );

   
      

        // if($request->user_pass){

        //     $validator = Validator::make($request->all(), [
            
        //         'user_pass' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        //         'confirm_user_pass' => 'min:6'
              
        //     ]);

        // }
            
        // if ($validator->fails()) {
        //     return back();
        // }
   
        //dd($request);
        $member = auth()->user();


        if ($request->hasFile('user_profile')) {

        $destinationPath = "files/members".$member->id;
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        $extension = $request->file('user_profile')->getClientOriginalExtension();
        // Valid extensions

        $fileName = 'avatar_' . time() . '.' . $extension;
        $request->file('user_profile')->move($destinationPath, $fileName);
        $filePath = "$destinationPath/$fileName";
            
        $member->avatar=$filePath;
        }

        $member->firstname=$request->user_name;
        $member->lastname=$request->user_family;

        if($request->user_pass){
            $member->password= Hash::make($request->user_pass);
        }
        $member->email=$request->user_email;
        $member->username=$request->username;
        $member->age=$request->age;
        $member->years=$request->years;
        $member->history=$request->history;
        $member->books=$request->books;
        $member->update();
        toastr()->success('ویرایش اطلاعات با موفقیت انجام شد');
        return back();
    }


    public function sendmessage(Request $request){

        $message=new Messages;
        $message->members_id=auth()->user()->id;
        $message->message=$request->message;
        $message->save();

        toastr()->success('نظر شما برای مدیریت ارسال گردید');
        return back();
    }

    public function messages(){

        $messages=Messages::all();

        return view('Panel.AllMessages',compact('messages'));

    }

    public function mymessages(){

        $messages=Messages::where('members_id',auth()->user()->id)->get();


        return view('Panel.MyMessages',compact('messages'));
    }


    public function responsemessage(Request $request){

        $message=Messages::whereId($request->id)->first();
        $message->response=$request->response;
        $message->update();

        toastr()->success('پاسخ با موفقیت برای کاربر ارسال شد');
        return back();
    }
}
