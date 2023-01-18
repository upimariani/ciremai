<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHalamanUtama extends CI_Model
{
    public function informasi($jasa, $tanggal)
    {
        $this->db->select('*');
        $this->db->from('detail_boking');
        $this->db->where(
            array(
                'id_jasa' => $jasa,
                'tgl_rencana' => $tanggal,
                'tgl_selesai' => '0'
            )
        );
        return $this->db->get()->row();
    }
}

/* End of file mHalamanUtama.php */
