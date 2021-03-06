<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Pegawai extends CI_Controller
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
        $this->load->model("datatable/m_tbl_base");
        $this->load->model("datatable/m_tbl_pegawai", "dt_pegawai");
        $this->tbl = "tbl_data_pegawai";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Pegawai";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Data_Pegawai']     = "active";
        $dataheader["_uri"] = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']       = "s_data_pegawai.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "PortalAdmin";
        $datacontent["Unit"]    = $this->db->order_by("Kd_Unit", "ASC")->get("tbl_unit_kerja")->result_array();
        $datacontent["Jabatan"] = $this->db->order_by("Kd_Jabatan", "ASC")->get("tbl_jabatan")->result_array();

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_data_pegawai', $datacontent); // Content
        $this->load->view('templates/admin/footer', $datafooter); // Footer
    }

    public function getData()
    {
        $Search = [];

        $list   = $this->dt_pegawai->get_datatables($Search);
        $no     = $_POST['start'];

        $data   = [];
        foreach ($list as $field) {
            $button = '
            <div class="btn-group">
                <button class="btn btn-info btn-sm btnUbah_1" title="Ubah Data" dataId="' . $field->UID . '">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm btnHapus_1" title="Hapus Data" dataId="' . $field->UID . '">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            ';

            $no++;
            $row = array();
            $row[] = $field->Nama;
            $row[] = $field->Nip;
            $row[] = mediumdate_indo($field->Tanggal_Lahir);
            $row[] = $field->Jk;
            $row[] = mediumdate_indo($field->Berkala_Terakhir);
            $row[] = $field->Pangkat . " (" . $field->Pangkat_Terakhir . ")";
            $row[] = $field->No_Hp;
            $row[] = $field->Unit_Kerja;
            $row[] = $field->Jabatan;
            $row[] = $button;

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->dt_pegawai->count_all(),
            "recordsFiltered"   => $this->dt_pegawai->count_filtered($Search),
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function getEdit()
    {
        $UID    = $this->input->post('UID');
        $query  = $this->db->get_where($this->tbl, ['UID' => $UID])->result_array();

        $result['Status']  = true;
        $result['Pesan']   = '';
        $result['Data']    = $query;

        echo json_encode($result);
    }

    public function saveData($Method)
    {
        $this->form_validation->set_rules('Nama', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('Nip', 'Nip Pegawai', 'required|trim');

        if ($this->form_validation->run() == false) {
            $result['Status']  = false;
            $result['Pesan']   = validation_errors();
            $result['Data']    = "";
        } else {

            $data   = [
                'Nama'              => $this->input->post('Nama'),
                'Nip'               => $this->input->post('Nip'),
                'Tanggal_Lahir'     => formatTanggal($this->input->post('Tgl_Lahir')),
                'Berkala_Terakhir'  => formatTanggal($this->input->post('Berkala_Terakhir')),
                'Pangkat'           => $this->input->post('Pangkat'),
                'Pangkat_Terakhir'  => formatTanggal($this->input->post('Pangkat_Terakhir')),
                'No_Hp'             => $this->input->post('No_Hp'),
                'Jk'                => $this->input->post('Jk'),
                'Kd_Unit'           => $this->input->post('Unit_Kerja'),
                'Kd_Jabatan'        => $this->input->post('Jabatan')
            ];

            $where  = [
                'UID'    => $this->input->post('UID')
            ];

            // Execute Query
            if ($Method == "Tambah") {
                $data2 = [
                    //'User_Input'    => $this->session->userdata[$this->config->item('session_app')]['Nama'],
                    'Create_at'     => date('Y-m-d H:i:s')
                ];

                //Execute Save New Data
                $query = $this->m_base->saveData($this->tbl, array_merge($data, $data2));
            } else if ($Method == "Ubah") {
                $data2 = [
                    'Update_at'     => date('Y-m-d H:i:s')
                ];

                //Execute Save Edit
                $query = $this->m_base->saveEdit($this->tbl, array_merge($data, $data2), $where);
            } else {
                $result['Status']  = false;
                $result['Pesan']   = "Method Tidak Diketahui";
                $result['Data']    = "";
                echo json_encode($result);
                die;
            }

            if ($query == true) {
                $result['Status']  = true;
                $result['Pesan']   = "Sukses Menyimpan";
                $result['Data']    = "";
            } else {
                $result['Status']  = false;
                $result['Pesan']   = $this->db->error()['message'];
                $result['Data']    = "";
            }
        }

        echo json_encode($result);
    }

    public function deleteData()
    {
        $UID = $this->input->post('UID');

        $query  = $this->m_base->deleteData($this->tbl, ["UID" => $UID]);

        if ($query == true) {
            $result['Status']  = true;
            $result['Pesan']   = "Delete Data Success";
            $result['Data']    = "";
        } else {
            $result['Status']  = false;
            $result['Pesan']   = $this->db->error()['message'];
            $result['Data']    = "";
        }

        echo json_encode($result);
    }
}
