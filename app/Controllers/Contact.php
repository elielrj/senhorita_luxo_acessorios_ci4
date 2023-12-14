<?php

namespace App\Controllers;


use App\Models\ContatoModel;
use App\Libraries\Contato;

class Contact extends BaseController
{
    public function index(): string
    {
        return view('contact', [
            'contact' => 'nav-item active'
        ]);
    }

    public function enviarMensagem()
    {
        $contato = new Contato(
            null,
            $_POST['fname'] ?? 'Contact::erro-enviar-mensagem',
            $_POST['lname'] ?? 'Contact::erro-enviar-mensagem',
            $_POST['email'] ?? 'Contact::erro-enviar-mensagem',
            $_POST['message'] ?? 'Contact::erro-enviar-mensagem',
            false
        );

        $contatoModel = new ContatoModel();
        $contatoModel->criarContato($contato);

        return redirect('mensagem-enviada');
    }

    public function  mensagemEnviada()
    {
        return view('contatoenviado');
    }
}
