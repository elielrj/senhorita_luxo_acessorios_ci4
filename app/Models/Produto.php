<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Arquivo;
use App\Models\Estoque;


class Produto extends Model
{
    private $id;
    private $codigo;
    private $nome;
    private $valorUnitario;
    private $arquivos;
    private Estoque $estoque;
    private $dataHoraDaCriacao;
    private $deletadoEm;


    /*
    * Model do Codeigniter
    */
    protected $table = 'produto';
    protected $returnType = 'object';
    protected $allowedFields = [
        'codigo',
        'nome',
        'valor_unitario',
        'arquivos',
        'estoque',
    ];

    public function __construct(
        $id,
        $codigo,
        $nome,
        $valorUnitario,
        $estoque,
        $arquivos = [],
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->valorUnitario = $valorUnitario;
        $this->estoque = $estoque;
        $this->arquivos = $arquivos;
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