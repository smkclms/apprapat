<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function log_activity($aktivitas, $id_user = null) {
    $CI =& get_instance();
    $CI->load->model('Log_aktivitas_model');

    if ($id_user === null) {
        $id_user = $CI->session->userdata('id_user');
    }

    $data = [
        'id_user' => $id_user,
        'aktivitas' => $aktivitas,
        'waktu' => date('Y-m-d H:i:s')
    ];

    $CI->Log_aktivitas_model->insert_log($data);
}