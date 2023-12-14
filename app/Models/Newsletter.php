<?php

namespace App\Models;

use CodeIgniter\Model;

class Newsletter extends Model
{
    private $id;
    private $nome;
    private $email;
    private $desejaReceber;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
    * Model do Codeigniter
    */
    protected $table = 'newsletter';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'email', 'deseja_receber'];

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

    public function criarNewsletter()
    {
        $ERRO = 'Contato::criarNewsletter()';

        $this->insert([
            'nome' => $this->nome ?? $ERRO,
            'email' => $this->email ?? $ERRO,
            'deseja_receber' => $this->desejaReceber ?? $ERRO,
        ]);
    }
}