<?php

namespace App\Controllers;

use App\Models\Newsletter;

class NewsletterController extends BaseController
{
    public function criarNewsletter()
    {
        $ERRO = 'Contato::criarNewsletter()';

        $newsletter = new Newsletter(
            null,
            $_POST['name'] ?? $ERRO,
            $_POST['email'] ?? $ERRO
        );

        $newsletter->criarNewsletter();

        return redirect('/');
    }
}