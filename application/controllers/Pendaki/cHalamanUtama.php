<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHalamanUtama extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mHalamanUtama');
    }


    public function index()
    {
        $data = array(
            'informasi' => $this->db->query("SELECT * FROM `jasa`")->result()
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vHalamanUtama', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function informasi()
    {
        $jasa = $this->input->post('jasa');
        $tanggal = $this->input->post('date');
        $query = $this->mHalamanUtama->informasi($jasa, $tanggal);
        // echo $jasa;
        // echo '<br>';
        // echo $tanggal;
        if ($query) {
            $this->session->set_flashdata('error', 'Pesanan Guide atau Porter tersebut memiliki Status dalam Proses Boking!!!');
            redirect('Pendaki/cHalamanUtama');
        } else {
            $this->session->set_flashdata('success', 'Guide atau Porter tersebut Tersedia!!!');
            redirect('Pendaki/cHalamanUtama');
        }
        // if ($query) {
        //     $this->session->set_flashdata('error', 'Pesanan Guide atau Porter tersebut memiliki Status dalam Proses Boking!!!');
        //     redirect('Pendaki/cHalamanUtama');
        // } else {
        //     $this->session->set_flashdata('success', 'Guide atau Porter tersebut Tersedia!!!');
        //     redirect('Pendaki/cHalamanUtama');
        // }
    }
}

/* End of file cHalamanUtama.php */
