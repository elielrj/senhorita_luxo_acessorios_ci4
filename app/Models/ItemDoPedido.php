<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Produto;

class ItemDoPedido extends Model
{
    private $id;
    private $codigoDoProduto;
    private $nomeDoProduto;
    private $valorUnitario;
    private $ordemDoItem;
    private $quantidade;
    private $descontoEmPercentual;
    private $descontoEmValor;
    private $dataHoraDaCriacao;
    private Produto $produto;
    private $deletadoEm;

    /*
     * Model do Codeigniter
     */
    protected $table = 'item_do_pedido';
    protected $returnType = 'object';
    protected $allowedFields = [
        'ordem',
        'valor_unitario',
        'codigo',
        'quantidade',
        'desconto_em_percentual',
        'desconto_em_valor'
    ];

    public function __construct(
        $id,
        $codigoDoProduto,
        $nomeDoProduto,
        $valorUnitario,
        $ordemDoItem,
        $quantidade,
        $descontoEmPercentual,
        $descontoEmValor,
        $produto,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigoDoProduto = $codigoDoProduto;
        $this->nomeDoProduto = $nomeDoProduto;
        $this->valorUnitario = $valorUnitario;
        $this->ordemDoItem = $ordemDoItem;
        $this->quantidade = $quantidade;
        $this->descontoEmPercentual = $descontoEmPercentual;
        $this->descontoEmValor = $descontoEmValor;
        $this->produto = $produto;
        $this->dataHoraDaCriacao = $dataHoraDaCriacao;
        $this->deletadoEm = $deletadoEm;
    }

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}