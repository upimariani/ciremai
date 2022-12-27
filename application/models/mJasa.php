<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mJasa extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('jasa', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('jasa');
        return $this->db->get()->result();
    }
    public function update($id, $data)
    {
        $this->db->where('id_jasa', $id);
        $this->db->update('jasa', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_jasa', $id);
        $this->db->delete('jasa');
    }
}

/* End of file mJasa.php */
