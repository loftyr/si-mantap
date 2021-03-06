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
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Dashboard";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Dashboard']    = "active";

        /** Data Footer */
        $datafooter['Js']       = ""; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"] = "PortalUser";

        $this->load->view('templates/user/header', $dataheader); // Header
        $this->load->view('pages/user/v_dashboard', $datacontent); // Content
        $this->load->view('templates/user/footer', $datafooter); // Footer
    }

    public function out()
    {
        session_unset();
        session_destroy();

        redirect(base_url('Login'), 'refresh');
    }
}
