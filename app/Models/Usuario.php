<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Telefone;
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
        $id = null,
        $nome = null,
        $sobrenome = null,
        $nascimento = null,
        $cpf = null,
        $pedidos = [],
        $enderecos = [],
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

    public function criarUsuario()
    {
        $ERRO = 'Usuario::criarUsuario()';


        $this->update($this->id, [
            'nome' => $this->nome ?? $ERRO,
            'sobrenome' => $this->sobrenome ?? $ERRO,
            'nascimento' => $this->nascimento,
            'cpf' => $this->cpf ?? 0,
        ]);

        foreach ($this->telefones as $telefone) {
            if ($telefone == Telefone::class) {
                $telefone->atualizarTelefone();
            }
        }
    }

    public function atualizarUsuario()
    {
        $ERRO = 'Usuario::atualizarUsuario()';

        $this->update($this->id, [
            'nome' => $this->nome ?? $ERRO,
            'sobrenome' => $this->sobrenome ?? $ERRO,
            'nascimento' => $this->nascimento,
            'cpf' => $this->cpf ?? 0,
        ]);

        foreach ($this->telefones as $telefone) {
            if ($telefone == Telefone::class) {
                $telefone->atualizarTelefone();
            }
        }
    }

    public function deletarUsuario()
    {
        $this->delete($this->id);
    }
}