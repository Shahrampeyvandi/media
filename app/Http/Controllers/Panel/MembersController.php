<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
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
       Members::where('id',auth()->user()->id)->update([
        'aboutus' => $request->content
       ]);
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

        $member=Members::find($request->id);

        if($request->type==2){

            $member->approved=1;

            $info=$member->channelInformations;

            $info->accepted=2;

            $member->update();
            $info->update();

        }else{

            $member->approved=0;

            $info=$member->channelInformations;

            $info->accepted=3;

            $member->update();
            $info->update();



        }


        toastr()->success('با موفقیت انجام شد!');
        //return back();
    }
}
