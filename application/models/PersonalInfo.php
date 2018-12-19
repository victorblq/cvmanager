<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class PersonalInfo extends CI_Model {
    private $table_name = "personal_info";

    //Basic info
    public $image;
    public $title;
    public $subtitle;

    //About
    public $show_about_section;
    public $about1;
    public $about2;
    public $about3;

    //Contact
    public $show_contact_section;
    public $phone1;
    public $phone2;
    public $phone3;
    public $phone4;
    public $email1;
    public $email2;

    //References
    public $show_references_section;
    public $references1;
    public $references2;
    public $references3;
    public $references4;

    public function update(){
        $this->db->update($this->table_name, $this);
    }

    public function use_old_profile_img(){
        $saved_personal_info = $this->db->get($this->table_name)->result()[0];

        $this->image = $saved_personal_info->image;
    }

    public function from_post($post){
        $this->title = $post['title'];
        $this->subtitle = $post['subtitle'];

        $this->show_about_section = isset($post['show_about_section']) && $post['show_about_section'] == "on" ? 1 : 0;
        $this->about1 = $post['about1'];
        $this->about2 = $post['about2'];
        $this->about3 = $post['about3'];

        $this->show_contact_section = isset($post['show_contact_section']) && $post['show_contact_section'] == "on" ? 1 : 0;
        $this->phone1 = $post['phone1'];
        $this->phone2 = $post['phone2'];
        $this->phone3 = $post['phone3'];
        $this->phone4 = $post['phone4'];
        $this->email1 = $post['email1'];
        $this->email2 = $post['email2'];

        $this->show_references_section = isset($post['show_references_section']) && $post['show_references_section'] == "on" ? 1 : 0;
        $this->references1 = $post['references1'];
        $this->references2 = $post['references2'];
        $this->references3 = $post['references3'];
        $this->references4 = $post['references4'];
    }

    public function from_db(){
        return $this->db->get($this->table_name)->result()[0];
    }
}