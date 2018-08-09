<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class EmailNotificacao extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $noticia;
    public $email;

    public function __construct($noticia,$email)
    {

        $this->email = $email;
        $this->noticia = $noticia;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        Log::info("Enviando emails!");
        return $this->view('sistema.emails.emailNotificacao');
    }
}
