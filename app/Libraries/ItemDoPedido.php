<?php

namespace App\Libraries;

namespace App\Libraries\Produto;
class ItemDoPedido
{
    public $ordem;
    public $nome;
    public $valorUnitario;
    public $codigo;
    public $quantidade;
    public $descontoEmPercentual;
    public $descontoEmValor;
    public Produto $produto;
}