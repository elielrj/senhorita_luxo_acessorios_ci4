<?php

namespace App\Models;

use CodeIgniter\Model;

class Regiao extends Model
{
    private $id;
    private $nome;
    private $dataHoraDaCriacao;

    /*
    * Model do Codeigniter
    */
    protected $table = 'regiao';
    protected $returnType = 'object';
    protected $allowedFields = ['nome'];

    public function __construct(
        $id,
        $nome,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
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