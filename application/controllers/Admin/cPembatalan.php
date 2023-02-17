<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPembatalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiAdmin');
    }


    public function pembatalan()
    {
        $data = array(
            'transaksi' => $this->mTransaksiAdmin->transaksi_sewa()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/SewaAlat/vPembatalan', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function pembatalan_boking()
    {
        $data = array(
            'transaksi' => $this->mTransaksiAdmin->transaksi_boking()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Boking/vPembatalan', $data);
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cPembatalan.php */
