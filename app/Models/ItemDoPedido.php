<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Produto;

class ItemDoPedido extends Model
{
    private $id;
    private $codigoDoProduto;
    private $nomeDoProduto;
    private $valorUnitarioDoProduto;
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
        'codigo_do_produto',
        'nome_do_produto',
        'valor_unitario_do_produto',
        'ordem_do_item',
        'quantidade',
        'desconto_em_percentual',
        'desconto_em_valor',
        'pedido_id',
        'produto_id',
    ];

    public function __construct(
        $id,
        $codigoDoProduto,
        $nomeDoProduto,
        $valorUnitarioDoProduto,
        $ordemDoItem,
        $produto,
        $quantidade = 1,
        $descontoEmPercentual = 0,
        $descontoEmValor = 0,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigoDoProduto = $codigoDoProduto;
        $this->nomeDoProduto = $nomeDoProduto;
        $this->valorUnitarioDoProduto = $valorUnitarioDoProduto;
        $this->ordemDoItem = $ordemDoItem;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->descontoEmPercentual = $descontoEmPercentual;
        $this->descontoEmValor = $descontoEmValor;
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

    public function criarItemDoPedido(int $pedidoId)
    {
        $ERRO = 'ItemDoPedido::criarItemDoPedido()';

        $resultado = $this->produto->estoque->reduzirEstoque($this->quantidade);

        if ($resultado) {
            $this->insert([
                'id' => null,
                'codigo_do_produto' => $this->codigoDoProduto ?? $ERRO,
                'nome_do_produto' => $this->nomeDoProduto ?? $ERRO,
                'valor_unitario_do_produto' => $this->valorUnitarioDoProduto ?? 0,
                'ordem_do_item' => $this->ordemDoItem ?? 0,
                'quantidade' => $this->quantidade ?? 0,
                'desconto_em_percentual' => $this->descontoEmPercentual ?? 0,
                'desconto_em_valor' => $this->descontoEmValor ?? 0,
                'produto_id' => $this->produto->id ?? 0,
                'pedido_id' => $pedidoId ?? 0,
            ]);
        }//todo: tratar o erro eventual, caso do estoque for menor a qtd desejada.
    }
}