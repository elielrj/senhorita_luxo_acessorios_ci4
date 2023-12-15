<?php

namespace App\Models;

use CodeIgniter\Model;

class Telefone extends Model
{
    private $id;
    private $ddd;
    private $numero;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
   * Model do Codeigniter
   */
    protected $table = 'telefone';
    protected $returnType = 'object';
    protected $allowedFields = ['ddd', 'numero'];

    public function __construct(
        $id,
        $ddd,
        $numero,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->ddd = $ddd;
        $this->numero = $numero;
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