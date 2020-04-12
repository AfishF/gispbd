<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function login_check($username, $password)
    {
        $pass = sha1($password);
        $query = $this->db->query("SELECT * FROM user WHERE name='$username' AND password='$pass' LIMIT 1");
         
         return $query;
    }
    public function insert_user($data)
    {
 
        $insert = $this->db->insert('user', $data);
        if ($insert) {
           return $this->db->insert_id();
        } else {
            return false;
        }
    }
}
