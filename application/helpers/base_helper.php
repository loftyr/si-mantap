<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function generateCode($Table, $Code_Name, $Order)
{

    //Return ABC-001

    $_CI    = &get_instance();
    $_CI->db->order_by($Order, "DESC");

    $_data = $_CI->db->get($Table)->result_array();

    $Number = (@$_data[0]["UID"] != null || isset($_data[0]["UID"])) ? $_data[0]["UID"] : 0;

    return $Code = $Code_Name . "-" . str_pad($Number + 1, 3, "0", STR_PAD_LEFT);
}

function generateCode2($Table, $Code_Name, $Order, $Pemisah)
{

    //Return 001-ABC

    $_CI    = &get_instance();
    $_CI->db->order_by($Order, "DESC");

    $_data = $_CI->db->get($Table)->result_array();

    $Number = (@$_data[0]["Id"] != null || isset($_data[0]["Id"])) ? $_data[0]["Id"] : 0;

    return $Code = str_pad($Number + 1, 3, "0", STR_PAD_LEFT) . $Pemisah . $Code_Name;
}

function sessionCheck()
{
    $_CI = &get_instance();

    if (!isset($_CI->session->userdata[$_CI->config->item('session_app')])) {
        $_CI->session->set_flashdata("login_err", "Silahkan Login Terlebih Dahulu");
        redirect(base_url());
    }
}

function formatNoHp($No)
{
    return substr_replace($No, "+62", 0, 1);
}

function nip_reform($nip = '')
{

    $string         = str_replace(" ", "", $nip);
    $TAHUN_LAHIR    = substr($string, 0, 8);
    $TMT_PNS        = substr($string, 8, 6);
    $JENIS_KELAMIN  = substr($string, 14, 1);
    $URUTAN         = substr($string, 15, 3);
    return $TAHUN_LAHIR . " " . $TMT_PNS . " " . $JENIS_KELAMIN . " " . $URUTAN;
}
