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
        $datafooter['Js']       = ""; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"] = "PortalAdmin";
        $datacontent["Total_PNS"] = $this->db->count_all_results($this->pegawai);
        $datacontent["Total_PNS_Pria"] = $this->db->where(["Jk" => "Laki-Laki"])->count_all_results($this->pegawai);
        $datacontent["Total_PNS_Wanita"] = $this->db->where(["Jk" => "Perempuan"])->count_all_results($this->pegawai);

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
}
