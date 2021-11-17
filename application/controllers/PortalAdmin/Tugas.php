<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
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
        $this->tbl = "tbl_tugas";
        $this->pegawai = "tbl_data_pegawai";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Tugas";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Tugas']    = "active";
        $dataheader["_uri"]     = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']       = "s_tugas.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "PortalAdmin";

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_tugas', $datacontent); // Content
        $this->load->view('templates/admin/footer', $datafooter); // Footer
    }

    public function getToken()
    {
        echo json_encode("20002");
    }

    public function getData()
    {
        $Select = "*";
        $Search = ["Judul"];
        $Where  = [];
        $Order  = ["Tgl_End" => "ASC"];
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
                <a href="' . base_url("View-Tugas/index/" . $field->UID) . '" target="_blank" class="btn btn-info btn-sm" title="Link">
                    <i class="fas fa-link"></i>
                </a>
            </div>
            ';

            $Keterangan = '
                <a href="javascript:void(0)" class="btnKeterangan" dataId="' . $field->UID . '">Keterangan</a>
            ';

            if ($field->File != "") {
                $File = '
                    <a href="' . base_url("FileUpload/" . $field->File) . '" target="_blank">File</a>
                ';
            } else {
                $File = 'File tidak ditemukan';
            }

            $arr_Tgl = explode(" ", $field->Tgl_End);

            $Judul = '<a href="' . base_url("PortalAdmin/Tugas/Lihat-Upload/" . $field->UID) . '">' . $field->Judul . '</a>';

            $no++;
            $row = array();
            $row[] = $Judul;
            $row[] = $Keterangan;
            $row[] = $File;
            $row[] = mediumdate_indo($arr_Tgl[0]) . " " . $arr_Tgl[1];
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

    public function saveData($Method)
    {
        $config['upload_path']      = '././FileUpload/';
        $config['allowed_types']    = '*';
        $config['max_size']         = 50000;
        $config['encrypt_name']     = true;

        $this->upload->initialize($config);
        if (!empty($_FILES['File']['name'])) {
            if (!$this->upload->do_upload("File")) {
                $result['Status']  = false;
                $result['Pesan']   = $this->upload->display_errors();
                $result['Data']    = "";
                echo json_encode($result);
                return;
            } else {
                $dataimage  = array('upload_data' => $this->upload->data());
                $filename  = $dataimage['upload_data']['file_name'];
                $data = [
                    'Judul'         => $this->input->post("Judul"),
                    'Keterangan'    => $this->input->post("Keterangan"),
                    'Tgl_End'       => formatTanggal($this->input->post('Tgl_End')) . " 23:59:00",
                    "File"          => $filename
                ];
            }
        } else {
            //No File 
            $data = [
                'Judul'         => $this->input->post("Judul"),
                'Keterangan'    => $this->input->post("Keterangan"),
                'Tgl_End'       => formatTanggal($this->input->post('Tgl_End')) . " 23:59:00"
            ];
        }

        $where = ["UID" => $this->input->post("UID")];

        // Execute Query
        if ($Method == "Tambah") {
            $data2 = [
                "UID" => date('Ymd') . substr(md5(date("his")), 0, 5)
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

        echo json_encode($result);
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

    public function Lihat_Upload($UID = "")
    {
        if ($UID == "") {
            redirect(base_url("PortalAdmin/Tugas"));
            die;
        }

        /** Data Header */
        $dataheader['Judul']    = "Lihat Upload";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Tugas']    = "active";
        $dataheader["_uri"]     = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']       = "s_lihat_upload.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "PortalAdmin";

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_lihat_upload', $datacontent); // Content
        $this->load->view('templates/admin/footer', $datafooter); // Footer
    }

    public function getDataUpload()
    {
        $UID = $this->input->post("UID");

        $Select = "*";
        $Search = ["Nama", "Nip", "", "", "", "No_Hp"];
        $Where  = [];
        $Order  = ["Nama" => "ASC"];
        $list   = $this->m_tbl_base->get_datatables($this->pegawai, $Select, $Search, $Where, $Order);
        $data   = array();
        $no     = $_POST['start'];
        foreach ($list as $field) {
            $numsUpload = $this->db->get_where("tbl_upload_tugas", ["UID_Tugas" => $UID, 'REPLACE(Nip, " ", "") =' => str_replace(" ", "", $field->Nip)])->num_rows();

            $button = '
            <div class="btn-group">
                <button class="btn btn-info btn-sm btnLihat" title="Lihat Data" dataId="' . $UID . '" dataNip="' . $field->Nip . '">
                    ' . $numsUpload . ' Upload
                </button>
            </div>
            ';

            $no++;
            $row = array();
            $row[] = $field->Nama;
            $row[] = $field->Nip;
            $row[] = mediumdate_indo($field->Tanggal_Lahir);
            $row[] = mediumdate_indo($field->Berkala_Terakhir);
            $row[] = $field->Pangkat . " (" . $field->Pangkat_Terakhir . ")";
            $row[] = $field->No_Hp;
            $row[] = $button;

            $data[] = $row;
        }

        $output = array(
            "draw"              => $_POST['draw'],
            "recordsTotal"      => $this->m_tbl_base->count_all($this->pegawai),
            "recordsFiltered"   => $this->m_tbl_base->count_filtered($this->pegawai, $Search, $Where, $Order),
            "data"              => $data,
        );

        echo json_encode($output);
    }

    public function getUpload()
    {
        $UID_Tugas  = $this->input->post("UID_Tugas");
        $Nip        = $this->input->post("Nip");

        $this->db->select("A.*, B.Nama");
        $this->db->join("tbl_data_pegawai B", "A.Nip = B.Nip", "LEFT JOIN");
        $data = $this->db->get_where("tbl_upload_tugas A", [
            "A.UID_Tugas" => $UID_Tugas,
            'REPLACE(A.Nip, " ", "") =' => str_replace(" ", "", $Nip)
        ])->result_array();

        $result['Status']  = false;
        $result['Pesan']   = $this->db->error()['message'];
        $result['Data']    = $data;
        echo json_encode($result);
    }
}
