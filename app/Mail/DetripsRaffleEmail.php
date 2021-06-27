<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        return $this->subject('[Por 48 horas] Grabación Sesión “Automatización y Nuevas Prácticas Con Excel”')->markdown('emails.promo');
    }
}
