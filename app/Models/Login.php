<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Email;

class Login extends Model
{
    private $id;

    private $logins;
    private $senha;
    private $ultimoAcesso;
    private Email $email;
    private $dataHoraDaCriacao;
    private $deletadoEm;
    /*
   * Model do Codeigniter
   */
    protected $table = 'login';
    protected $returnType = 'object';
    protected $allowedFields = ['logins', 'senha', 'ultimo_acesso'];

    public function __construct(
        $id,
        $logins,
        $senha,
        $ultimoAcesso,
        $email,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->logins = $logins;
        $this->senha = $senha;
        $this->ultimoAcesso = $ultimoAcesso;
        $this->email = $email;
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