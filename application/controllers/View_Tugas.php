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
        $this->tbl_upload = "tbl_upload_tugas";
        $this->pegawai = "tbl_data_pegawai";
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
        $datafooter['Js']       = "s_view_tugas.js"; // Costum JavaScript

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

    public function saveData($Method)
    {
        // Check NIP
        $NIP = str_replace(" ", "", $this->input->post("Nip"));

        $arrData = $this->db->get_where($this->pegawai, ['REPLACE(Nip, " ", "") =' => $NIP])->result_array();

        if (!$arrData) {
            $result['Status']  = false;
            $result['Pesan']   = "Nomor Induk Pegawai (NIP) Tidak Ditemukan/ Tidak Terdaftar";
            $result['Data']    = "";
            echo json_encode($result);
            die;
        }

        $config['upload_path']      = '././FileTugas/';
        $config['allowed_types']    = 'jpeg|jpg|pdf|docx|xls|xlsx';
        $config['max_size']         = 10000;
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);

        if (!empty($_FILES['Lampiran']['name'])) {
            if (!$this->upload->do_upload("Lampiran")) {
                $result['Status']  = false;
                $result['Pesan']   = $this->upload->display_errors();
                $result['Data']    = "";
                echo json_encode($result);
                die;
            } else {
                $dataimage  = array('upload_data' => $this->upload->data());
                $filename  = $dataimage['upload_data']['file_name'];

                $data = [
                    'Nip'               => nip_reform($this->input->post("Nip")),
                    'Keterangan'        => $this->input->post("Keterangan"),
                    'Lampiran'          => $filename,
                    'Create_at'         => date("Y-m-d H:i:s")
                ];

                $query = $this->m_base->saveData($this->tbl_upload, $data);

                if ($query == true) {
                    $result['Status']  = true;
                    $result['Pesan']   = "Sukses Mengirim Tugas";
                    $result['Data']    = "";
                } else {
                    $result['Status']  = false;
                    $result['Pesan']   = $this->db->error()['message'];
                    $result['Data']    = "";
                }
            }
        } else {
            $result['Status']  = false;
            $result['Pesan']   = "Gagal Upload, File Tidak Ditemukan";
            $result['Data']    = "";
        }

        echo json_encode($result);
    }
}
