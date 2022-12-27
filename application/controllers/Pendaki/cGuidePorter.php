<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cGuidePorter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mJasa');
        $this->load->model('mGuidePorter');
    }

    public function index()
    {
        $data = array(
            'jasa' => $this->mJasa->select()
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vInformasiGuidePorter', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function addtocart()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'type' => $this->input->post('type'),
        );
        $this->cart->insert($data);
        redirect('pendaki/cguideporter');
    }
    public function deletecart($id)
    {
        $this->cart->remove($id);
        redirect('pendaki/cguideporter');
    }
    public function checkout()
    {
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vCheckoutGuidePorter');
        $this->load->view('Pendaki/Layout/footer');
    }
    public function checkout_ok()
    {
        //isi data transaksi boking
        $total = 0;
        $cart = $this->cart->total();
        $jml = $this->input->post('jml');
        //perhitungan total pembayaran guide porter + tiket pendakian
        $total = ($jml * 50000) + $cart;

        $data = array(
            'id_pendaki' => $this->session->userdata('id'),
            'tgl_boking' => date('Y-m-d'),
            'jml_pendaki' => $this->input->post('jml'),
            'total_bayar' => $total,
            'status_pendakian' => '0',
            'stat_pem_dp' => '0',
            'stat_pem_all' => '0',
            'bukti_pem_dp' => '0',
            'bukti_pem_all' => '0',
        );
        $this->mGuidePorter->insert_boking($data);


        $id_boking = $this->mGuidePorter->cek_id_boking();
        foreach ($this->cart->contents() as $key => $value) {
            $data_detail = array(
                'id_boking' => $id_boking->id,
                'id_jasa' => $value['id'],
                'jml' => $value['qty'],
                'tgl_rencana' => $this->input->post('date'),
                'tgl_selesai' => '0'
            );
            $this->mGuidePorter->insert_detail_boking($data_detail);
        }
        $this->cart->destroy();
        redirect('pendaki/chalamanutama');
    }
}

/* End of file cGuidePorter.php */
