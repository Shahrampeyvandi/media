<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Contents\Posts;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Members\ChannelInformations;

class MembersController extends Controller
{
    public function Index($content='')
    {

      if($content == '' ){
          $members=Members::where('group','student')->get();
     }
     if($content == 'teacher'){
        $members=Members::where('group','teacher')->get();
     }
     if($content == 'deactive'){
        $members=Members::where('active',0)->get();
    }
    
        return view('Panel.Members',compact('members'));
    }

    public function AddAboutUs()
    {
        return view('Panel.aboutus');
    }

    public function SaveAboutUs(Request $request)
    {
       
        if(is_null($request->content)){
            toastr()->error('لطفا متن وارد کنید');
            return back();
        }
        $channel = ChannelInformations::where('member_id',auth()->user()->id)->first();
        if($channel){
        
       ChannelInformations::where('id',auth()->user()->id)->update([
        'aboutus' => $request->content
       ]);
        }else{
            ChannelInformations::create([
                'member_id' => auth()->user()->id,
                'content' => $request->content,
               ]);
        }
       toastr()->success('با موفقیت ذخیره شد');
       return back();
    }

   
    public function chageability(Request $request)
    {
       
        $member=Members::where('id',$request->id)->first();
        if($request->type==1){
            $member->ability='mid-level-admin';
        }else{
            $member->ability='member';
        }
        $member->update();
        
       toastr()->success('با موفقیت ذخیره شد');
       //return back();
    }

    public function officialchannel(Request $request)
    {
       
        $member=Members::where('id',$request->id)->first();
        if($request->type==1){
            $member->approved=1;
        }else{
            $member->approved=0;
        }
        $member->update();
        
       toastr()->success('با موفقیت ذخیره شد');
       //return back();
    }

    public function ofchannelrequest(Request $request){

        $requestedchannels=ChannelInformations::where('accepted',1)->get();




        return view('Panel.RequestedChannels',compact('requestedchannels'));
    }

    public function SubmitRequestChannel(Request $request){

        $channelinfo=ChannelInformations::find($request->id);
       
        $member=$channelinfo->member;

        if($request->type==2){

            $member->approved=1;


            $channelinfo->accepted=2;

            $member->update();
            $channelinfo->update();

        }else{

            $member->approved=0;


            $channelinfo->accepted=3;

            $member->update();
            $channelinfo->update();



        }


        toastr()->success('با موفقیت انجام شد!');
        //return back();
    }

    public function AboutUsSocialLink(Request $request)
    {
       $channel = ChannelInformations::where('member_id',auth()->user()->id)->first();
       if($channel){
        foreach ($request->social as $key => $item) {
                $channel->$item = $request->link[$key];
            }
            $channel->update();
        }else{
            $new = new ChannelInformations();
            foreach ($request->social as $key => $item) {
                $new->$item = $request->link[$key];
            }
            $new->save();
        }
        toastr()->success('با موفقیت انجام شد!');
        return back();
    }

    public function Delete(Request $request)
    {


         $posts = Posts::where('members_id',$request->id)->get();
          // set up basic connection
        $conn = ftp_connect(env('FTP_HOST'));
        // login with username and password
        $login_result = ftp_login($conn, env('FTP_USERNAME'), env('FTP_PASSWORD'));
       
     foreach ($posts as $key => $post) {
            // try to delete $file
        if (ftp_delete($conn, "files/posts/$post->content_name")) {
            if ($post->categories_id !== 6) {
                $post->delete();
            } else {
                foreach ($post->epizodes as $key => $episode) {
                    ftp_delete($conn, "files/posts/episodes/$episode->content_name");
                }
                $post->delete();
            }
        } else {
            toastr()->error('خطا در ارتباط با سرور');
            return back();
        }
     }
        // close the connection
        ftp_close($conn);
        $user = Members::find($request->id);

        $user->delete();
       

        toastr()->success('تمام اطلاعات کاربر با موفقیت حذف شد');
        return back();
    }
}
