<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class User extends CI_Model 
{
    private $table_name = "users";
    
    public $id;
    public $name;
    public $username;
    public $password;
    public $email;
    
    function validate() {
        return $this->name != null && $this->username != null && $this->password != null;
    }

    function validate_password($confirm_password) {
        return $this->password === $confirm_password && strlen($this->password) >= 6;
    }

    function encryptpassword() {
        $this->password = $this->encryption->encrypt($this->password);
    }

    function login() {
        $this->db->where("username", $this->username);
        $user = $this->db->get($this->table_name)->result();

        $user = count($user) != 0 ? $user[0] : null;
        
        var_dump($this);
        if($user == null) {
            show_error("Incorrect user or password", 400, 'Erro');
            return;
        }
        if($this->encryption->decrypt($user->password) != $this->password ) {
            show_error("Incorrect user or password", 400, 'Erro');
            return;
        }
        
        //Bypass de autenticação
        // $user = new user();
        // $user->id = 0;
        // $user->name = "teste";
        // $user->username = "teste";

        $this->session->userdata = array(
            "id" => $user->id,
            "name" => $user->name,
            "username" => $user->username
        );
    }

    function list_all() {
        return $this->db->get($this->table_name)->result();
    }

    function save() {
        if($this->id != null) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    function insert() {
        $this->db->insert($this->table_name, $this->to_db());
    }

    function to_db() {
        return array(
            "name" => $this->name,
            "username" => $this->username,
            "password" => $this->password,
            "email" => $this->email
        );
    }

    function from_post($post) {
        $this->id = isset($post["id"]) && $post["id"] != '' ? $post["id"] : null;
        $this->name = isset($post["name"]) && $post["name"] != '' ? $post["name"] : null;
        $this->username = isset($post["username"]) && $post["username"] != '' ? $post["username"] : null;
        $this->password = isset($post["password"]) && $post["password"] != '' ? $post["password"] : null;
        $this->email = isset($post["email"]) && $post["email"] != '' ? $post["email"] : null;
    }
}