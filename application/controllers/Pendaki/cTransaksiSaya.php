<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiSaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiSaya');
    }

    public function index()
    {
        $data = array(
            'transaksi_sewa' => $this->mTransaksiSaya->transaksi_sewa(),
            'transaksi_boking' => $this->mTransaksiSaya->transaksi_boking()
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vTransaksiSaya', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function detail_sewa($id)
    {
        $data = array(
            'detail' => $this->mTransaksiSaya->detail_sewa($id),
            'detail_boking' => $this->mTransaksiSaya->detail_boking($id)
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vDetailSewa', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function detail_boking($id)
    {
        $data = array(
            'detail' => $this->mTransaksiSaya->detail_boking($id)
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vDetailBoking', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function bayar_dp_boking($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_boking($id)
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailBoking', $data);
            $this->load->view('Pendaki/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'stat_pem_dp' => $this->input->post('total'),
                'bukti_pem_dp' => $upload_data['file_name'],
            );
            $this->mTransaksiSaya->bayar($id, $data);
            redirect('pendaki/cTransaksiSaya/detail_boking/' . $id, 'refresh');
        }
    }
    public function bayar_all_boking($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_boking($id)
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailBoking', $data);
            $this->load->view('Pendaki/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'stat_pem_all' => $this->input->post('total'),
                'bukti_pem_all' => $upload_data['file_name'],
            );
            $this->mTransaksiSaya->bayar($id, $data);
            redirect('pendaki/cTransaksiSaya/detail_boking/' . $id, 'refresh');
        }
    }
    public function bayar_dp_sewa($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_boking($id)
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailBoking', $data);
            $this->load->view('Pendaki/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'stat_pem_dp_sewa' => $this->input->post('total'),
                'bukti_pem_dp_sewa' => $upload_data['file_name'],
            );
            $this->mTransaksiSaya->bayar_sewa($id, $data);
            redirect('pendaki/cTransaksiSaya/detail_sewa/' . $id, 'refresh');
        }
    }
    public function bayar_all_sewa($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_boking($id)
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailBoking', $data);
            $this->load->view('Pendaki/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'stat_pem_all_sewa' => $this->input->post('total'),
                'bukti_pem_all_sewa' => $upload_data['file_name'],
            );
            $this->mTransaksiSaya->bayar_sewa($id, $data);
            redirect('pendaki/cTransaksiSaya/detail_sewa/' . $id, 'refresh');
        }
    }

    public function invoice($id)
    {
        $data = array(
            'detail' => $this->mTransaksiSaya->detail_sewa($id),
            'detail_boking' => $this->mTransaksiSaya->detail_boking($id)
        );
        $this->load->view('Pendaki/vInvoice', $data);
    }
}

/* End of file cTransaksiSaya.php */
