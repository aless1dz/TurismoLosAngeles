<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroExitoso extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Crear una nueva instancia de mensaje.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Construir el mensaje.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registro_exitoso')
                    ->subject('¡Bienvenido a la Aplicación!');
    }
}
