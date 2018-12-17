<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalInfoController extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        ob_start();
    }

	public function index() {
        if(isset($this->session->userdata["id"])) {
            $this->list_personal_info();
        } else {
            redirect("admin");
        }
    }

    public function list_personal_info(){
        $data = array(
            "titulo" => "Personal Info",
            "userdata" => $this->session->userdata,
            "active_menu" => "personalinfo",
            "active_sub_menu" => ""
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/personal_info/personal_info");
        $this->load->view("admin/template/footer");
    }
}