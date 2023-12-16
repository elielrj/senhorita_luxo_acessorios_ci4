<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class Arquivo extends Model
{
    private $id;
    private $path;
    private DateTime $dataHoraDaCriacao;
    private $deletadoEm;


    /*
    * Model do Codeigniter
    */
    protected $table = 'arquivo';
    protected $returnType = 'object';
    protected $allowedFields = [
        'path',
        'produto_id'
    ];

    public function __contruct(
        $id,
        $path,
        $dataHoraDaCricao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->path = $path;
        $this->dataHoraDaCriacao = $dataHoraDaCricao;
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

    public function criarArquivo(int $produtoId)
    {
        $ERRO = 'Arquivo::criarArquivo()';

        $this->insert([
            'id' => null,
            'path' => $this->path ?? $ERRO,
            'produto_id' => $produtoId ?? 0
        ]);
    }

    public function atualizarArquivo()
    {
        $ERRO = 'Arquivo::atualizarArquivo()';

        $this->update($this->id, [
            'path' => $this->path ?? $ERRO,
            'produto_id' => $produtoId ?? 0
        ]);
    }

    public function deletarArquivo()
    {
        $this->delete($this->id);
    }
}