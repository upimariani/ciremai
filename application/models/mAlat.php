<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAlat extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('alat', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('alat');
        return $this->db->get()->result();
    }
    public function update($id, $data)
    {
        $this->db->where('id_alat', $id);
        $this->db->update('alat', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_alat', $id);
        $this->db->delete('alat');
    }
}

/* End of file mAlat.php */
