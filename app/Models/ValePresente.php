<?php

namespace App\Models;

use App\Models\Usuario;
use CodeIgniter\Model;

class ValePresente extends Model
{
    private $id;
    private $codigo;
    private $foiUsado;
    private $dataHoraDaCriacao;
    private $dataHoraDaValidade;
    private Usuario $usuario;
    private $deletadoEm;

    public function __construct(
        $id,
        $codigo,
        $usuario,
        $foiUsado = false,
        $daraHoraDaCriacao = null,
        $dataHoraDaValidade = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->usuario = $usuario;
        $this->foiUsado = $foiUsado;
        $this->dataHoraDaCriacao = $daraHoraDaCriacao;
        $this->dataHoraDaValidade = $dataHoraDaValidade;
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