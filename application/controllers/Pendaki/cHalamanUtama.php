<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHalamanUtama extends CI_Controller
{

    public function index()
    {
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vHalamanUtama');
        $this->load->view('Pendaki/Layout/footer');
    }
}

/* End of file cHalamanUtama.php */
