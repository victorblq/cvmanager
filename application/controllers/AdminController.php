<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        ob_start();
    }

	public function index()
	{
        if(isset($this->session->userdata["id"]))
        {
            $this->adminHome();
        }
        else
        {
            $this->load->view("admin/login/login");
        }
    }

    public function adminHome()
    {
        $data = array(
            "titulo" => "Dashboard",
            "userdata" => $this->session->userdata,
            "activeMenu" => "",
            "activeSubMenu" => ""
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/home/admin-home");
        $this->load->view("admin/template/footer");
    }

    public function personalizar()
    {
        $this->load->model("SiteInfo");

        $siteInfo = new SiteInfo();

        $data = array(
            "titulo" => "Personalizar",
            "userdata" => $this->session->userdata,
            "activeMenu" => "personalizar",
            "activeSubMenu" => "",
            "siteInfo" => $siteInfo->getSiteInfo()
        );

        $this->load->view("admin/template/header", $data);
        $this->load->view("admin/template/sidebar");
        $this->load->view("admin/personalizar/personalizar");
        $this->load->view("admin/template/footer");
    }

    public function updateSiteInfo()
    {
        $this->load->model("SiteInfo");

        $siteInfo = new SiteInfo();

        $siteInfo->fromPost($_POST);

        $siteInfo->update();
    }
    
    public function login()
    {
        $this->load->model("Usuario");

        $usuario = new Usuario();

        $usuario->login = $this->input->post("login");
        $usuario->senha = $this->input->post("senha");

        $usuario->login();
    }

    public function logout()
    {
        $this->load->driver('cache');  

        delete_cookie('ci_session');               
        $this->session->sess_destroy();
        $this->cache->clean();

        ob_clean();

        redirect("admin");
    }
}