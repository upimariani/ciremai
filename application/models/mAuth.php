<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAuth extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('pendaki', $data);
    }
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('pendaki');
        $this->db->where('username_pendaki', $username);
        $this->db->where('password_pendaki', $password);
        return $this->db->get()->row();
    }
}

/* End of file mAuth.php */
