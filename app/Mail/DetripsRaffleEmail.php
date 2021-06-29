<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Str;

class DetripsRaffleEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $suscriber;

    public function __construct($suscriber)
    {
        $this->suscriber = $suscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("[Repe y Enlaces], Hola ".Str::limit($this->suscriber->name, 8))->markdown('emails.promo');
    }
}
