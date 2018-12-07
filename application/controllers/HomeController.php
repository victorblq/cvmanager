<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index() {
        $data = [];
        
		$this->load->view('front/template/header', $data);
		$this->load->view('front/home/home');
		$this->load->view('front/template/footer');
    }
}
