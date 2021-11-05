<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('v_login');
    }

    public function Auth()
    {
        $user = htmlspecialchars($this->input->post('Username'));
        $pass = $this->input->post('Password');

        $dataUser = $this->db->get_where('ap_users A', ['A.Username' => $user])->row_array();

        // Check Data User
        if ($dataUser) {
            //Check Status User
            if ($dataUser['Delete_at'] == NULL) {
                // Check Password User
                if (password_verify($pass, $dataUser['Password'])) {

                    $datasession = [
                        'UID'       => $dataUser['UID'],
                        'Nama'      => $dataUser['Nama'],
                        'Level'     => $dataUser['Level']
                    ];
                    $this->session->set_userdata($this->config->item('session_app'), $datasession);

                    $data['Status'] = true;
                    $data['Pesan']  = 'Create Session . . .';
                    $data["Level"]  = $dataUser["Level"];
                    echo json_encode($data);
                    return;
                } else {
                    $data['Status']     = false;
                    $data['Pesan']      = 'Username dan Password tidak cocok !!!';
                    $data['Data']       = "";
                    echo json_encode($data);
                    return;
                }
            } else {
                $data['Status']     = false;
                $data['Pesan']      = 'User Sudah Non Aktif !!!, Hubungin Admin';
                $data['Data']       = "";
                echo json_encode($data);
                return;
            }
        } else {
            $data['Status']     = false;
            $data['Pesan']      = 'Username dan Password tidak cocok !!!';
            $data['Data']       = "";
            echo json_encode($data);
            return;
        }
    }

    public function out()
    {
        $link = base_url();
        //Unset User Session
        $this->session->unset_userdata($this->config->item("session_app"));

        redirect($link, 'refresh');
    }
}
