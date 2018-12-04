<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	/**
     * 
     */
	public function index()
	{
        $this->load->model("SiteInfo");
        $siteInfo = new SiteInfo();
        
        $data = array(
            "siteInfo" => $siteInfo->getSiteInfo()
        );

		$this->load->view('front/template/header', $data);
		$this->load->view('front/home/home');
		$this->load->view('front/template/footer');
    }
}
