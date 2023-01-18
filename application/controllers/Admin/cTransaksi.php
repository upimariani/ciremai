<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mTransaksiAdmin');
        $this->load->model('mTransaksiSaya');
    }

    //sewa alat
    public function sewa()
    {
        $data = array(
            'transaksi' => $this->mTransaksiAdmin->transaksi_sewa()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/SewaAlat/vSewa', $data);
        $this->load->view('Admin/Layout/footer');
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
    public function detail_sewa($id)
    {
        $data = array(
            'detail' => $this->mTransaksiSaya->detail_sewa($id),
            'jasa' => $this->mTransaksiSaya->detail_boking($id)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/SewaAlat/vDetailSewa', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function konfirmasi_sewa($id)
    {
        $data = array(
            'status_sewa' => '1'
        );
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);
        $this->session->set_flashdata('success', 'Sewa Alat Berhasil Dikonfirmasi!!!');

        redirect('Admin/cTransaksi/sewa');
    }
    public function selesai_sewa($id)
    {

        $data = array(
            'status_sewa' => '2'
        );

        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);


        $detail_boking = $this->mTransaksiSaya->detail_boking($id);
        foreach ($detail_boking['boking'] as $key => $value) {
            $data_detail = array(
                'tgl_selesai' => date('Y-m-d')
            );
            $this->db->where('id_detail', $value->id_detail);
            $this->db->update('detail_boking', $data_detail);
        }

        $detail_sewa = $this->mTransaksiSaya->detail_sewa($id);
        foreach ($detail_sewa['sewa'] as $key => $value) {
            $data_detail = array(
                'tgl_selesai_sewa' => date('Y-m-d')
            );
            $this->db->where('id_detail_sewa', $value->id_detail_sewa);
            $this->db->update('detail_sewa', $data_detail);
        }
        $this->session->set_flashdata('success', 'Transaksi Sewa Telah Selesai!!!');
        redirect('Admin/cTransaksi/sewa');
    }
    public function stat_jaminan_menerima($id)
    {
        $data = array(
            'stat_jaminan' => '1'
        );
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);
        $this->session->set_flashdata('success', 'Admin menerima Jaminan KTP Pendaki!!!');
        redirect('Admin/cTransaksi/sewa');
    }
    public function dikembalikan($id)
    {
        $data = array(
            'stat_jaminan' => '2'
        );
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);
        $this->session->set_flashdata('success', 'Admin telah mengembalikan Jaminan KTP Pendaki!!!');
        redirect('Admin/cTransaksi/sewa');
    }



    // //boking
    // public function boking()
    // {
    //     $data = array(
    //         'transaksi' => $this->mTransaksiAdmin->transaksi_boking()
    //     );
    //     $this->load->view('Admin/Layout/head');
    //     $this->load->view('Admin/Layout/navbar');
    //     $this->load->view('Admin/Layout/aside');
    //     $this->load->view('Admin/BokingJasa/vBoking', $data);
    //     $this->load->view('Admin/Layout/footer');
    // }
    // public function detail_boking($id)
    // {
    //     $data = array(
    //         'detail' => $this->mTransaksiSaya->detail_boking($id)
    //     );
    //     $this->load->view('Admin/Layout/head');
    //     $this->load->view('Admin/Layout/navbar');
    //     $this->load->view('Admin/Layout/aside');
    //     $this->load->view('Admin/BokingJasa/vDetailBoking', $data);
    //     $this->load->view('Admin/Layout/footer');
    // }
    // public function konfirmasi_boking($id)
    // {
    //     $data = array(
    //         'status_pendakian' => '1'
    //     );
    //     $this->db->where('id_boking', $id);
    //     $this->db->update('boking_jasa', $data);
    //     $this->session->set_flashdata('success', 'Boking Jasa Berhasil Dikonfirmasi!!!');
    //     redirect('Admin/cTransaksi/boking');
    // }
    // public function selesai_boking($id)
    // {
    //     $data = array(
    //         'status_pendakian' => '2'
    //     );

    //     $this->db->where('id_boking', $id);
    //     $this->db->update('boking_jasa', $data);

    //     $detail_boking = $this->mTransaksiSaya->detail_boking($id);
    //     foreach ($detail_boking['boking'] as $key => $value) {
    //         $data_detail = array(
    //             'tgl_selesai' => date('Y-m-d')
    //         );
    //         $this->db->where('id_detail', $value->id_detail);
    //         $this->db->update('detail_boking', $data_detail);
    //     }
    //     $this->session->set_flashdata('success', 'Transaksi Boking Telah Selesai!!!');
    //     redirect('Admin/cTransaksi/boking');
    // }
}

/* End of file cTransaksi.php */
