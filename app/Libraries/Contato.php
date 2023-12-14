<?php

namespace App\Libraries;

class Contato
{
    private $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $mensagem;
    public $foiRespondido;
    public $dataHoraDaCricao;
    public $deletadoEm;

    public function __construct(
        $id,
        $nome,
        $sobrenome,
        $email,
        $mensagem,
        $foiRespondido = false,
        $dataHoraDaCricao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->mensagem = $mensagem;
        $this->foiRespondido = $foiRespondido;
        $this->dataHoraDaCricao = $dataHoraDaCricao;
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