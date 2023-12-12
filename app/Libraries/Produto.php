<?php

namespace App\Libraries;

namespace App\Libraries\Arquivo;

namespace App\Libraries\Estoque;

class Produto
{
    public $nome;
    public $valorUnitario;
    public $codigo;
    public Arquivo $arquivo;
    public Estoque $estoque;
}