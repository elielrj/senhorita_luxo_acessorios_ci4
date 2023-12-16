<?php

namespace App\Models;

use CodeIgniter\Model;

class Regiao extends Model
{
    private $id;
    private $nome;
    private $dataHoraDaCriacao;
    private $deletadoEm;

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

    public function criarRegiao()
    {
        $this->insert([
            'id'=>null,
            'nome'=> $this->nome,
        ]);
    }

    public function buscarRegiao(int $regiaoId)
    {
        $data = $this->find(['id'=>$regiaoId]);

        $this->id = $data['id'];
        $this->nome = $data['nome'];
        $this->dataHoraDaCriacao = $data['data_hora_da_criacao'];
    }
}