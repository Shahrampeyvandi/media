<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Contents\Posts;
use App\Models\Contents\Episodes;
use App\Models\Contents\Comments;
use App\Models\Contents\CommentsLikes;
use App\Models\Members\Members;
use App\Models\Members\ChannelInformations;
use App\Models\Members\Messages;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Models\Accounting\Purchase;
use App\Models\Contents\Categories;
use App\Models\Contents\Visit;
use App\Models\Members\Follows;
use App\Models\Notifications\Notifications;
use App\Rules\VideoDimension;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Facades\Storage;

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
        $cats_json = json_encode(['فیلم و سریال', 'ژن پلاس', 'انیمیشن', 'موسیقی', 'پادکست']);
        $followers = Follows::where('followed_id', $member->id)->count();
        if ($member->group == 'admin') {
            $countfilms = Posts::where('categories_id', 1)->count();
            $countanimations = Posts::where('categories_id', 2)->count();
            $countclips = Posts::where('categories_id', 3)->count();
            $countmusics = Posts::where('categories_id', 4)->count();
            $countpodcasts = Posts::where('categories_id', 5)->count();
            $countlearnings = Posts::where('categories_id', 6)->count();
            $countcomments = Comments::all()->count();
            $day_array = [];
            $day_visits = [];
            for ($i = 0; $i < 7; $i++) {
                array_push($day_array, Jalalian::now()->subDays($i)->format('%A'));
                array_push($day_visits, Visit::where('day', Jalalian::now()->subDays($i)->format('%A'))->count());
            }
            $day_json = json_encode(array_reverse($day_array));
            $visits_json = json_encode(array_reverse($day_visits));
            $counts_json = json_encode([$countfilms, $countclips, $countanimations, $countmusics, $countpodcasts]);
            $label = 'آمار محتوای سایت';
        } else {
            $countfilms = Posts::where('members_id', $member->id)->where('categories_id', 1)->count();
            $countanimations = Posts::where('members_id', $member->id)->where('categories_id', 2)->count();
            $countclips = Posts::where('members_id', $member->id)->where('categories_id', 3)->count();
            $countmusics = Posts::where('members_id', $member->id)->where('categories_id', 4)->count();
            $countpodcasts = Posts::where('members_id', $member->id)->where('categories_id', 5)->count();
            if ($member->group == "teacher") {

                $countlearnings = Posts::where('members_id', $member->id)->where('categories_id', 6)->count();
            }
            if ($member->group == "student") {

                $countlearnings = Purchase::where('members_id', $member->id)->count();
            }

            $countcomments = Comments::where('members_id', $member->id)->count();
            $day_json = json_encode([]);
            $visits_json = json_encode([]);
            $counts_json = json_encode([$countfilms, $countclips, $countanimations, $countmusics, $countpodcasts, $countlearnings]);
            $label = 'آمار محتوای من';
        }
        $comments = Comments::all();
        $from = date("Y-m-01 00:00:00");
        $to = date("Y-m-29 23:59:59");
        $likebefore = 0;
        $disikebefore = 0;
        $mostlikeid = 1;
        $mostdislikeid = 1;
        foreach ($comments as $comment) {

            $like = CommentsLikes::wherebetween('created_at', [$from, $to])->where('comments_id', $comment->id)->where('score', 'like')->count();
            $dislike = CommentsLikes::wherebetween('created_at', [$from, $to])->where('comments_id', $comment->id)->where('score', 'dislike')->count();

            if ($like > $likebefore) {
                $mostlikeid = $comment->id;
            }

            if ($dislike > $disikebefore) {
                $mostdislikeid = $comment->id;
            }
        }

        $mostlikedcomment = Comments::whereId($mostlikeid)->first();
        $mostdislikedcomment = Comments::whereId($mostdislikeid)->first();



        return view('Panel.Dashboard', compact([
            'countfilms',
            'countanimations',
            'countclips',
            'countmusics',
            'countpodcasts',
            'countlearnings',
            'messages',
            'countcomments',
            'mostlikedcomment',
            'mostdislikedcomment',
            'day_json',
            'visits_json',
            'cats_json',
            'counts_json',
            'label',
            'followers'
        ]));
    }
    public function UploadFile()
    {
        $member = auth()->user();
        return view('Panel.UploadFile', compact('member'));
    }
    public function SubmitUploadFile(Request $request)
    {
        
        $fileNamevideo = '1';

        $validator = Validator::make($request->all(), [
            'file' => 'mimes:avi,x-m4v,mp4,mov,ogg,qt,mp3,mpga,mkv,3gp|required', new VideoDimension($request->type),
            'pic' => 'nullable|mimes:jpeg,png,jpg',
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'errors'=> "فایل دارای فرمت غیرمجاز می باشد"
                     ,'code'=>403
            ],
                
            );
        }
        if (!is_null($request->subtitle) && $request->file('subtitle')->getClientOriginalExtension() !== "vtt") {
            return response()->json(
                ['errors'=> "فایل زیرنویس دارای فرمت غیرمجاز می باشد"
                ,'code'=>403
            ],
                
            );
        }
        // Upload path
        $destinationPath = "files/posts/$request->title";
        if ($request->file !== null) {
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('file')->getClientOriginalExtension();
            // Valid extensions
            $fileNamevideo = 'file_' . time() . '.' . $extension;
            //$request->file('file')->move($destinationPath, $fileNamevideo);
            $filePath22 = "files/posts/$fileNamevideo";

            // Storage::disk('ftp')->put($filePath22, fopen($request->file('file'), 'r+'));
            $conn = ftp_connect(env('FTP_HOST'));
            $login = ftp_login($conn, env('FTP_USERNAME'), env('FTP_PASSWORD'));
            ftp_set_option($conn, FTP_USEPASVADDRESS, false);
            ftp_pasv($conn, true);
            ftp_put($conn, $filePath22, $_FILES['file']['tmp_name'], FTP_BINARY);
            ftp_close($conn);
            $filePath = "files/posts/$request->title/$fileNamevideo";
        } else {
            $filePath = null;
        }
        if ($request->hasFile('pic')) {

            $picextension = $request->file('pic')->getClientOriginalExtension();
            $fileName = 'pic_' . time() . '.' . $picextension;
            $request->file('pic')->move($destinationPath, $fileName);
            $picPath = "files/posts/$request->title/$fileName";
        } else {
            $picPath = '';
        }
        if ($request->hasFile('subtitle')) {

            $picextension = $request->file('subtitle')->getClientOriginalExtension();
            $fileName = 'subtitle_' . time() . '.' . $picextension;
            $request->file('subtitle')->move($destinationPath, $fileName);
            $subTitle = "files/posts/$request->title/$fileName";
        } else {
            $subTitle = '';
        }
        if ($request->type == 4 || $request->type == 5) {

            $media = 'audio';
        } else {
            $media = 'video';
        }
        $getID3 = new \getID3;
        $filedur = $getID3->analyze($request->file('file'));


        //$duration = $filedur['playtime_seconds'];


        $duration = gmdate('H:i:s', $filedur['playtime_seconds']);

        $post = new Posts();
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->picture = $picPath;
        $post->content_name = $fileNamevideo;
        $post->content_link = "Https://dl.genebartar.ir/$filePath22";
        $post->categories_id = $request->type;
        $post->languages_id = $request->lang;
        $post->subjects_id = $request->subject;
        $post->levels_id = $request->level;
        $post->media = $media;
        $post->duration = $duration;
        if ($request->price !== "0" && $request->price !== null) {
            $post->type = 'money';
            $post->price = $request->price;
        } else {
            $post->type = 'free';
            $post->price = 0;
        }
        $post->members_id = auth()->user()->id;
        $post->subtitle = $subTitle;
        $post->otheroninformation = $request->desc2;
        $post->views = 0;
        if (auth()->user()->ability == 'admin' || auth()->user()->ability == 'mid-level-admin') {
            $post->confirmed = 1;
        }
        $post->save();


        //$this->dispatch(new ConvertVideoForDownloading($post));
        //$this->dispatch(new ConvertVideoForStreaming($video));

        // notification for user

        if (!auth()->user()->is_admin() && !auth()->user()->is_mid_admin()) {
            $notification = new Notifications;
            $notification->members_id = auth()->user()->id;
            $notification->title = 'پست شما در انتظار تایید میباشد';
            $notification->text = 'عنوان: ' . $post->title . '<br/>دسته بندی: ' . $post->categories->name . '';
            $notification->posts_id = $post->id;
            $notification->save();
        }


        if ($request->type !== "6") {
           return response()->json(
               ['success'=>"موفق",200]
           );
        }
        if ($request->type == "6") {
            return response()->json(
                ['success'=>"موفق"
                ,'id' => $post->id
                ,200]
            );
           
        }
        // } catch (\Throwable $th) {

        //     toastr()->error('آپلود ناموفق');
        //     return back();
        // }

    }

    public function UploadEpisode()
    {
        $id = request()->id;
        $number = Episodes::where('members_id', auth()->user()->id)->max('number');

        return view('Panel.UploadEpisode', compact(['id', 'number']));
    }
    public function Profile()
    {
        $member = auth()->user();
        return view('Panel.Profile', compact('member'));
    }

    public function RequestChannel()
    {
        $member = auth()->user();

 
    

        return view('Panel.RequestChannel', compact('member'));
    }
    public function VerifyMobile(Request $request)
    {
        //session()->put('mobile',$request->mobile);
       
       $mobile=auth()->user()->mobile;

     
       $activationCode_OBJ = ActivationCode::where('v_code', $request->code)->first();
       if ($activationCode_OBJ) {
           

       } else {

           $request->session()->flash('Error', 'کد وارد شده صحیح نمی باشد');
           return back();
               }


        return view('Panel.VerifyMobile',compact('mobile'));
    }


    public function sendsms(Request $request){

        $member = auth()->user();

        $code = ActivationCode::createCode($member->mobile);
        if ($code == false) {
            return 'کد فعال سازی قبلا برای شما ارسال شده است. لطفا بعدا مجددا امتحان فرمایید';
        }


        $api='644B6B646441646E3851346F34336D52632F6A59497872383733587259303249515A352B3855586D5564553D';

        $curl = curl_init();
        curl_setopt_array($curl,
        array(
        CURLOPT_URL => "https://api.kavenegar.com/v1/$api/verify/lookup.json",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "receptor=$member->mobile&template=verify&token=$code->v_code",
        CURLOPT_HTTPHEADER => array(
        "apikey: a6dd62cdc40d3990a48b9f04397506600b5bca37248176981a37fb97bec262b0",
        "cache-control: no-cache",
        "content-type: application/x-www-form-urlencoded",
        )));

        $response = curl_exec($curl);
        //dd($response);

        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        //echo $response;
        }



    
        return 'کد با موفقیت ارسال شد';
    }


    public function SubmitRequestChannel(Request $request)
    {
       //dd($request->all());
        $member = auth()->user();
        

        /**
         * 
         * get activation code
         * if true then 
         * 
         *  */  

    






        if ($request->hasFile('national_card_pic')) {
            $destinationPath = "files/members" . $member->id;
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('national_card_pic')->getClientOriginalExtension();
            // Valid extensions
            $fileName = 'national_card_pic' . time() . '.' . $extension;
            $request->file('national_card_pic')->move($destinationPath, $fileName);
            $filePathkart = "$destinationPath/$fileName";
        }
        if ($request->hasFile('education_certificate_pic')) {
            $destinationPath = "files/members" . $member->id;
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('education_certificate_pic')->getClientOriginalExtension();
            // Valid extensions
            $fileName = 'education_certificate_pic' . time() . '.' . $extension;
            $request->file('education_certificate_pic')->move($destinationPath, $fileName);
            $filePathmadrak = "$destinationPath/$fileName";
        }
        $filePathparvane = '';
        if ($request->hasFile('permission_work_pic')) {
            $destinationPath = "files/members" . $member->id;
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('permission_work_pic')->getClientOriginalExtension();
            // Valid extensions
            $fileName = 'permission_work_pic' . time() . '.' . $extension;
            $request->file('permission_work_pic')->move($destinationPath, $fileName);
            $filePathparvane = "$destinationPath/$fileName";
        }



        /**
         * 
         * save data
         * 
         */

        $info = $member->memberChannelInformations;


        // dd($info);
        if (is_null($info)) {

            $info = new ChannelInformations;

            $info->members_id = $member->id;
            $info->kart_melli = $filePathkart;
            $info->madrak = $filePathmadrak;
            $info->parvane_faaliat = $filePathparvane;
            $info->accepted = 1;
            $info->save();
        } else {

            $info = ChannelInformations::find($member->id);

            $info->kart_melli = $filePathkart;
            $info->madrak = $filePathmadrak;
            $info->filePathparvane = $filePathparvane;
            $info->accepted = 1;
            $info->update();
        }
        if($info){
            // ارسال نوتیفیکیشن برای گروه ادمین
       foreach (Members::where('group','admin')->get() as $key => $admin) {
        $notification = new Notifications;
        $notification->members_id = $admin->id;
        $notification->title = 'درخواست کانال رسمی';
        $notification->text = 'کاربر با نام کاربری <a href="'.route('User.Show',$member->username).'" class="text-primary">'.$member->username.'</a> تقاضای ثبت کانال رسمی دارد';
        $notification->posts_id = 0;
        $notification->save();
       }
        }


        toastr()->success('مدارک با موفقیت آپلود شد و در انتظار تایید قرار گرفت');
        return redirect()->route('Panel.Dashboard');
    }
    public function ProfileSave(Request $request)
    {
        $validatedData = $request->validate(
            [
                'user_profile' => 'max:2048',
                'user_name' => 'required', \Illuminate\Validation\Rule::unique('members')->ignore($request->id),
            ],
            [
                'user_profile.max' => 'عکس پروفایل نمی تواند بیشتر از دو مگابایت باشد',
                'user_name.required'    => 'نام کاربری را وارد نمایید',
                'user_name.unique'    => 'کاربری با این نام کاربری از قبل وجود دارد',
            ]
        );
        $member = auth()->user();
        if ($request->hasFile('user_profile')) {
            $destinationPath = "files/members" . $member->id;
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $extension = $request->file('user_profile')->getClientOriginalExtension();
            // Valid extensions
            $fileName = 'avatar_' . time() . '.' . $extension;
            $request->file('user_profile')->move($destinationPath, $fileName);
            $filePath = "$destinationPath/$fileName";
            $member->avatar = $filePath;
        }
        $member->firstname = $request->user_name;
        $member->lastname = $request->user_family;
        if ($request->user_pass) {
            $member->password = Hash::make($request->user_pass);
        }
        $member->username = $request->username;
        $member->age = $request->age;
        $member->years = $request->years;
        $member->history = $request->history;
        $member->books = $request->books;
        $member->update();
        toastr()->success('ویرایش اطلاعات با موفقیت انجام شد');
        return redirect()->route('Panel.Dashboard');
    }
    public function sendmessage(Request $request)
    {
        $message = new Messages;
        $message->members_id = auth()->user()->id;
        $message->message = $request->message;
        $message->read = 0;
        $message->save();
        toastr()->success('نظر شما برای مدیریت ارسال گردید');
        return back();
    }

    public function messages()
    {
        $messages = Messages::all();
        return view('Panel.AllMessages', compact('messages'));
    }
    public function mymessages()
    {
        $messages = Messages::where('members_id', auth()->user()->id)->get();
        return view('Panel.MyMessages', compact('messages'));
    }

    public function responsemessage(Request $request)
    {
        $message = Messages::whereId($request->id)->first();
        $message->response = $request->response;

        if ($message->update()) {
            $notification = new Notifications;
            $notification->members_id = $message->members_id;
            $notification->title = 'مدیریت سایت';
            $notification->text = $request->response;
            $notification->posts_id = 0;
            $notification->save();
        }
        toastr()->success('پاسخ با موفقیت برای کاربر ارسال شد');
        return back();
    }

    public function DeleteMyMessage($id)
    {
        $message =  Messages::findOrFail($id);
        if ($message->delete()) {
            toastr()->success('پیام شما با موفقیت حذف شد');
            return back();
        }
    }
}
