<?php

namespace App\Models;

use CodeIgniter\Model;

class Estoque extends Model
{
    private $id;
    private $quantidade;
    private $valorDeAquisicao;
    private $dataHoraDaCriacao;
    private $deletadoEm;


    /*
    * Model do Codeigniter
    */
    protected $table = 'estoque';
    protected $returnType = 'object';
    protected $allowedFields = [
        'quantidade',
        'valor_de_aquisicao',
    ];

    public function __contruct(
        $id,
        $quantidade,
        $valorDeAquisicao,
        $dataHoraDaCricao = null,
        $deletadoEm = null,
    )
    {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->valorDeAquisicao = $valorDeAquisicao;
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