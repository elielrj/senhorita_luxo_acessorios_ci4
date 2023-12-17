<?php

namespace App\Models;

use CodeIgniter\Model;

class Telefone extends Model
{
    private $id;
    private $ddd;
    private $numero;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
   * Model do Codeigniter
   */
    protected $table = 'telefone';
    protected $returnType = 'object';
    protected $allowedFields = ['ddd', 'numero'];

    public function __construct(
        $id = null,
        $ddd = null,
        $numero = null,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->ddd = $ddd;
        $this->numero = $numero;
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

    public function criarTelefone()
    {
        $ERRO = 'Telefone::criarTelefone()';

        $this->insert([
            'id' => null,
            'ddd' => $this->ddd ?? $ERRO,
            'numero' => $this->numero ?? $ERRO,
        ]);
    }

    public function buscarTelefones(int $usuarioId)
    {
        $data = $this->where(['usuario_id' => $usuarioId])->findAll();

        $listaDeTelefones = [];

        foreach ($data as $value){
            $telafone = new Telefone();
            $telafone->id = $data->id;
            $telafone->ddd = $data->ddd;
            $telafone->numero = $data->numero;
            $telafone->dataHoraDaCriacao = $data->data_hora_da_criacao;
            $listaDeTelefones += $listaDeTelefones;
        }
        return $listaDeTelefones;
    }

    public function atualizarTelefone()
    {
        $this->update($this->id,[
            'ddd'=>$this->ddd,
            'numero'=>$this->numero,
        ]);
    }
    public function deletarTelefone()
    {
        $this->delete($this->id);
    }
}