<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalInfoController extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        ob_start();

        $this->load->model("PersonalInfo");
    }

	public function index() {
        if(isset($this->session->userdata["id"])) {
            $this->personal_info();
        } else {
            redirect("admin");
        }
    }

    public function personal_info(){
        $personal_info = new PersonalInfo();
        $personal_info = $personal_info->from_db();

        $data = array(
            "titulo" => "Personal Info",
            "userdata" => $this->session->userdata,
            "active_menu" => "personalinfo",
            "active_sub_menu" => "",
            "personal_info" => $personal_info
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/personal_info/form_personal_info");
        $this->load->view("admin/template/footer");
    }

    public function update(){
        $personal_info = new PersonalInfo();

        $personal_info->from_post($_POST);

        if($_FILES['profile_image']['name'] != ''){
            $personal_info->image = $this->image_upload->upload('uploads/img', 'profile', 'profile_image', $_FILES);
        }else{
            $personal_info->use_old_profile_img();
        }
        
        $personal_info->update();
    }
}