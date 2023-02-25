<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDataMaster extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mUser');
        $this->load->model('mJasa');
        $this->load->model('mAlat');
    }


    //kelola user

    public function user()
    {
        $data = array(
            'user' => $this->mUser->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/User/vUser', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createuser()
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'jk' => $this->input->post('jk'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level')
        );
        $this->mUser->insert($data);
        $this->session->set_flashdata('success', 'Data User Berhasil Ditambahkan!');
        redirect('Admin/cDataMaster/user', 'refresh');
    }
    public function updateuser($id)
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'jk' => $this->input->post('jk'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level')
        );
        $this->mUser->update($id, $data);
        $this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
        redirect('Admin/cDataMaster/user', 'refresh');
    }
    public function delete($id)
    {
        $this->mUser->delete($id);
        $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
        redirect('Admin/cDataMaster/user', 'refresh');
    }

    //kelola jasa
    public function jasa()
    {
        $data = array(
            'jasa' => $this->mJasa->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Jasa/vJasa', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createjasa()
    {
        $config['upload_path']          = './asset/FOTO-JASA';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'jasa' => $this->mJasa->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/navbar');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/Jasa/vJasa', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_jasa' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'jumlah' => $this->input->post('jumlah'),
                'status_jasa' => '0',
                'type_jasa' => $this->input->post('type'),
                'foto' => $upload_data['file_name'],
            );
            $this->mJasa->insert($data);
            $this->session->set_flashdata('success', 'Data Jasa Berhasil Ditambahkan!');
            redirect('Admin/cDataMaster/jasa', 'refresh');
        }
    }
    public function updatejasa($id)
    {
        $config['upload_path']          = './asset/FOTO-JASA';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'jasa' => $this->mJasa->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/navbar');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/Jasa/vJasa', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_jasa' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'jumlah' => $this->input->post('jumlah'),
                'status_jasa' => '0',
                'type_jasa' => $this->input->post('type'),
                'foto' => $upload_data['file_name'],
            );
            $this->mJasa->update($id, $data);
            $this->session->set_flashdata('success', 'Data Jasa Berhasil Diperbaharui!');
            redirect('Admin/cDataMaster/jasa', 'refresh');
        }
        $data = array(
            'nama_jasa' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'status_jasa' => '0',
            'type_jasa' => $this->input->post('type')
        );
        $this->mJasa->update($id, $data);
        $this->session->set_flashdata('success', 'Data Jasa Berhasil Diperbaharui!');
        redirect('Admin/cDataMaster/jasa', 'refresh');
    }
    public function deletejasa($id)
    {
        $this->mJasa->delete($id);
        $this->session->set_flashdata('success', 'Data Jasa Berhasil Dihapus!');
        redirect('Admin/cDataMaster/jasa', 'refresh');
    }

    //kelola data alat
    public function alat()
    {
        $data = array(
            'alat' => $this->mAlat->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/navbar');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Alat/valat', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function createalat()
    {
        $config['upload_path']          = './asset/FOTO-ALAT';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'alat' => $this->mAlat->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/navbar');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/Alat/valat', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_alat' => $this->input->post('nama'),
                'harga_sewa' => $this->input->post('harga'),
                'stok_alat' => $this->input->post('jumlah'),
                'sisa_alat' => $this->input->post('jumlah'),
                'gambar' => $upload_data['file_name'],
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->mAlat->insert($data);
            $this->session->set_flashdata('success', 'Data Alat Pendakian Berhasil Ditambahkan!');
            redirect('Admin/cDataMaster/alat', 'refresh');
        }
    }
    public function updatealat($id)
    {
        $config['upload_path']          = './asset/FOTO-ALAT';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data = array(
                'alat' => $this->mAlat->select()
            );
            $this->load->view('Admin/Layout/head');
            $this->load->view('Admin/Layout/navbar');
            $this->load->view('Admin/Layout/aside');
            $this->load->view('Admin/Alat/valat', $data);
            $this->load->view('Admin/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                'nama_alat' => $this->input->post('nama'),
                'harga_sewa' => $this->input->post('harga'),
                'stok_alat' => $this->input->post('jumlah'),
                'sisa_alat' => $this->input->post('jumlah'),
                'gambar' => $upload_data['file_name'],
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->mAlat->update($id, $data);
            $this->session->set_flashdata('success', 'Data Alat Pendakian Berhasil Diperbaharui!');
            redirect('Admin/cDataMaster/alat', 'refresh');
        } //tanpa ganti gambar
        $data = array(
            'nama_alat' => $this->input->post('nama'),
            'harga_sewa' => $this->input->post('harga'),
            'stok_alat' => $this->input->post('jumlah'),
            'sisa_alat' => $this->input->post('jumlah'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->mAlat->update($id, $data);
        $this->session->set_flashdata('success', 'Data Alat Pendakian Berhasil Diperbaharui!');
        redirect('Admin/cDataMaster/alat', 'refresh');
    }
    public function deletealat($id)
    {
        $this->mAlat->delete($id);
        $this->session->set_flashdata('success', 'Data Alat Pendakian Berhasil Dihapus!');
        redirect('Admin/cDataMaster/alat', 'refresh');
    }
}

/* End of file cUser.php */
