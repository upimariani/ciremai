<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mGuidePorter extends CI_Model
{
    public function insert_boking($data)
    {
        $this->db->insert('boking_jasa', $data);
    }
    public function insert_detail_boking($data)
    {
        $this->db->insert('detail_boking', $data);
    }
    public function cek_id_boking()
    {
        return $this->db->query("SELECT MAX(id_boking) as id FROM `boking_jasa`")->row();
    }
}

/* End of file mGuidePorter.php */
