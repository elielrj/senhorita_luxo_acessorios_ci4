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
        $id=null,
        $nome= null,
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
        $ERRO = 'Regiao::criarRegiao';

        $this->insert([
            'id' => null,
            'nome' => $this->nome ?? $ERRO,
        ]);
    }

    public function buscarRegiao(int $regiaoId)
    {
        $data = $this->find(['id' => $regiaoId]);

        $this->id = $data['id'];
        $this->nome = $data['nome'];
        $this->dataHoraDaCriacao = $data['dataHoraDaCriacao'];
    }
}