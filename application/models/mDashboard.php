<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
    //perhitungan jasa porter dan guide
    public function jasa()
    {
        $data['porter'] = $this->db->query("SELECT * FROM `detail_boking` JOIN sewa_alat ON detail_boking.id_sewa=sewa_alat.id_sewa JOIN jasa ON jasa.id_jasa=detail_boking.id_jasa WHERE type_jasa='1'")->result();
        $data['jml_porter'] = $this->db->query("SELECT COUNT(sewa_alat.id_sewa) as jml_porter FROM `detail_boking` JOIN sewa_alat ON detail_boking.id_sewa=sewa_alat.id_sewa JOIN jasa ON jasa.id_jasa=detail_boking.id_jasa WHERE type_jasa='1'")->row();


        $data['guide'] = $this->db->query("SELECT * FROM `detail_boking` JOIN sewa_alat ON detail_boking.id_sewa=sewa_alat.id_sewa JOIN jasa ON jasa.id_jasa=detail_boking.id_jasa WHERE type_jasa='2';")->result();
        $data['jml_guide'] = $this->db->query("SELECT COUNT(sewa_alat.id_sewa) as jml_guide FROM `detail_boking` JOIN sewa_alat ON detail_boking.id_sewa=sewa_alat.id_sewa JOIN jasa ON jasa.id_jasa=detail_boking.id_jasa WHERE type_jasa='2';")->row();
        return $data;
    }

    public function alat()
    {
        $data['alat'] = $this->db->query("SELECT COUNT(id_detail_sewa) as jml_alat, detail_sewa.id_alat, nama_alat FROM `detail_sewa` JOIN sewa_alat ON detail_sewa.id_sewa=sewa_alat.id_sewa JOIN alat ON alat.id_alat=detail_sewa.id_alat GROUP BY detail_sewa.id_alat")->result();
        return $data;
    }
}

/* End of file mDashboard.php */
