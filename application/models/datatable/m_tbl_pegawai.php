<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_tbl_pegawai extends CI_Model
{
    var $table = 'tbl_data_pegawai A'; //nama tabel dari database
    var $column_order = array(); //field yang ada di table user
    var $column_search = array("A.Nama", "A.Nip", "", "A.Jk", "", "", "A.No_Hp", "B.Nama", "C.Nama"); //field yang diizin untuk pencarian 
    var $order = array('A.Nama' => 'ASC'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($Search)
    {
        $this->db->from($this->table);
        $this->db->join("tbl_unit_kerja B", "A.Kd_Unit = B.Kd_Unit", "LEFT");
        $this->db->join("tbl_jabatan C", "A.Kd_Jabatan = C.Kd_Jabatan", "LEFT");

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            $request = $_POST['columns'][$i]["search"]["value"];

            if ($request != "") {
                $this->db->like($item, $request);
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables($Search)
    {
        $this->db->select('A.*, B.Nama AS Unit_Kerja, C.Nama AS Jabatan');
        $this->_get_datatables_query($Search);

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($Search)
    {
        $this->_get_datatables_query($Search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
