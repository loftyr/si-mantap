<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aula extends CI_Controller
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
        $this->tbl = "tbl_aula";
    }

    public function index()
    {
        /** Data Header */
        $dataheader['Judul']    = "Aula";
        $dataheader['Css']      = ""; // Costum CSS
        /** Data Menu */
        // $dataheader['Parent']['']   = 'menu-open';
        $dataheader['Aula']     = "active";
        $dataheader["_uri"]     = "PortalAdmin";

        /** Data Footer */
        $datafooter['Js']       = "s_aula.js"; // Costum JavaScript

        /** Data Content */
        $datacontent["_uri"]    = "PortalAdmin";

        $this->load->view('templates/admin/header', $dataheader); // Header
        $this->load->view('pages/admin/v_aula', $datacontent); // Content
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
        $Order  = ["Create_at" => "ASC"];
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

            $Keterangan = '
                <a href="javascript:void(0)" class="btnKeterangan" dataId="' . $field->UID . '">Keterangan</a>
            ';

            $Link = '<a href="' . base_url("Portal-Aula/Lihat/" . $field->Link) . '" target="_blank">' . $field->Nomor . '</a>';

            $no++;
            $row = array();
            $row[] = $Link;
            $row[] = formatTanggal($field->Tanggal);
            $row[] = $field->Aula;
            $row[] = $Keterangan;
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

        $Url = preg_replace('/([^a-z0-9]+)/i', '-', strtolower($this->input->post('Aula')));

        $data = [
            'Nomor'         => $this->input->post("Nomor"),
            'Aula'          => $this->input->post("Aula"),
            'Tanggal'       => formatTanggal($this->input->post('Tanggal')),
            'Link'          => $Url,
            'Keterangan'    => $this->input->post("Keterangan")
        ];

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
}
