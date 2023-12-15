<?php

namespace App\Models;

use CodeIgniter\Model;

class Email extends Model
{
    private $id;

    private $valor;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
   * Model do Codeigniter
   */
    protected $table = 'email';
    protected $returnType = 'object';
    protected $allowedFields = ['valor'];

    public function __construct(
        $id,
        $valor,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->valor = $valor;
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