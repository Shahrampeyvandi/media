<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;

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
}
