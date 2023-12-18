<?php

namespace App\Models;

use CodeIgniter\Model;

class Email extends Model
{
    private $id;

    private $valor;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
   * Model do Codeigniter
   */
    protected $table = 'email';
    protected $returnType = 'object';
    protected $allowedFields = ['valor'];

    public function __construct(
        $id = null,
        $valor = null,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->valor = $valor;
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

    public function buscarEmail(int $emailId)
    {
        $data = $this->where(['id' => $emailId])->find();

        $this->id = $data->id;
        $this->valor = $data->valor;
        $this->dataHoraDaCriacao = $data->data_hora_da_criacao;
    }

    public function criarEmail()
    {
        $ERRO = 'Email::criarEmail()';

        $data = $this->insert([
            'id' => null,
            'valor' => $this->valor ?? $ERRO,
        ]);

        $this->id = $data->resultID;
    }

    public function validarEmail($email)
    {
        $data = $this->where(['email' => $email])->find();
        if (!empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function deletarEmail()
    {
        $this->delete($this->id);
    }
}