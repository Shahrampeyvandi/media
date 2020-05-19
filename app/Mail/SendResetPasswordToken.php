<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendResetPasswordToken extends Mailable
{
    use Queueable, SerializesModels;
    public $email;
    public $token;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email , $token)
    {
        $this->email = $email;
        $this->token = $token;
        $this->subject='بازیابی رمز عبور';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetpassword');
    }
}
