<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     *Create By : Lofty Razani
     *Tanggal   : 09-Oktober-2021
     *
     */

    function __construct()
    {
        parent::__construct();
        //Check Session
        sessionCheck();
        $this->pegawai = "tbl_data_pegawai";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Dashboard";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Dashboard']    = "active";
        $dataheader["_uri"] = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']       = "s_dashboard.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"] = "PortalAdmin";
        $datacontent["Total_PNS"] = $this->db->count_all_results($this->pegawai);
        $datacontent["Total_PNS_Pria"] = $this->db->where(["Jk" => "Laki-Laki"])->count_all_results($this->pegawai);
        $datacontent["Total_PNS_Wanita"] = $this->db->where(["Jk" => "Perempuan"])->count_all_results($this->pegawai);
        $datacontent["Total_Peg_Jab"] = $this->db->where(["Kd_Jabatan !=" => NULL])->count_all_results($this->pegawai);

        $this->db->select("A.*");
        $this->db->join($this->pegawai . " B", "A.Kd_Jabatan = B.Kd_Jabatan", "LEFT");
        $datacontent["Total_Jab_Kosong"] = $this->db->where(["B.Kd_Jabatan" => NULL])->count_all_results("tbl_jabatan A");

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_dashboard', $datacontent); // Content
        $this->load->view('templates/admin/footer', $datafooter); // Footer
    }

    public function out()
    {
        session_unset();
        session_destroy();

        redirect(base_url('Login'), 'refresh');
    }

    public function getJabKosong()
    {
        $this->db->select("A.*");
        $this->db->join($this->pegawai . " B", "A.Kd_Jabatan = B.Kd_Jabatan", "LEFT");
        $query = $this->db->get_where("tbl_jabatan A", ["B.Kd_Jabatan" => NULL])->result_array();

        $result['Status']  = true;
        $result['Pesan']   = '';
        $result['Data']    = $query;
        echo json_encode($result);
    }
}
