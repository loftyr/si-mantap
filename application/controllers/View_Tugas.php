<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View_Tugas extends CI_Controller
{

    /**
     *Create By : Ai
     *Tanggal   : 25-Oktober-2021
     *
     */

    function __construct()
    {
        parent::__construct();
        $this->tbl = "tbl_tugas";
    }

    public function index($UID = "")
    {
        /** Data Header */
        $dataheader['Judul']    = "Lihat Tugas";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Tugas']    = "active";
        $dataheader["_uri"]     = "";

        /** Data Footer */
        $datafooter['Js']       = ""; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "";

        if ($UID != "") {
            $datacontent["Data"]    = $this->db->get_where($this->tbl, ["UID" => $UID])->result_array();

            if (count($datacontent["Data"]) > 0) {
                $datacontent["Status"]  = "True";
                $datacontent["Message"] = "";
            } else {
                $datacontent["Status"] = "False";
                $datacontent["Message"] = "Data Tidak Ditemukan";
            }
        } else {
            $datacontent["Status"] = "False";
            $datacontent["Message"] = "UID Tidak Ditemukan";
        }

        $this->load->view('templates/header', $dataheader); // Header
        $this->load->view('v_view_tugas', $datacontent); // Content
        $this->load->view('templates/footer', $datafooter); // Footer
    }
}
