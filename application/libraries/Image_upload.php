<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_upload {

    protected $CI;

    public function __construct($rules = array())
	{
        $this->CI =& get_instance();

        $this->CI->load->library('upload');
    }

    public function upload($path, $name, $field_name, $files){
        $name = $name . '.' . explode('/', $files[$field_name]['type'])[1];

        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 4096;
        $config['override']             = FALSE;

        $this->CI->upload->initialize($config);
        
        $_FILES = [];
        $_FILES['img']['name']       = $name;
        $_FILES['img']['type']       = $files[$field_name]['type'];
        $_FILES['img']['tmp_name']   = $files[$field_name]['tmp_name'];
        $_FILES['img']['error']      = $files[$field_name]['error'];
        $_FILES['img']['size']       = $files[$field_name]['size'];    

        $this->CI->upload->do_upload('img');
        echo $this->CI->upload->display_errors();
        return $this->CI->upload->data()['file_name'];
    }
}