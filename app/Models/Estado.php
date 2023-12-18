<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Regiao;

class Estado extends Model
{
    private $id;

    public $nome;
    public $sigla;
    public Regiao $regiao;
    /*
   * Model do Codeigniter
   */
    protected $table = 'estado';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'sigla', 'regiaoId'];

    public function __construct(
        $id = null,
        $nome = null,
        $sigla = null,
        $regiao = null,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sigla = $sigla;
        $this->regiao = $regiao ?? new Regiao();
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

    public function criarEstado()
    {
        $ERRO = 'Estado::criarEstado()';

        $this->insert([
            'id' => null,
            'nome' => $this->nome ?? $ERRO,
            'sigla' => $this->sigla ?? $ERRO,
            'regiaoId' => $this->regiao->id ?? 0,
        ]);
    }

    public function buscarEstado(int $estadoId)
    {
        $data = $this->$this->find(['id' => $estadoId]);

        $this->id = $data->id;
        $this->nome = $data->nome;
        $this->sigla = $data->sigla;
        $this->dataHoraDaCriacao = $data->dataHoraDaCriacao;
        $this->regiao->buscarRegiao($data->regiaoId);
    }
}