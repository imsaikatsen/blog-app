<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $objDemo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($objDemo)
    {
        $this->objDemo = $objDemo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('padma@technology.com')
            ->subject($this->objDemo->title)
            ->view('email.dynamic_email_template');
    }
}
