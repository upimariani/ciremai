<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAuth');
    }

    public function index()
    {
        $this->load->view('Pendaki/vLogin');
    }
    public function register()
    {
        $this->load->view('Pendaki/vRegister');
    }
    public function signup()
    {
        $data = array(
            'nama_pendaki' => $this->input->post('nama'),
            'no_hp_pendaki' => $this->input->post('no_hp'),
            'alamat_pendaki' => $this->input->post('alamat'),
            'username_pendaki' => $this->input->post('username'),
            'password_pendaki' => $this->input->post('password'),
            'jk' => $this->input->post('jk')
        );
        $this->mAuth->register($data);
        $this->session->set_flashdata('success', 'Register pendaki berhasil, Silahkan melakukan Login!!!');
        redirect('pendaki/cauth');
    }
    public function signin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->mAuth->login($username, $password);
        if ($cek) {
            $id = $cek->id_pendaki;
            $nama = $cek->nama_pendaki;
            $no_hp = $cek->no_hp_pendaki;

            $array = array(
                'id' => $id,
                'nama' => $nama,
                'no_hp' => $no_hp
            );

            $this->session->set_userdata($array);
            redirect('pendaki/chalamanutama');
        } else {
            redirect('pendaki/cauth');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('no_hp');
        redirect('pendaki/cauth');
    }
}

/* End of file cAuth.php */
