<?php

namespace App\Models;

use CodeIgniter\Model;

class Contato extends Model
{
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $mensagem;
    private $foiRespondido;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
     * Model do Codeigniter
     */
    protected $table = 'contato';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'sobrenome', 'email', 'mensagem', 'foi_respondido'];

    public function __construct(
        $id=null,
        $nome=null,
        $sobrenome=null,
        $email=null,
        $mensagem=null,
        $foiRespondido = false,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->mensagem = $mensagem;
        $this->foiRespondido = $foiRespondido;
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

    public function criarContato()
    {
        $ERRO = 'Contato::criarContato()';

        $this->insert([
            'id'=> null,
            'nome' => $this->nome ?? $ERRO,
            'sobrenome' => $this->sobrenome ?? $ERRO,
            'email' => $this->email ?? $ERRO,
            'mensagem' => $this->mensagem ?? $ERRO,
        ]);
    }

    public function buscarContatoPorId($contatoId)
    {
        $ERRO = 'Contato::buscarContatoPorId()';

        $contato = $this->find($contatoId);

        return new Contato(
            $contato->id ?? $ERRO,
            $contato->nome ?? $ERRO,
            $contato->sobrenome ?? $ERRO,
            $contato->email ?? $ERRO,
            $contato->mensagem ?? $ERRO,
            $contato->foi_respondido ?? $ERRO,
            $contato->data_hora_da_cricao ?? $ERRO,
            $contato->deleted_at ?? null
        );
    }

    public function buscarContatosNaoRespondido()
    {
        $ERRO = 'Contato::buscarContatosNaoRespondido()';

        $contatos = $this->where(['foi_respondido' => false])->findAll();

        $listaDeContatos = [];

        foreach ($contatos as $contato) {
            $listaDeContatos[] = new Contato(
                $contato->id ?? $ERRO,
                $contato->nome ?? $ERRO,
                $contato->sobrenome ?? $ERRO,
                $contato->email ?? $ERRO,
                $contato->mensagem ?? $ERRO,
                $contato->foi_respondido ?? $ERRO,
                $contato->data_hora_da_cricao ?? $ERRO,
                $contato->deleted_at ?? null
            );
        }
        return $listaDeContatos;
    }

    public function buscarContatosRespondido()
    {
        $ERRO = 'Contato::buscarContatosRespondido()';

        $contatos = $this->where(['foi_respondido' => true])->findAll();

        $listaDeContatos = [];

        foreach ($contatos as $contato) {
            $listaDeContatos[] = new Contato(
                $contato->id ?? $ERRO,
                $contato->nome ?? $ERRO,
                $contato->sobrenome ?? $ERRO,
                $contato->email ?? $ERRO,
                $contato->mensagem ?? $ERRO,
                $contato->foi_respondido ?? $ERRO,
                $contato->data_hora_da_cricao ?? $ERRO,
                $contato->deleted_at ?? null
            );
        }
        return $listaDeContatos;
    }

    public function buscarTodosOsContatos()
    {
        $ERRO = 'Contato::buscarTodosOsContatos()';

        $contatos = $this->findAll();

        $listaDeContatos = [];

        foreach ($contatos as $contato) {
            $listaDeContatos[] = new Contato(
                $contato->id ?? $ERRO,
                $contato->nome ?? $ERRO,
                $contato->sobrenome ?? $ERRO,
                $contato->email ?? $ERRO,
                $contato->mensagem ?? $ERRO,
                $contato->foi_respondido ?? $ERRO,
                $contato->data_hora_da_cricao ?? $ERRO,
                $contato->deleted_at ?? null
            );
        }
        return $listaDeContatos;
    }
}