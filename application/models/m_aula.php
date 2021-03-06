<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_aula extends CI_Model
{
    var $table      = 'tbl_aula'; /*Tabel Aula*/

    public function get_data($limit, $start)
    {
        $this->db->order_by('Create_at', 'DESC');

        return $this->db->get($this->table, $limit, $start)->result();
    }

    public function get_data_key($limit, $start, $where)
    {
        $this->db->where($where);
        $this->db->order_by('Create_at', 'DESC');
        return $this->db->get($this->table, $limit, $start)->result();
    }
}
