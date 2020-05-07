<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;
use App\Models\Members\Members;
use App\Models\Contents\Posts;
use App\Models\Setting;


class PayController extends Controller
{
    public function index(Request $request){

        $post=Posts::whereId($request->id)->first();
        $member=auth()->user();

        $purchase=new Purchase;
        $purchase->members_id=$member->id;
        $purchase->posts_id=$post->id;
        $purchase->payedprice=$post->price;
        $purchase->save();


        $data = array('MerchantID' => '26630526-5b97-44c5-b713-aa8777b7a915',
        'Amount' => $post->price,
        'CallbackURL' => route('Pay.CallBack').'?id='.$purchase->id,
        'Description' => 'پرداخت صورت حساب');
       $jsonData = json_encode($data);
       $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
       //$ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');

       curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
       curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonData)
       ));
       $result = curl_exec($ch);
       $err = curl_error($ch);
       $result = json_decode($result, true);
       curl_close($ch);
       if ($err) {
        echo "cURL Error #:" . $err;
       } else {
        if ($result["Status"] == 100) {
            //$link='https://sandbox.zarinpal.com/pg/StartPay/'.$result["Authority"];
            $link='https://www.zarinpal.com/pg/StartPay/'.$result["Authority"];

            return redirect($link);

       // header('Location: https://www.zarinpal.com/pg/StartPay/' . $result["Authority"]);
        //header('Location: https://sandbox.zarinpal.com/pg/StartPay/' . $result["Authority"]);

        } else {
        echo'ERR: ' . $result["Status"];
        }
       }

       //dd($result);



        //return back();
    }

    public function callback(Request $request){


        $purchase=Purchase::where('id',$request->id)->first();
 

        $Authority = $request->Authority;

 $data = array('MerchantID' => '26630526-5b97-44c5-b713-aa8777b7a915', 'Authority' => $Authority, 'Amount' => $purchase->payedprice);
 $jsonData = json_encode($data);
 $ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
 //$ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');

 curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
 curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 'Content-Type: application/json',
 'Content-Length: ' . strlen($jsonData)
 ));
 $result = curl_exec($ch);
$err = curl_error($ch);
 curl_close($ch);
 $result = json_decode($result, true);
 if ($err) {
 echo "cURL Error #:" . $err;
 } else {
 if ($result['Status'] == 100) {
 //echo 'Transation success. RefID:' . $result['RefID'];

 $purchase->payinfo='پرداخت موفق </br>'.'شماره مرجع '.$result['RefID'];
 $purchase->success=1;

 $purchase->update();
$commisi=Setting::first()->commission;
 $cashadmin=$purchase->payedprice*$commisi/100;
 $cashteacher=$purchase->payedprice-$cashadmin;

 $member=Members::where('id',$purchase->posts->members_id)->first();
 $member->wallet+=$cashteacher;
 $member->update();

 //header('Location: http://genebartar.ir/content/' . $purchase->posts_id);


 toastr()->success('پرداخت با موفقیت انجام گردید!');
 return redirect(route('Purchase.My'));


 } else {
    $purchase->payinfo='پرداخت ناموفق </br>'.$result['Status'];
    $purchase->update();
    toastr()->error('پرداخت نا موفق بود');
    return redirect(route('Purchase.My'));

 //header('Location: '.route('Purchase.My'));
 }
 }
        

        return view('Mian.Pay',compact('purchase'));
    }


    public function Checkout(Request $request){

        //dd($request->all());
        $member=Members::where('id',$request->id)->first();

        $member->wallet=0;

        $member->update();

        toastr()->success('تسویه حساب با موفقیت انجام گردید!');
        return back();
    }

}
