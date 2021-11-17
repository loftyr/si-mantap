<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pensiun extends CI_Controller
{

    /**
     *Create By : Ai
     *Tanggal   : 25-Oktober-2021
     *
     */

    function __construct()
    {
        parent::__construct();
        //Check Session
        sessionCheck();
        $this->load->model("datatable/m_tbl_pensiun");
        $this->tbl = "tbl_data_pegawai";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Pensiun";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Pensiun'] = "active";
        $dataheader["_uri"] = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']   = "s_pensiun.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"] = "PortalAdmin";

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_pensiun', $datacontent); // Content
        $this->load->view('templates/admin/footer', $datafooter); // Footer
    }

    public function getData()
    {
        $arr_setting = $this->db->get_where("tbl_setting", ["UID" => 3])->result_array();
        $Status = $this->input->post("Status");
        $Where  = [
            "Pensiun" => @$arr_setting[0]["Value"],
            "Status" => $Status
        ];

        $list   = $this->m_tbl_pensiun->get_datatables($Where);
        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $field) {

            if ($field->Delay <= 450) {
                $button = '
                    <div class="btn-group">
                        <a class="" target="_blank" href="https://wa.me/' . formatNoHp($field->No_Hp) . '">Chat Now</a>
                    </div>
                ';
            } else {
                $button = '
                    <div class="btn-group">
                        <a class="" href="javascript:void()">Not Yet</a>
                    </div>
                ';
            }

            $no++;
            $row = array();
            $row[] = $field->Nama;
            $row[] = $field->Nip;
            $row[] = mediumdate_indo($field->Tanggal_Lahir);
            $row[] = mediumdate_indo($field->Pensiun);
            $row[] = round($field->Delay / 30);
            $row[] = $field->No_Hp;
            $row[] = $button;

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->m_tbl_pensiun->count_all(),
            "recordsFiltered"   => $this->m_tbl_pensiun->count_filtered($Where),
            "data"              => $data,
        );

        echo json_encode($output);
    }
}
