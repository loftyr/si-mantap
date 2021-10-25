<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_base extends CI_Model
{
    // Get Data
    public function getData($select, $tbl)
    {
        // $select = "Kolom1, Kolom2, Kolom3";
        $this->db->select($select);
        // Return Array
        return $this->db->get($tbl)->result_array();
    }

    // Get Data with Condition
    public function getWhere($select, $tbl, $where)
    {
        // $select = "Kolom1, Kolom2, Kolom3";
        $this->db->select($select);
        $this->db->where($where);
        // Return Array
        return $this->db->get($tbl)->result_array();
    }

    // Save Data
    public function saveData($tbl, $data)
    {
        $query  = $this->db->insert($tbl, $data);
        //Return Boolean
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    // Save Data Batch
    public function saveDataBatch($tbl, $data)
    {
        $query  = $this->db->insert_batch($tbl, $data);
        //Return Boolean
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    // Save Perubahan Data
    public function saveEdit($tbl, $data, $where)
    {
        $query = $this->db->update($tbl, $data, $where);
        //Return Boolean
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }

    // Delete Data
    public function deleteData($tbl, $where)
    {
        // $where = ['Id' => $Id];
        $this->db->where($where);
        $query = $this->db->delete($tbl);
        // Return Boolean
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}
