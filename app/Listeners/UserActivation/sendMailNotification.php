<?php

namespace App\Listeners\UserActivation;

use App\Events\UserActivation;
use App\Mail\SendActivationCode;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
class sendMailNotification
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
        
        Mail::to($event->mobile)->send(new SendActivationCode($event->mobile , $event->activationCode->v_code));


    }
}
