<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Arquivo;
use App\Models\Estoque;


class Produto extends Model
{
    private $id;
    private $codigo;
    private $nome;
    private $valorUnitario;
    private $arquivos;
    private Estoque $estoque;
    private $dataHoraDaCriacao;
    private $deletadoEm;

    /*
    * Model do Codeigniter
    */
    protected $table = 'produto';
    protected $returnType = 'object';
    protected $allowedFields = [
        'codigo',
        'nome',
        'valorUnitario',
        'estoque',
    ];

    public function __construct(
        $id,
        $codigo,
        $nome,
        $valorUnitarioDoProduto,
        $estoque = null,
        $arquivos = [],
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->valorUnitario = $valorUnitarioDoProduto;
        $this->estoque = $estoque;
        $this->arquivos = $arquivos;
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

    public function criarProduto()
    {
        $ERRO = 'Produto::criarProduto()';

        $produtoId = $this->insert([
            'id' => null,
            'codigo' => $this->codigo ?? $ERRO,
            'nome' => $this->nome ?? $ERRO,
            'valorUnitario' => $this->valorUnitario ?? 0,
        ]);

        $this->estoque->criarEstoque($produtoId);

        foreach ($this->arquivos as $arquivo) {
            if ($arquivo == Arquivo::class) {
                $arquivo->criarArquivo($produtoId);
            }
        }
    }

    public function atualizarProduto()
    {
        $ERRO = 'Produto::atualizarProduto()';

        $this->update($this->id, [
            'codigo' => $this->codigo ?? $ERRO,
            'nome' => $this->nome ?? $ERRO,
            'valorUnitario' => $this->valorUnitario ?? 0,
        ]);

        $this->estoque->atualizarEstoque();

        foreach ($this->arquivos as $arquivo) {
            if ($arquivo == Arquivo::class) {
                $arquivo->atualizarArquivo();
            }
        }
    }
}