<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cGuidePorter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mJasa');
        $this->load->model('mGuidePorter');
        $this->load->model('mCheckout');
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
        $data = array(
            'error' => ' '
        );
        $this->load->view('Pendaki/Layout/head');
        $this->load->view('Pendaki/Layout/nav');
        $this->load->view('Pendaki/vCheckoutGuidePorter', $data);
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
            $config['upload_path'] = './asset/jaminan';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']     = '500000';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('jaminan')) {
                $data = array(
                    'error' => ' '
                );
                $this->load->view('Pendaki/Layout/head');
                $this->load->view('Pendaki/Layout/nav');
                $this->load->view('Pendaki/vCheckoutGuidePorter', $data);
                $this->load->view('Pendaki/Layout/footer');
            } else {
                $upload_data = $this->upload->data();

                //cek ketersediaan porter dan guide
                $id_jasa = array();
                foreach ($this->cart->contents() as $key => $value) {
                    $id_jasa[] = $value['id'];
                    $type = $value['type'];
                    $nama = $value['name'];
                }

                // var_dump($id_jasa);
                $nama = array();
                $keputusan = array();
                for ($i = 0; $i < sizeof($id_jasa); $i++) {

                    $tgl = $this->input->post('date');
                    $cek_porter = $this->mCheckout->cek_ketersediaan($tgl, $id_jasa[$i]);
                    if ($cek_porter) {
                        $nama[] = $cek_porter->nama_jasa;
                        $keputusan[] = 'full';
                        // echo '<br>';
                        // echo 'full';
                    } else {
                        $keputusan[] = 'oke';
                        // echo '<br>';
                        // echo 'oke';
                    }
                }
                // var_dump($keputusan);

                // var_dump($nama);
                $save = 'sok';
                for ($a = 0; $a < sizeof($nama); $a++) {
                    echo '<br>';
                    // echo $keputusan[$a];
                    // if ($keputusan[$a] != 'full') {
                    //     echo '<br>';
                    //     echo 'simpan';
                    // } else {
                    //     echo '<br>';
                    //     echo 'gagal';
                    // }
                    $save = 'ulah';
                }
                if ($save == 'ulah') {
                    echo '<br> Nama yang gagal ';
                    for ($b = 0; $b < sizeof($nama); $b++) {

                        echo $nama[$b] . ' ';
                    }
                } else {
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
                        'total_boking' => $total,
                        'stat_boking' => '0',
                        'stat_pem_dp_boking' => '0',
                        'stat_pem_all_boking' => '0',
                        'bukti_pem_dp_boking' => '0',
                        'bukti_pem_all_boking' => '0',
                        'jaminan' => $upload_data['file_name'],
                        'stat_jaminan' => '0'
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
        } else {
            $this->session->set_flashdata('error', 'Tanggal Sudah Terlewatkan!!!');
            redirect('Pendaki/cGuidePorter/checkout');
        }
    }
}

/* End of file cGuidePorter.php */
