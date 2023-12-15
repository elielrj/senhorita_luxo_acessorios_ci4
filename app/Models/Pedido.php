<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ItemDoPedido;

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
        'pago'];

    public function __construct(
        $id,
        $numero,
        $valorTotal,
        $descontoTotal,
        $observacao = '',
        $pago = false,
        $itensDoPedido = [],
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