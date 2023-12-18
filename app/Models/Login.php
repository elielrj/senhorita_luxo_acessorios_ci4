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
    protected $allowedFields = ['logins', 'senha', 'ultimo_acesso','email_id'];

    public function __construct(
        $id = null,
        $logins = null,
        $senha = null,
        $ultimoAcesso = null,
        $email = null,
        $dataHoraDaCriacao = null,
        $deletadoEm = null
    )
    {
        $this->id = $id;
        $this->logins = $logins;
        $this->senha = $senha;
        $this->ultimoAcesso = $ultimoAcesso;
        $this->email = $email ?? new Email();
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

    public function criarLogin($email,$senha)
    {
        $ERRO = 'Login::criarLogin()';

        $this->senha = md5($senha);

        $this->email->valor = $email;

        $this->email->criarEmail();

        $this->insert([
            'id' => null,
            'logins' => $this->logins ?? $ERRO,
            'senha' => $this->senha ?? $ERRO,
            'email_id' => $this->email->id ?? 0,
            'ultimo_acesso' => $this->ultimoAcesso ?? $ERRO,
        ]);
    }

    public function validarLogin($email, $senha)
    {
        $resultadoEmail = $this->email->validarEmail($email);

        if ($resultadoEmail) {

            $data = $this->where(['senha' => md5($senha)])->find();

            if (!empty($data)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deletarLogin()
    {
        $this->delete($this->id);
    }
}