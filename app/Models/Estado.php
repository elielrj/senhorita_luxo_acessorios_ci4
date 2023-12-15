<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Regiao;

class Estado extends Model
{
    private $id;

    public $nome;
    public $sigla;
    public Regiao $regiao;
    /*
   * Model do Codeigniter
   */
    protected $table = 'estado';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'sigla'];

    public function __construct(
        $id,
        $nome,
        $sigla,
        $regiao,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sigla = $sigla;
        $this->regiao = $regiao;
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