<?php

namespace App\Listeners\UserActivation;

use App\Events\UserActivation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Client;
class sendSMSnotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserActivation  $event
     * @return void
     */
    public function handle(UserActivation $event)
    {
        
        $client = new Client([
            'verify' =>false,
        ]);

        $response = $client->request('POST' , 'https://api.kavenegar.com/v1/555773564959434D476D5A316F35383672727865366E6D4337487A4C46377A356746634246442F584B4E673D/sms/send.json' , [
            'form_params' => [
                'receptor' => $event->mobile,
                'message' => $event->activationCode->v_code
            ]
        ]);

    }
}
