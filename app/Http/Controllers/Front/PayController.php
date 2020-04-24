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



        return view('Mian.Pay',compact('purchase'));
    }

    public function callback(Request $request){

        define("DEBUG", 1);
        // Set to 0 once you're ready to go live
        define("USE_SANDBOX", 1);
        define("LOG_FILE", "ipn.log");
        // Read POST data
        // reading posted data directly from $_POST causes serialization
        // issues with array data in POST. Reading raw POST data from input stream instead.
        $raw_post_data = $request->all();
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        // read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        // Post IPN data back to PayPal to validate the IPN data is genuine
        // Without this step anyone can fake IPN data
        if(USE_SANDBOX == true) {
            $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
        } else {
            $paypal_url = "https://www.paypal.com/cgi-bin/webscr";
        }
        $ch = curl_init($paypal_url);
        if ($ch == FALSE) {
            return FALSE;
        }
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        if(DEBUG == true) {
            //curl_setopt($ch, CURLOPT_HEADER, 1);
            //curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        }
        // CONFIG: Optional proxy configuration
        //curl_setopt($ch, CURLOPT_PROXY, $proxy);
        //curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
        // Set TCP timeout to 30 seconds
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        // CONFIG: Please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set the directory path
        // of the certificate as shown below. Ensure the file is readable by the webserver.
        // This is mandatory for some environments.
        //$cert = __DIR__ . "./cacert.pem";
        //curl_setopt($ch, CURLOPT_CAINFO, $cert);
        $res = curl_exec($ch);
        if (curl_errno($ch) != 0) // cURL error
            {
            if(DEBUG == true) {	
                //error_log(date('[Y-m-d H:i e] '). "Can't connect to PayPal to validate IPN message: " . curl_error($ch) . PHP_EOL, 3, LOG_FILE);
            }
            curl_close($ch);
            exit;
        } else {
                // Log the entire HTTP response if debug is switched on.
                if(DEBUG == true) {
                    //error_log(date('[Y-m-d H:i e] '). "HTTP request of validation request:". curl_getinfo($ch, CURLINFO_HEADER_OUT) ." for IPN payload: $req" . PHP_EOL, 3, LOG_FILE);
                    //error_log(date('[Y-m-d H:i e] '). "HTTP response of validation request: $res" . PHP_EOL, 3, LOG_FILE);
                }
                curl_close($ch);
        }
        // Inspect IPN validation result and act accordingly
        // Split response headers and payload, a better way for strcmp
        $tokens = explode("\r\n\r\n", trim($res));
        $result = json_decode($res, true);

        $res = trim(end($tokens));
        if (strcmp ($res, "VERIFIED") == 0) {
            // assign posted variables to local variables
            $item_name = $result->item_name;
            $item_number = $result->item_number;
            $payment_status = $result->payment_status;
            $payment_amount = $result->mc_gross;
            $payment_currency = $result->mc_currency;
            $txn_id = $result->txn_id;
            $receiver_email = $result->receiver_email;
            $payer_email = $result->payer_email;
            
          
            // check whether the payment_status is Completed
            $isPaymentCompleted = false;
            if($payment_status == "Completed") {
                $isPaymentCompleted = true;
            }
            // check that txn_id has not been previously processed
            $isUniqueTxnId = false; 


            $purchase=Purchase::whereId($txn_id)->first();

            // check that receiver_email is your PayPal email
            // check that payment_amount/payment_currency are correct
            if($isPaymentCompleted && $isUniqueTxnId && $payment_amount == "0.01" && $payment_currency == "USD") {
                $purchase->success=1;
                $purchase->payinfo="شماره $item_number نام $item_name وضعیت $payment_status مقدار $payment_amount واحدپولی $payment_currency ای دی $txn_id";
                $payment_id = $db->insertQuery("INSERT INTO payment(item_number, item_name, payment_status, payment_amount, payment_currency, txn_id) VALUES('$item_number', '$item_name', $payment_status, '$payment_amount', '$payment_currency', '$txn_id')");
            }
            // process payment and mark item as paid.
            
            
            if(DEBUG == true) {
                error_log(date('[Y-m-d H:i e] '). "Verified IPN: $req ". PHP_EOL, 3, LOG_FILE);
            }
            
        } else if (strcmp ($res, "INVALID") == 0) {
            // log for manual investigation
            // Add business logic here which deals with invalid IPN messages
            if(DEBUG == true) {
                error_log(date('[Y-m-d H:i e] '). "Invalid IPN: $req" . PHP_EOL, 3, LOG_FILE);
            }



        return view('Mian.Pay',compact('purchase'));
    }
}
}
