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
    private $valor;
    private $deletadoEm;

    /*
     * Model do Codeigniter
     */
    protected $table = 'vale_presente';
    protected $returnType = 'object';
    protected $allowedFields = [
        'codigo',
        'foi_usado',
        'data_hora_da_validade',
        'valor',
        'usuarioId',
        'pago'];

    public function __construct(
        $id,
        $codigo,
        $valor,
        $foiUsado = false,
        $daraHoraDaCriacao = null,
        $dataHoraDaValidade = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->valor = $valor;
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

    public function criarValePresente(int $usuarioId)
    {
        $this->insert([
            'id' => null,
            'codigo' => md5(),
            'foiUsado' => false,
            'usuarioId' => $usuarioId
        ]);
    }

    public function validarValePresente()
    {
        $data = $this->where(['codigo' => $this->codigo])->find();

        return $data->foi_usado;
    }
}