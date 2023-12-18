<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ItemDoPedido;
use App\Models\Cupom;
use App\Models\ValePresente;
use App\Models\Estoque;

class Pedido extends Model
{
    private $id;
    private $numero;
    private $valorTotal;
    private $descontoTotal;
    private $observacao;
    private $pago;
    private $itensDoPedido;
    private $dataHoraDaCriacao;
    private $deletadoEm;
    private $cupom;
    private $valesPresentes;

    /*
     * Model do Codeigniter
     */
    protected $table = 'pedido';
    protected $returnType = 'object';
    protected $allowedFields = [
        'numero',
        'valor_total',
        'desconto_total',
        'observacao',
        'pago',
        '$usuarioId',
        'cupomId',
    ];

    public function __construct(
        $id,
        $numero,
        $valorTotal,
        $descontoTotal,
        $observacao = '',
        $pago = false,
        $itensDoPedido = [],
        $cupom = [],
        $valesPresentes = [],
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->valorTotal = $valorTotal;
        $this->descontoTotal = $descontoTotal;
        $this->observacao = $observacao;
        $this->pago = $pago;
        $this->itensDoPedido = $itensDoPedido;
        $this->cupom = $cupom;
        $this->valesPresentes = $valesPresentes;
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

    public function criarPedido(int $usuarioId)
    {
        $ERRO = 'Pedido::criarPedido()';

        $this->calcularPedido();

        $pedidoId = $this->insert([
            'id' => null,
            'numero' => $this->numero ?? $ERRO,
            'valor_total' => $this->valorTotal ?? 0,
            'desconto_total' => $this->descontoTotal ?? 0,
            'observacao' => $this->observacao ?? $ERRO,
            'pago' => $this->pago ?? false,
            'cupomId' => $this->cupom->id ?? 0,
            '$usuarioId' => $usuarioId ?? 0,
        ]);

        foreach ($this->itensDoPedido as $itemDoPedido) {
            if ($itemDoPedido == ItemDoPedido::class) {
                $itemDoPedido->criarItemDoPedido($pedidoId);
            }
        }
    }

    public function calcularPedido()
    {
        $total = 0;

        foreach ($this->itensDoPedido as $item) {
            if ($item == ItemDoPedido::class) {
                $total += $item->valorUnitarioDoProduto * $item->quantidade;
            }
        }
        $this->valorTotal = $total;

        if (!empty($this->valesPresentes)) {

            $totalDeValePresente = 0;
            foreach ($this->valesPresentes as $valePresente) {
                if ($valePresente == ValePresente::class) {
                    $totalDeValePresente += $valePresente->valor;
                }
            }
            $this->descontoTotal = $totalDeValePresente;
        }
    }
}