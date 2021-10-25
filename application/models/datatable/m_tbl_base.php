<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_tbl_base extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($Table, $Search, $Where, $Order)
    {

        $this->db->from($Table);

        if (isset($Where)) {
            $this->db->where($Where);
        }

        $i = 0;

        foreach ($Search as $item) // looping awal
        {
            $request = $_POST['columns'][$i]["search"]["value"];

            if ($request != "") {
                $this->db->like($item, $request);
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($Order)) {
            $this->db->order_by(key($Order), $Order[key($Order)]);
        }
    }

    function get_datatables($Table, $Select, $Search, $Where, $Order)
    {
        $this->db->select($Select);
        $this->_get_datatables_query($Table, $Search, $Where, $Order);

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($Table, $Search, $Where, $Order)
    {
        $this->_get_datatables_query($Table, $Search, $Where, $Order);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($Table)
    {
        $this->db->from($Table);
        return $this->db->count_all_results();
    }
}
