<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Cidade;

class Endereco extends Model
{
    private $id;

    private $nome;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cep;
    private $favorito;
    private Cidade $cidade;
    private $dataHoraDaCriacao;
    /*
   * Model do Codeigniter
   */
    protected $table = 'endereco';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nome',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cep',
        'favorito',
        'cidade_id'
    ];

    public function __construct(
        $id,
        $nome,
        $logradouro,
        $numero,
        $complemento,
        $bairro,
        $cep,
        $favorito,
        $cidade,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cep = $cep;
        $this->favorito = $favorito;
        $this->cidade = $cidade;
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