<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;
use App\Models\Accounting\Transaction;
use App\Models\Members\Members;
use Illuminate\Support\Facades\File;
use App\Models\Notifications\Notifications;

class PurchaseController extends Controller
{
    public function index()
    {

        $purchases=Purchase::all();


    
        // یک ویو برای مشاهده ی پیام ها 
        return view('Panel.AllPurchases',compact('purchases'));
    }
    
    public function mypurchase()
    {

        //dd(auth()->user());
        $purchases=Purchase::where('members_id',auth()->user()->id)->get();


    
        // یک ویو برای مشاهده ی پیام ها 
        return view('Panel.MyPurchases',compact('purchases'));
    }

    public function transactions(){

        if(auth()->user()->is_admin()){
            $transactions=Transaction::all();
        }else{
            $transactions=Transaction::where('members_id',auth()->user()->id)->get();
        }
    


        return view('Panel.Transactions',compact('transactions'));
    }

    public function checkout(){

        $members=Members::where('group','teacher')->get();



        return view('Panel.Checkouts',compact('members'));
    }

    public function checkoutcreate(Request $request){

        

        $data='';

        foreach($request->checkout as $checkout){

            $member=Members::find($checkout);

            if($member->wallet>0 && !is_null($member->shaba)){



                $data.=$member->wallet.'0,IR'.$member->shaba.','.rand(0000000,9999999).','.$member->firstname.' '.$member->lastname;
$data.='
';


$transaction=new Transaction;
$transaction->type='برداشت';
$transaction->amount=$member->wallet;
$transaction->members_id=$member->id;
$transaction->description='واریز به شماره شبا';

$member->wallet=0;

$transaction->save();

$member->update();


$notificationuser = new Notifications;
       $notificationuser->members_id = $member->id;
       $notificationuser->title = 'واریز موجودی به حساب شما';
       $notificationuser->text = 'کاربر گرامی! تسویه حساب زن برتر تا این تاریخ با شما انجام شد و مبلغ موجودی کیف پولتان به شماره شبای ثبت شده در پروفایل واریز گردید.';
       //$notificationuser->posts_id = 0;
       $notificationuser->save();

            }




        }

      $file = time() . '_checkout_teachers.txt';
      $destinationPath=public_path()."/upload/json/";
      if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
      File::put($destinationPath.$file,$data);
      //toastr()->success('تسویه حساب انجام شد! لطفا از فایل تولید شده برای واریز مبالغ استفاده کنید ');
      return response()->download($destinationPath.$file);

    }
}

