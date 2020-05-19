<?php

namespace App\Mail;

use App\Models\Members\Members;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;
    public $member;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Members $member)
    {
        $this->member = $member;
        $this->subject='به ژن برتر خوش آمدید';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@genebartar.com')->markdown('emails.welcome');
    }
}
