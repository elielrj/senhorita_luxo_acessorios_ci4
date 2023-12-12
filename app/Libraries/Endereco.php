<?php

namespace App\Libraries;

namespace App\Libraries\Cidade;

class Endereco
{
    public $nome;
    public $logradouro;
    public $numero;
    public $complemento;
    public $bairro;
    public $cep;
    public $favorito;
    public Cidade $cidade;
}