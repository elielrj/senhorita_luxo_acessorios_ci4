<?php

namespace App\Controllers;

use App\Models\Contato;
use App\Models\Email;

class ContatoController extends BaseController
{
    public function enviarMensagem()
    {
        $ERRO = 'Contato::enviarMensagem()';

        $email = new Email(null, $_POST['email'] );

        $contato = new Contato(
            null,
            $_POST['fname'] ?? $ERRO,
            $_POST['lname'] ?? $ERRO,
            $email,
            $_POST['message'] ?? $ERRO
        );

        $contato->criarContato();

        return redirect('mensagem-enviada');
    }

    public function mensagemEnviada()
    {
        return view('contato/ContatoEnviado');
    }
}
