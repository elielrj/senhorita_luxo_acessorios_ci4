<?php

namespace App\Models;

use CodeIgniter\Model;

class Estoque extends Model
{
    private $id;
    private $quantidade;
    private $valorDeAquisicao;
    private $dataHoraDaCriacao;
    private $deletadoEm;


    /*
    * Model do Codeigniter
    */
    protected $table = 'estoque';
    protected $returnType = 'object';
    protected $allowedFields = [
        'quantidade',
        'valor_de_aquisicao',
        'produto_id',
    ];

    public function __contruct(
        $id,
        $quantidade,
        $valorDeAquisicao,
        $dataHoraDaCricao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->valorDeAquisicao = $valorDeAquisicao;
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

    public function criarEstoque(int $produtoId)
    {
        $ERRO = 'Estoque::criarEstoque';

        $this->insert([
            'id' => null,
            'quantidade' => $this->quantidade ?? $ERRO,
            'valor_de_aquisicao' => $this->valorDeAquisicao ?? $ERRO,
            'produto_id' => $produtoId ?? 0
        ]);
    }

    public function atualizarEstoque()
    {
        $ERRO = 'Estoque::atualizarEstoque';

        $this->update($this->id, [
            'quantidade' => $this->quantidade ?? $ERRO,
            'valor_de_aquisicao' => $this->valorDeAquisicao ?? $ERRO,
        ]);
    }

    public function reduzirEstoque(int $valor)
    {
        $ERRO = 'Estoque::reduzirEstoque';

        $this->update($this->id, [
            'quantidade' => ($this->quantidade - $valor) ?? $ERRO,
            'valor_de_aquisicao' => $this->valorDeAquisicao ?? $ERRO,
        ]);
    }

    public function aumentarEstoque(int $valor)
    {
        $ERRO = 'Estoque::aumentarEstoque';

        $this->update($this->id, [
            'quantidade' => ($this->quantidade - $valor) ?? $ERRO,
            'valor_de_aquisicao' => $this->valorDeAquisicao ?? $ERRO,
        ]);
    }

    public function deletarEstoque()
    {
        $this->delete($this->id);
    }

}