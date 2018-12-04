<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Usuario extends CI_Model 
{
    private $tableName = "usuario";
    
    public $id;
    public $nome;
    public $login;
    public $senha;
    public $ativo;
    
    /**
     * 
     */
    function validate()
    {
        return $this->nome != null && $this->login != null && $this->senha != null;
    }

    /**
     * 
     */
    function validateSenha($confirmacaoSenha)
    {
        return $this->senha === $confirmacaoSenha && strlen($this->senha) >= 6;
    }

    /**
     * 
     */
    function encryptSenha()
    {
        $this->senha = $this->encryption->encrypt($this->senha);
    }

    /**
     * 
     */
    function login()
    {
        $this->db->where("login", $this->login);
        $usuario = $this->db->get($this->tableName)->result();

        $usuario = count($usuario) != 0 ? $usuario[0] : null;

        if($usuario == null)
        {
            show_error("Usuario ou senha incorretos", 400, 'Erro');
            return;
        }

        if($usuario->ativo == 0)
        {
            show_error("Usuario desativado", 403, 'Erro');
            return;
        }

        if($this->encryption->decrypt($usuario->senha) != $this->senha )
        {
            show_error("Usuario ou senha incorretos", 400, 'Erro');
            return;
        }
        
        //Bypass de autenticação
        // $usuario = new Usuario();
        // $usuario->id = 0;
        // $usuario->nome = "teste";
        // $usuario->login = "teste";

        $this->session->userdata = array(
            "id" => $usuario->id,
            "nome" => $usuario->nome,
            "login" => $usuario->login
        );
    }

    /**
     * 
     */
    function listAll()
    {
        return $this->db->get($this->tableName)->result();
    }

    /**
     * 
     */
    function save()
    {
        if($this->id != null)
        {
            $this->update();
        }
        else
        {
            $this->insert();
        }
    }

    /**
     * 
     */
    function insert()
    {
        $this->db->insert($this->tableName, $this->toDb());
    }

    /**
     * 
     */
    function desativar()
    {
        $data = array("ativo" => "0");

        $this->db->where("id", $this->id);
        $this->db->update($this->tableName, $data);
    }

    /**
     * 
     */
    function ativar()
    {
        $data = array("ativo" => "1");

        $this->db->where("id", $this->id);
        $this->db->update($this->tableName, $data);
    }

    /**
     * 
     */
    function toDb()
    {
        return array(
            "nome" => $this->nome,
            "login" => $this->login,
            "senha" => $this->senha,
            "ativo" => 1
        );
    }

    /**
     * 
     */
    function fromPost($post)
    {
        $this->id = isset($post["id"]) && $post["id"] != '' ? $post["id"] : null;
        $this->nome = isset($post["nome"]) && $post["nome"] != '' ? $post["nome"] : null;
        $this->login = isset($post["login"]) && $post["login"] != '' ? $post["login"] : null;
        $this->senha = isset($post["senha"]) && $post["senha"] != '' ? $post["senha"] : null;
    }
}