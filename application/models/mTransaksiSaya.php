<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiSaya extends CI_Model
{
    public function transaksi_sewa()
    {
        $this->db->select('*');
        $this->db->from('sewa_alat');
        $this->db->join('pendaki', 'sewa_alat.id_pendaki = pendaki.id_pendaki', 'left');
        $this->db->where('sewa_alat.id_pendaki', $this->session->userdata('id'));
        return $this->db->get()->result();
    }
    public function transaksi_boking()
    {
        $this->db->select('*');
        $this->db->from('boking_jasa');
        $this->db->join('pendaki', 'boking_jasa.id_pendaki = pendaki.id_pendaki', 'left');
        $this->db->where('boking_jasa.id_pendaki', $this->session->userdata('id'));
        return $this->db->get()->result();
    }

    public function detail_sewa($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `sewa_alat` JOIN pendaki ON sewa_alat.id_pendaki=pendaki.id_pendaki WHERE id_sewa='" . $id . "'")->row();
        $data['sewa'] = $this->db->query("SELECT * FROM `sewa_alat` JOIN detail_sewa ON sewa_alat.id_sewa=detail_sewa.id_sewa JOIN alat ON alat.id_alat=detail_sewa.id_alat WHERE sewa_alat.id_sewa='" . $id . "'")->result();
        return $data;
    }
    public function detail_boking($id)
    {
        $data['transaksi'] = $this->db->query("SELECT * FROM `boking_jasa` JOIN pendaki ON boking_jasa.id_pendaki=pendaki.id_pendaki WHERE boking_jasa.id_boking='" . $id . "'")->row();
        $data['boking'] = $this->db->query("SELECT * FROM `sewa_alat` JOIN detail_boking ON sewa_alat.id_sewa=detail_boking.id_sewa JOIN jasa ON jasa.id_jasa=detail_boking.id_jasa WHERE sewa_alat.id_sewa='" . $id . "'")->result();
        return $data;
    }
    public function bayar($id, $data)
    {
        $this->db->where('id_boking', $id);
        $this->db->update('boking_jasa', $data);
    }
    public function bayar_sewa($id, $data)
    {
        $this->db->where('id_sewa', $id);
        $this->db->update('sewa_alat', $data);
    }
}

/* End of file mTransaksiSaya.php */
