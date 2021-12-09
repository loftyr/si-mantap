<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{

    /**
     *Create By : Lofty Razani
     *Tanggal   : 24-Maret-2021
     *
     */

    function __construct()
    {
        parent::__construct();
        //
        sessionCheck();
        $this->load->model('datatable/m_tbl_base');
        $this->tbl          = "tbl_jabatan";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Jabatan";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Jabatan']  = "active";
        $dataheader["_uri"] = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']       = "s_jabatan.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"] = "PortalAdmin";

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_jabatan', $datacontent); // Content
        $this->load->view('templates/admin/footer', $datafooter); // Footer
    }

    public function getData()
    {
        $Select = "*";
        $Search = ["Kd_Jabatan", "Nama", "Keterangan"];
        $Where  = ["Delete_at" => NULL];
        $Order  = ["Kd_Jabatan" => "ASC"];
        $list   = $this->m_tbl_base->get_datatables($this->tbl, $Select, $Search, $Where, $Order);
        $data   = array();
        $no     = $_POST['start'];
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
            $row[] = $field->Kd_Jabatan;
            $row[] = $field->Nama;
            $row[] = $field->Keterangan;
            $row[] = $button;

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->m_tbl_base->count_all($this->tbl),
            "recordsFiltered"   => $this->m_tbl_base->count_filtered($this->tbl, $Search, $Where, $Order),
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function getEdit()
    {
        $UID     = $this->input->post('Id');
        $query  = $this->db->get_where($this->tbl, ['UID' => $UID])->result_array();

        $result['Status']  = true;
        $result['Pesan']   = '';
        $result['Data']    = $query;

        echo json_encode($result);
    }

    public function saveData($Method)
    {
        $this->form_validation->set_rules('Kd_Jabatan', 'Kode Jabatan', 'required|trim');
        $this->form_validation->set_rules('Nama_Jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == false) {
            $result['Status']  = false;
            $result['Pesan']   = validation_errors();
            $result['Data']    = "";
        } else {

            $data   = [
                'Kd_Jabatan'    => $this->input->post('Kd_Jabatan'),
                'Nama'  => $this->input->post('Nama_Jabatan'),
                'Keterangan'    => $this->input->post('Keterangan')
            ];

            $where  = [
                'UID'    => $this->input->post('Id')
            ];

            // Execute Query
            if ($Method == "Tambah") {
                $data2 = [];

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
        $UID = $this->input->post('Id');

        $query  = $this->m_base->saveEdit($this->tbl, ["Delete_at" => date('Y-m-d H:i:s')], ["UID" => $UID]);

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

    public function generateCode()
    {
        $Code = generateCode($this->tbl, "JB", "UID");

        $result['Status']  = true;
        $result['Pesan']   = "Code Success";
        $result['Data']    = $Code;

        echo json_encode($result);
    }
}
