<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Telefone;
use App\Models\Email;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Login;

class Usuario extends Model
{
    private $id;
    private $nome;
    private $sobrenome;
    private $nascimento;
    private $cpf;
    private $pedidos;
    private $telefones;
    private Email $email;
    private $enderecos;
    private $dataHoraDaCriacao;
    private $deletadoEm;
    /*
   * Model do Codeigniter
   */
    protected $table = 'usuario';
    protected $returnType = 'object';
    protected $allowedFields = [
        'nome',
        'sobrenome',
        'nascimento',
        'cpf',
    ];
    public function __construct(
        $id,
        $nome,
        $sobrenome,
        $nascimento,
        $cpf,
        $email,
        $pedidos = [],
        $enderecos=[],
        $telefones = [],
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->nascimento = $nascimento;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->pedidos = $pedidos;
        $this->enderecos = $enderecos;
        $this->telefones = $telefones;
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