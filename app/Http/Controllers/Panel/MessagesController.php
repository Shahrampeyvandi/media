<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Members\Members;
use App\Models\Contens\Notes;
use App\Models\Contens\Messages;

class MessagesController extends Controller
{

    public function index(Request $request)
    {

        $messages=Messages::where('read',0)->get();


    
        // یک ویو برای مشاهده ی پیام ها 
        return view('Panel.Members',compact('messages'));
    }
    public function send(Request $request)
    {

        $message=new Messages;
        $message->members_id=auth()->user()->id;
        $message->message=$request->message;

        $message->save();

    
        return back();
    }
}
