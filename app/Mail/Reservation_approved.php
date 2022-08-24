<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reservation_approved extends Mailable
{
    use Queueable, SerializesModels;
    public $name,$reservation_date,$reservation_time_from,$reservation_time_to;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$reservation_date,$reservation_time_from,$reservation_time_to)
    {
        $this->name = $name;
        $this->reservation_date = $reservation_date;
        $this->reservation_time_from = $reservation_time_from;
        $this->reservation_time_to = $reservation_time_to;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('reservation_approved');
    }
}
