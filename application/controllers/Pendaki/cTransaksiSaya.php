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
            // 'transaksi_boking' => $this->mTransaksiSaya->transaksi_boking()
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
            'detail_boking' => $this->mTransaksiSaya->detail_boking($id),
            'error' => ' '
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vDetailSewa', $data);
        $this->load->view('Pendaki/Layout/footer');
    }

    public function boking()
    {
        $data = array(
            // 'transaksi_sewa' => $this->mTransaksiSaya->transaksi_sewa(),
            'transaksi_boking' => $this->mTransaksiSaya->transaksi_boking()
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vTransaksiSayaBoking', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function detail_boking($id)
    {
        $data = array(
            'error' => ' ',
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
        $config['max_size']             = 500000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_boking($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailBoking', $data);
            $this->load->view('Pendaki/Layout/footer');
        } else {
            $jml_pembayaran = $this->input->post('total');
            $minimal = (40 / 100) * $jml_pembayaran;
            $dp = $this->input->post('total');
            if ($dp >= $minimal) {
                $upload_data = $this->upload->data();
                $data = array(
                    'stat_pem_dp_boking' => $this->input->post('total'),
                    'bukti_pem_dp_boking' => $upload_data['file_name'],
                );
                $this->mTransaksiSaya->bayar($id, $data);
                redirect('pendaki/cTransaksiSaya/detail_boking/' . $id, 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Pembayaran Kurang dari 40% dati total pembayaran!!!');
                redirect('pendaki/cTransaksiSaya/detail_boking/' . $id, 'refresh');
            }
        }
    }
    public function bayar_all_boking($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500000;

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
                'stat_pem_all_boking' => $this->input->post('total'),
                'bukti_pem_all_boking' => $upload_data['file_name'],
            );
            $this->mTransaksiSaya->bayar($id, $data);
            redirect('pendaki/cTransaksiSaya/detail_boking/' . $id, 'refresh');
        }
    }
    public function bayar_dp_sewa($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_sewa($id),
                'detail_boking' => $this->mTransaksiSaya->detail_boking($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailSewa', $data);
            $this->load->view('Pendaki/Layout/footer');
        } else {
            $jml_pembayaran = $this->input->post('jml_pembayaran');
            $minimal = (40 / 100) * $jml_pembayaran;
            $dp = $this->input->post('total');
            if ($dp >= $minimal) {
                $upload_data = $this->upload->data();
                $data = array(
                    'stat_pem_dp_sewa' => $this->input->post('total'),
                    'bukti_pem_dp_sewa' => $upload_data['file_name'],
                );
                $this->mTransaksiSaya->bayar_sewa($id, $data);
                redirect('pendaki/cTransaksiSaya/detail_sewa/' . $id, 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Pembayaran Kurang dari 40% dati total pembayaran!!!');
                redirect('pendaki/cTransaksiSaya/detail_sewa/' . $id, 'refresh');
            }
        }
    }
    public function bayar_all_sewa($id)
    {
        $config['upload_path']          = './asset/PEMBAYARAN';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bukti')) {
            $data = array(
                'detail' => $this->mTransaksiSaya->detail_sewa($id),
                'detail_boking' => $this->mTransaksiSaya->detail_boking($id),
                'error' => $this->upload->display_errors()
            );
            $this->load->view('Pendaki/Layout/head');
            $this->load->view('Pendaki/Layout/nav');
            $this->load->view('Pendaki/vDetailSewa', $data);
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
    public function invoice_boking($id)
    {
        $data = array(
            'detail' => $this->mTransaksiSaya->detail_boking($id)
        );
        $this->load->view('Pendaki/vInvoiceBoking', $data);
    }
    public function pembatalan($id)
    {
        $data = array(
            'uang_kembali' => $this->input->post('uang'),
            'norek' => $this->input->post('pembatalan'),
            'status_sewa' => '9'
        );
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);
        redirect('Pendaki/cTransaksiSaya');
    }
    public function pembatalan_boking($id)
    {
        $data = array(
            'uang_kembali' => $this->input->post('uang'),
            'norek' => $this->input->post('pembatalan'),
            'stat_boking' => '9'
        );
        $this->db->where('id_boking', $id);
        $this->db->update('boking', $data);
        redirect('Pendaki/cTransaksiSaya/boking');
    }
    public function jaminan_kembali($id)
    {
        $data = array(
            'stat_jaminan' => '2'
        );
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);
        redirect('Pendaki/cTransaksiSaya/detail_sewa/' . $id);
    }
}

/* End of file cTransaksiSaya.php */
