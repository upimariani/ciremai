<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mSewaAlat extends CI_Model
{
    //transaksi
    public function insert_transaksi($data)
    {
        $this->db->insert('sewa_alat', $data);
    }
    public function detail_transaksi($data)
    {
        $this->db->insert('detail_sewa', $data);
    }
    public function cek_id_sewa()
    {
        return $this->db->query("SELECT MAX(id_sewa) as id FROM `sewa_alat`")->row();
    }
}

/* End of file mSewaAlat.php */
