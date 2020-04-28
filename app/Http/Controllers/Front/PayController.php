<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Purchase;
use App\Models\Members\Members;
use App\Models\Contents\Posts;


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

        $data = array('MerchantID' => '03824fe6-dfba-11e9-80d6-000c295eb8wc',
        'Amount' => $post->price,
        'CallbackURL' => route('Pay.CallBack').'?id='.$purchase->id,
        'Description' => 'پرداخت صورت حساب');
       $jsonData = json_encode($data);
       //$ch = curl_init('https://www.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
       $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');

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
       // header('Location: https://www.zarinpal.com/pg/StartPay/' . $result["Authority"]);
        header('Location: https://sandbox.zarinpal.com/pg/StartPay/' . $result["Authority"]);

        } else {
        echo'ERR: ' . $result["Status"];
        }
       }



        return view('Mian.Pay',compact('purchase'));
    }

    public function callback(Request $request){

        $purchase=Purchase::where('id',$request->id);
 


 $data = array('MerchantID' => '03824fe6-dfba-11e9-80d6-000c295eb8wc', 'Authority' => $Authority, 'Amount' => $purchase->payedprice);
 $jsonData = json_encode($data);
 //$ch = curl_init('https://zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
 $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');

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

 $cashadmin=$purchase->payedprice*50/100;
 $cashteacher=$purchase->payedprice-$cashadmin;

 $member=Members::where('id',$purchase->posts->members_id);
 $member->wallet+=$cashteacher;
 $member->update();

 header('Location: http://genebartar.ir/content/' . $purchase->posts_id);

 } else {
    $purchase->payinfo='پرداخت ناموفق </br>'.$result['Status'];
    $purchase->update();
    

 header('Location: '.route('Purchase.My'));
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
