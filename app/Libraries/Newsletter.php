<?php

namespace App\Libraries;

class Newsletter
{
    private $id;
    private $nome;
    private $email;
    private $desejaReceber;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    public function __construct(
        $id,
        $nome,
        $email,
        $desejaReceber = true,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->desejaReceber = $desejaReceber;
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