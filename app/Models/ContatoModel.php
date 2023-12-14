<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use App\Libraries\Contato;
use CodeIgniter\Validation\ValidationInterface;

class ContatoModel extends Model
{
    protected $table = 'contato';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'sobrenome', 'email', 'mensagem', 'foi_respondido'];

    public function criarContato(Contato $contato)
    {
        $this->insert([
            'nome' => $contato->nome ?? null,
            'sobrenome' => $contato->sobrenome ?? null,
            'email' => $contato->email ?? null,
            'mensagem' => $contato->mensagem ?? null,
        ]);

    }

    public function buscarContatoPorId($id)
    {
        $contato = $this->find($id);

        return new Contato(
            $contato->id ?? null,
            $contato->nome ?? null,
            $contato->sobrenome ?? null,
            $contato->email ?? null,
            $contato->mensagem ?? null,
            $contato->foi_respondido ?? null,
            $contato->data_hora_da_cricao ?? null,
            $contato->deleted_at ?? null
        );
    }

    public function buscarContatosNaoRespondido()
    {
        $contatos = $this->find(['foi_respondido' => false]);

        $listaDeContatos = [];

        foreach ($contatos as $contato) {
            $listaDeContatos[] = new Contato(
                $contato->id ?? null,
                $contato->nome ?? null,
                $contato->sobrenome ?? null,
                $contato->email ?? null,
                $contato->mensagem ?? null,
                $contato->foi_respondido ?? null,
                $contato->data_hora_da_cricao ?? null,
                $contato->deleted_at ?? null
            );
        }
        return $listaDeContatos;
    }

    public function buscarContatosRespondido()
    {
        $contatos = $this->find(['foi_respondido' => true]);

        $listaDeContatos = [];

        foreach ($contatos as $contato) {
            $listaDeContatos[] = new Contato(
                $contato->id ?? null,
                $contato->nome ?? null,
                $contato->sobrenome ?? null,
                $contato->email ?? null,
                $contato->mensagem ?? null,
                $contato->foi_respondido ?? null,
                $contato->data_hora_da_cricao ?? null,
                $contato->deleted_at ?? null
            );
        }
        return $listaDeContatos;
    }

    public function buscarTodosOsContatos()
    {
        $contatos = $this->find();

        $listaDeContatos = [];

        foreach ($contatos as $contato) {
            $listaDeContatos[] = new Contato(
                $contato->id ?? null,
                $contato->nome ?? null,
                $contato->sobrenome ?? null,
                $contato->email ?? null,
                $contato->mensagem ?? null,
                $contato->foi_respondido ?? null,
                $contato->data_hora_da_cricao ?? null,
                $contato->deleted_at ?? null
            );
        }
        return $listaDeContatos;
    }
}