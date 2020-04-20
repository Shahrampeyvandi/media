<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Models\Students\Student;
use App\Http\Controllers\Controller;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\Notifications\Notifications;
use Illuminate\Support\Facades\Validator;

class NotificationsController extends Controller
{

    public function Index(){

        $notifications=null;
        if(auth()->user()){
        $member=auth()->user();
        $notifications=Notifications::where('members_id',$member->id)->where('read',0)->get();
        }
        return response()->json(
            $notifications
            , 200);
        }

        public function Delete(Request $request){

          
            $notification=Notifications::find($request->id);

            $notification->read=1;

            $notification->update();
            

            return response()->json(
                $notification
                , 200);
            }

}