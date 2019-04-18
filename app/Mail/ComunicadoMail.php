<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ComunicadoMail extends Mailable
{
    use Queueable, SerializesModels;

    private $body = null;
    private $cliente = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body,$cliente)
    {
        $pattern = ['{nome}', '{email}','{uf}','{cidade}','{endereco}'];
        $replace = [
            $cliente->nome,
            $cliente->email,
            $cliente->endereco->uf,
            $cliente->endereco->cidade,
            $cliente->endereco->endereco,
        ];
        $this->body = str_replace($pattern, $replace, $body);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.clientemail')->with('body', $this->body);
    }
}
