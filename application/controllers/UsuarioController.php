<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioController extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        if(!isset($this->session->userdata["id"]))
        {
            redirect('admin');
        }
    }

    function listar()
    {
        $this->load->model("Usuario");
        $usuario = new Usuario();

        $data = array(
            "titulo" => "Usuários cadastrados",
            "userdata" => $this->session->userdata,
            "activeMenu" => "usuario",
            "activeSubMenu" => "listarUsuario",
            "usuarios" => $usuario->listAll()
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/usuarios/listar-usuarios.php");
        $this->load->view("admin/template/footer");
    }

    /**
     * 
     */
    function cadastrar()
    {
        $this->load->model("Usuario");
        $usuario = new Usuario();

        $data = array(
            "titulo" => "Cadastro de usuário",
            "userdata" => $this->session->userdata,
            "activeMenu" => "usuario",
            "activeSubMenu" => "cadastroUsuario",
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/usuarios/form-usuarios.php");
        $this->load->view("admin/template/footer");
    }

    /**
     * 
     */
    function desativar($idUsuario)
    {
        $this->load->model("Usuario");
        $usuario = new Usuario();
        $usuario->id = $idUsuario;

        $usuario->desativar();
    }

    /**
     * 
     */
    function ativar($idUsuario)
    {
        $this->load->model("Usuario");
        $usuario = new Usuario();
        $usuario->id = $idUsuario;

        $usuario->ativar();
    }

    /**
     * 
     */
    function insert()
    {
        $this->load->model('Usuario');

        $usuario = new Usuario();
        $usuario->fromPost($_POST);

        if($usuario->validate())
        {
            if($usuario->validateSenha($this->input->post('confirmacaoSenha')))
            {
                $usuario->encryptSenha();
                
                $usuario->save();
            }
            else
            {
                show_error("As senhas devem ser iguais e conter 6 ou mais caracteres", 400, 'Erro!');
            }
        }
        else
        {
            show_error("Verifique os campos obrigatórios", 400, 'Erro!');
        }
    }
}