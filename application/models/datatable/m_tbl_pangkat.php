<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_tbl_pangkat extends CI_Model
{
    var $table = 'tbl_data_pegawai'; //nama tabel dari database
    var $column_order = []; //field yang ada di table user
    var $column_search = ["Nama", "Nip", "", "", "", "No_Hp"]; //field yang diizin untuk pencarian 
    var $order = ['Nama' => 'ASC']; // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($Where)
    {

        $this->db->from($this->table);

        if ($Where["Status"] != "") {
            $this->db->where('DATEDIFF(DATE_ADD(Pangkat_Terakhir, INTERVAL ' . $Where["Pangkat_Berikutnya"] . ' YEAR), CURDATE()) ' . $Where["Status"] . '');
        }

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

    function get_datatables($Where)
    {
        $this->db->select('*');
        $this->db->select('DATE_ADD(Pangkat_Terakhir, INTERVAL ' . $Where["Pangkat_Berikutnya"] . ' YEAR) AS Pangkat_Berikutnya');
        $this->db->select('DATEDIFF(DATE_ADD(Pangkat_Terakhir, INTERVAL ' . $Where["Pangkat_Berikutnya"] . ' YEAR), CURDATE()) AS Delay');
        $this->_get_datatables_query($Where);

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($Where)
    {
        $this->_get_datatables_query($Where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
