<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class lacastilla_mail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject,$messages;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$messages)
    {
        $this->subject = $subject;
        $this->messages = $messages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lacastilla.official@gmail.com')->markdown('lacastilla_mail');
    }
}
