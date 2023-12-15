<?php

namespace App\Models;

use CodeIgniter\Model;

class Cidade extends Model
{
    private $id;

    private $nome;
    private $dataHoraDaCriacao;
    public Estado $estado;
    /*
   * Model do Codeigniter
   */
    protected $table = 'contato';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'estado_id'];
    public function __construct(
        $id,
        $nome,
        $estado,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado;
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