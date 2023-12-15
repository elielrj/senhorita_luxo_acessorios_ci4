<?php

namespace App\Controllers;

use App\Models\Contato;

class ContatoController extends BaseController
{
    public function enviarMensagem()
    {
        $ERRO = 'Contato::enviarMensagem()';

        $contato = new Contato(
            null,
            $_POST['fname'] ?? $ERRO,
            $_POST['lname'] ?? $ERRO,
            $_POST['email'] ?? $ERRO,
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
