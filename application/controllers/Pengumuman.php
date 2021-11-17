<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    /**
     *Create By : Ai
     *Tanggal   : 25-Oktober-2021
     *
     */

    function __construct()
    {
        parent::__construct();
        $this->load->model("m_pengumuman");
        $this->tbl = "tbl_pengumuman";
        $this->tbl_upload = "tbl_upload_tugas";
        $this->pegawai = "tbl_data_pegawai";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Pengumuman";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Pengumuman']    = "active";
        $dataheader["_uri"]     = "";

        /** Data Footer */
        $datafooter['Js']       = "../s_pengumuman.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "";

        $this->load->view('templates/header', $dataheader); // Header
        $this->load->view('v_pengumuman', $datacontent); // Content
        $this->load->view('templates/footer', $datafooter); // Footer
    }

    public function loadRecord()
    {
        $config['base_url']     = base_url() . 'Pengumuman/index';
        $config['total_rows']   = $this->db->get("tbl_pengumuman")->num_rows();
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
        $data['result']     = $this->m_pengumuman->get_data($config['per_page'], $data['page']);
        $data['pagination'] = $this->pagination->create_links();

        echo json_encode($data);
    }

    public function Lihat($Link = "")
    {
        /** Data Header */
        $dataheader['Judul']    = "Lihat Pengumuman";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Pengumuman']    = "active";
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
        $this->load->view('v_view_pengumuman', $datacontent); // Content
        $this->load->view('templates/footer', $datafooter); // Footer
    }
}
