<?php

namespace App\Models;

use CodeIgniter\Model;

class Cupom extends Model
{
    private $id;
    private $codigo;
    private $podeUsarMaisDeUmaVez;
    private $dataHoraDaCriacao;
    private $dataHoraDaValidade;
    private $deletadoEm;

    public function __construct(
        $id,
        $codigo,
        $podeUsarMaisDeUmaVez = false,
        $daraHoraDaCriacao = null,
        $dataHoraDaValidade = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->$podeUsarMaisDeUmaVez = $podeUsarMaisDeUmaVez;
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