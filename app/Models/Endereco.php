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
        'cidadeId',
        'usuarioId',
    ];

    public function __construct(
        $id = null,
        $nome = null,
        $logradouro = null,
        $numero = null,
        $complemento = null,
        $bairro = null,
        $cep = null,
        $favorito = null,
        $cidade = null,
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
        $this->cidade = $cidade ?? new Cidade();
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

    public function criarEndereco(int $usuarioId)
    {
        $ERRO = 'Endereco::criarEndereco()';

        $this->insert([
            'id' => null,
            'nome' => $this->nome ?? $ERRO,
            'logradouro' => $this->logradouro ?? $ERRO,
            'numero' => $this->numero ?? $ERRO,
            'complemento' => $this->complemento ?? $ERRO,
            'bairro' => $this->bairro ?? $ERRO,
            'cep' => $this->cep ?? $ERRO,
            'favorito' => $this->favorito ?? $ERRO,
            'cidadeId' => $this->cidade->id ?? 0,
            'usuarioId' => $usuarioId ?? 0,
        ]);
    }

    public function buscarEdereco(int $usuarioId)
    {
        $data = $this->where(['usuarioId' => $usuarioId])->findAll();

        foreach ($data as $value) {

            $endereco = new Endereco();

            $endereco->id = $value->id;
            $endereco->nome = $value->nome;
            $endereco->logradouro = $value->logradouro;
            $endereco->numero = $value->numero;
            $endereco->complemento = $value->complemento;
            $endereco->bairro = $value->bairro;
            $endereco->cep = $value->cep;
            $endereco->favorito = $value->favorito;
            $endereco->dataHoraDaCriacao = $value->dataHoraDaCriacao;
            $this->cidade->buscarCidade($value->cidadeId);
        }
    }
}