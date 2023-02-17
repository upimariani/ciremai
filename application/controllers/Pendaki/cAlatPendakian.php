<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAlatPendakian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAlat');
        $this->load->model('mSewaAlat');
        $this->load->model('mCheckout');
    }


    public function index()
    {
        $data = array(
            'alat' => $this->mAlat->select()
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vInformasiAlatPendakian', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function addtocart()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'sisa' => $this->input->post('sisa')
        );
        $this->cart->insert($data);
        redirect('pendaki/calatpendakian');
    }
    public function deletecart($id)
    {
        $this->cart->remove($id);
        redirect('pendaki/calatpendakian');
    }
    public function checkout_alat()
    {
        $data = array(
            'jasa' => $this->mCheckout->jasa(),
            'error' => ' '
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vCheckoutAlat', $data);
        $this->load->view('Pendaki/Layout/footer');
    }
    public function checkout_ok()
    {
        $tgl_skrng = date('Y-m-d');
        $tgl_rencana = $this->input->post('date');
        // echo $tgl_skrng;
        // echo '<br>';
        // echo $tgl_rencana;
        // echo '<br>';

        if ($tgl_skrng <= $tgl_rencana) {
            // echo 'yes';

            $config['upload_path'] = './asset/jaminan';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '500000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('jaminan')) {
                $data = array(
                    'jasa' => $this->mCheckout->jasa(),
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('Pendaki/Layout/head');
                $this->load->view('Pendaki/Layout/nav');
                $this->load->view('Pendaki/vCheckoutAlat', $data);
                $this->load->view('Pendaki/Layout/footer');
            } else {
                $upload_data = $this->upload->data();
                //cek ketersediaan porter
                $porter = $this->input->post('porter');
                $guide = $this->input->post('guide');
                $tgl = $this->input->post('date');

                if ($porter == '') {
                    $cek_guide = $this->mCheckout->cek_ketersediaan($tgl, $guide);
                } else if ($guide == '') {
                    $cek_porter = $this->mCheckout->cek_ketersediaan($tgl, $porter);
                } else {
                    $cek = $this->mCheckout->cek($tgl, $guide, $guide);
                }


                if ($cek_porter) {
                    $this->session->set_flashdata('error', 'Porter Sudah Ada Yang Boking!!!');
                    redirect('Pendaki/cAlatPendakian/checkout_alat');
                } else if ($cek_guide) {
                    $this->session->set_flashdata('error', 'Guide Sudah Ada Yang Boking!!!');
                    redirect('Pendaki/cAlatPendakian/checkout_alat');
                } else  if ($cek) {
                    $this->session->set_flashdata('error', 'Guide dan Porter Sudah Ada Yang Boking!!!');
                    redirect('Pendaki/cAlatPendakian/checkout_alat');
                } else {
                    //data transaksi sewa alat

                    $total = 0;
                    $cart = $this->cart->total();
                    $jml = $this->input->post('jml');
                    //perhitungan total pembayaran guide porter + tiket pendakian
                    $total = ($jml * 50000) + $cart;

                    //perhitungan guide dan porter
                    $harga_guide = $this->input->post('harga_guide');
                    $harga_porter = $this->input->post('harga_porter');

                    $total = $total + $harga_porter + $harga_guide;
                    $data = array(
                        'id_pendaki' => $this->session->userdata('id'),
                        'tgl_sewa' => date('Y-m-d'),
                        'jml_pendaki' => $this->input->post('jml'),
                        'total_sewa' => $total,
                        'status_sewa' => 0,
                        'stat_pem_dp_sewa' => 0,
                        'stat_pem_all_sewa' => 0,
                        'bukti_pem_dp_sewa' => 0,
                        'bukti_pem_all_sewa' => 0,
                        'jaminan' => $upload_data['file_name']
                    );
                    $this->mSewaAlat->insert_transaksi($data);


                    $id_sewa = $this->mSewaAlat->cek_id_sewa();
                    foreach ($this->cart->contents() as $key => $value) {
                        $data_detail = array(
                            'id_sewa' => $id_sewa->id,
                            'id_alat' => $value['id'],
                            'tgl_rencana_sewa' => $this->input->post('date'),
                            'tgl_selesai_sewa' => '0',
                            'jml_sewa' => $value['qty']
                        );
                        $this->mSewaAlat->detail_transaksi($data_detail);
                    }


                    if ($porter != 0) {
                        $data_porter = array(
                            'id_sewa' => $id_sewa->id,
                            'id_jasa' => $porter,
                            'jml' => '1',
                            'tgl_rencana' => $this->input->post('date'),
                            'tgl_selesai' => '0'
                        );
                        $this->db->insert('detail_boking', $data_porter);
                    }
                    if ($guide != 0) {
                        $data_guide = array(
                            'id_sewa' => $id_sewa->id,
                            'id_jasa' => $guide,
                            'jml' => '1',
                            'tgl_rencana' => $this->input->post('date'),
                            'tgl_selesai' => '0'
                        );
                        $this->db->insert('detail_boking', $data_guide);
                    }

                    $this->cart->destroy();
                    redirect('pendaki/chalamanutama');
                }
            }
        } else {
            echo 'no';
            $this->session->set_flashdata('error', 'Tanggal Sudah Terlewatkan!!!');
            redirect('Pendaki/cAlatPendakian/checkout_alat');
        }
    }
}

/* End of file cAlatPendakian.php */
