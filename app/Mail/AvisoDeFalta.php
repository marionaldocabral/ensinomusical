<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvisoDeFalta extends Mailable
{
    use Queueable, SerializesModels;

    private $remetente;
    private $destinatario;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($remetente, $destinatario, $data)
    {
        $this->remetente = $remetente;
        $this->destinatario = $destinatario;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $remetente = $this->remetente;
        $destinatario = $this->destinatario;
        $data = $this->data;
        return $this->view('mail.faltamail', compact('remetente','destinatario','data'));
    }
}
