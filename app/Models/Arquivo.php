<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Arquivo extends Model
{
    private $id;
    private DateTime $dataHoraDaCriacao;
    private $path;
    private $deletadoEm;


    /*
    * Model do Codeigniter
    */
    protected $table = 'arquivo';
    protected $returnType = 'object';
    protected $allowedFields = [
        'path',
    ];

    public function __contruct(
        $id,
        $path,
        $dataHoraDaCricao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->path = $path;
        $this->dataHoraDaCriacao = $dataHoraDaCricao;
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