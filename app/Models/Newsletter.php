<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Email;

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
    protected $allowedFields = ['nome', 'email_id', 'deseja_receber'];

    public function __construct(
        $id = null,
        $nome = null,
        $email = null,
        $desejaReceber = true,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email ?? new Email();
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
            'email_id' => $this->email->id ?? $ERRO,
            'deseja_receber' => $this->desejaReceber ?? false,
        ]);
    }

    public function buscarTodosAsNewsletter()
    {
        $ERRO = 'Contato::buscarTodosAsNewsletter()';

        $data = $this->findAll();

        $listaDeNewlatter = [];

        foreach ($data as $value) {
            $newslatter = new Newsletter();
            $newslatter->id = $value->id ?? $ERRO;
            $newslatter->nome = $value->nome ?? $ERRO;
            $newslatter->desejaReceber = $value->deseja_receber ?? $ERRO;
            $newslatter->dataHoraDaCriacao = $value->data_hora_da_criacao ?? $ERRO;
            $newslatter->email->buscarEmail($value->email_id);
            $listaDeNewlatter[] += $newslatter;
        }
        return $listaDeNewlatter;
    }
}