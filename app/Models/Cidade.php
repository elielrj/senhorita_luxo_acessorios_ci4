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
    protected $table = 'cidade';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'estado_id'];

    public function __construct(
        $id = null,
        $nome = null,
        $estado = null,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado?? new Estado();
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

    public function criarCidade()
    {
        $ERRO = 'Cidade::criarCidade()';

        $this->insert([
            'id' => null,
            'nome' => $this->nome ?? $ERRO,
            'estado_id' => $this->estado->id ?? 0,
        ]);
    }

    public function buscarCidade(int $cidadeId)
    {
        $data = $this->$this->find(['id' => $cidadeId]);

        $this->id = $data->id;
        $this->nome = $data->nome;
        $this->dataHoraDaCriacao = $data->data_hora_da_criacao;
        $this->estado->buscarEstado($this->estado_id);
    }
}