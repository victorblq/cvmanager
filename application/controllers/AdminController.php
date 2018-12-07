<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        ob_start();
    }

	public function index() {
        if(isset($this->session->userdata["id"])) {
            $this->admin_home();
        } else {
            $this->load->view("admin/login/login");
        }
    }

    public function admin_home() {
        $data = array(
            "titulo" => "Dashboard",
            "userdata" => $this->session->userdata,
            "active_menu" => "",
            "active_sub_menu" => ""
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/home/admin_home");
        $this->load->view("admin/template/footer");
    }
    
    public function login() {
        $this->load->model("User");
        $user = new User();

        $user->from_post($this->input->post());

        $user->login();
    }

    public function logout() {
        $this->load->driver('cache');  

        delete_cookie('ci_session');               
        $this->session->sess_destroy();
        $this->cache->clean();

        ob_clean();

        redirect("admin");
    }
}