<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portal_Aula extends CI_Controller
{

    /**
     *Create By : Ai
     *Tanggal   : 10-Januari-2022
     *
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model("m_aula");
        $this->tbl = "tbl_aula";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Portal Aula";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Portal_Aula'] = "active";
        $dataheader["_uri"]     = "";

        /** Data Footer */
        $datafooter['Js']       = "../s_portal_aula.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "";

        $this->load->view('templates/header', $dataheader); // Header
        $this->load->view('v_portal_aula', $datacontent); // Content
        $this->load->view('templates/footer', $datafooter); // Footer
    }

    public function loadRecord()
    {
        $Cari = $this->input->post("Cari");
        $Where = ["Aula LIKE" => '%' . $Cari . '%'];

        $config['base_url']     = base_url() . 'Portal-Aula/index';
        if ($Cari) {
            $config['total_rows']   = $this->db->get_where($this->tbl, $Where)->num_rows();
        } else {
            $config['total_rows']   = $this->db->get($this->tbl)->num_rows();
        }
        $config['per_page']     = 10;
        $config['uri_segment']  = 3;
        $pilih                  = $config['total_rows'] / $config['per_page'];
        $config['num_links']    = 2;

        // Style Pagination
        $config['first_link']       = "First";
        $config['last_link']        = "Last";
        $config['next_link']        = "Next";
        $config['prev_link']        = "Prev";
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';


        $this->pagination->initialize($config);
        $data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        if ($Cari) {
            $data['result']     = $this->m_aula->get_data_key($config['per_page'], $data['page'], $Where);
        } else {
            $data['result']     = $this->m_aula->get_data($config['per_page'], $data['page']);
        }

        $data['pagination'] = $this->pagination->create_links();

        echo json_encode($data);
    }

    public function Lihat($Link = "")
    {
        /** Data Header */
        $dataheader['Judul']    = "Lihat Aula";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Portal_Aula'] = "active";
        $dataheader["_uri"]     = "";

        /** Data Footer */
        $datafooter['Js']       = ""; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "";

        if ($Link != "") {
            $datacontent["Data"]    = $this->db->get_where($this->tbl, ["Link" => $Link])->result_array();

            if (count($datacontent["Data"]) > 0) {
                $datacontent["Status"]  = "True";
                $datacontent["Message"] = "";
            } else {
                $datacontent["Status"] = "False";
                $datacontent["Message"] = "Data Tidak Ditemukan";
            }
        } else {
            $datacontent["Status"] = "False";
            $datacontent["Message"] = "Link Pengumuman Tidak Ditemukan";
        }

        $this->load->view('templates/header', $dataheader); // Header
        $this->load->view('v_view_aula', $datacontent); // Content
        $this->load->view('templates/footer', $datafooter); // Footer
    }
}
