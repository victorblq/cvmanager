<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!isset($this->session->userdata["id"]))
        {
            redirect('admin');
        }
    }

    function list() {
        $this->load->model("User");
        $user = new User();

        $data = array(
            "title" => "Users",
            "userdata" => $this->session->userdata,
            "active_menu" => "user",
            "active_sub_menu" => "list_user",
            "users" => $user->list_all()
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/users/list_users.php");
        $this->load->view("admin/template/footer");
    }

    function add() {
        $this->load->model("User");
        $user = new User();

        $data = array(
            "titulo" => "Cadastro de usuário",
            "userdata" => $this->session->userdata,
            "active_menu" => "user",
            "active_sub_menu" => "cadastroUser",
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/users/form_users.php");
        $this->load->view("admin/template/footer");
    }

    function insert() {
        $this->load->model('User');

        $user = new User();
        $user->from_post($_POST);

        if($user->validate())
        {
            if($user->validate_senha($this->input->post('confirmacao_senha')))
            {
                $user->encrypt_senha();
                
                $user->save();
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