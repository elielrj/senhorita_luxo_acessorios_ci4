<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Email;

class Newsletter extends Model
{
    private $id;
    private $nome;
    private Email $email;
    private $desejaReceber;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
    * Model do Codeigniter
    */
    protected $table = 'newsletter';
    protected $returnType = 'object';
    protected $allowedFields = ['nome', 'emailId', 'desejaReceber'];

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

        $this->email->criarEmail();

        $this->insert([
            'nome' => $this->nome ?? $ERRO,
            'emailId' => $this->email->id,
            'desejaReceber' => $this->desejaReceber ?? false,
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
            $newslatter->desejaReceber = $value->desejaReceber ?? $ERRO;
            $newslatter->dataHoraDaCriacao = $value->dataHoraDaCriacao ?? $ERRO;
            $newslatter->email->buscarEmail($value->emailId);
            $listaDeNewlatter[] += $newslatter;
        }
        return $listaDeNewlatter;
    }
}