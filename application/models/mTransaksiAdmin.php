<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiAdmin extends CI_Model
{
    public function transaksi_sewa()
    {
        $this->db->select('*');
        $this->db->from('sewa_alat');
        $this->db->join('pendaki', 'sewa_alat.id_pendaki = pendaki.id_pendaki', 'left');
        return $this->db->get()->result();
    }

    public function transaksi_boking()
    {
        $this->db->select('*');
        $this->db->from('boking_jasa');
        $this->db->join('pendaki', 'pendaki.id_pendaki = boking_jasa.id_pendaki', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mTransaksiAdmin.php */
