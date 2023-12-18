<?php

namespace App\Controllers;

use App\Models\Email;
use App\Models\Newsletter;

class NewsletterController extends BaseController
{
    public function criarNewsletter()
    {
        $ERRO = 'Contato::criarNewsletter()';

        $email = new Email(
            null,
            $_POST['email'] ?? $ERRO);

        $newsletter = new Newsletter(
            null,
            $_POST['name'] ?? $ERRO,
            $email ?? new Email()
        );

        $newsletter->criarNewsletter();

       return redirect('/');
    }
}