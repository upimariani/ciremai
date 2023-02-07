<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mCheckout extends CI_Model
{
    public function jasa()
    {
        $data['porter'] = $this->db->query("SELECT * FROM `jasa` WHERE status_jasa='0' AND type_jasa='1'")->result();
        $data['guide'] = $this->db->query("SELECT * FROM `jasa` WHERE status_jasa='0' AND type_jasa='2'")->result();
        return $data;
    }
    public function cek_ketersediaan($date, $id_jasa)
    {
        return $this->db->query("SELECT * FROM `detail_boking` WHERE tgl_rencana='" . $date . "' AND id_jasa='" . $id_jasa . "' AND tgl_selesai='0'")->row();
    }
    public function cek($date, $id_guide, $id_porter)
    {
        return $this->db->query("SELECT * FROM `detail_boking` WHERE tgl_rencana='" . $date . "' AND id_jasa IN (" . $id_guide . "," . $id_porter . ") AND tgl_selesai='0';")->row();
    }
}

/* End of file mCheckout.php */
