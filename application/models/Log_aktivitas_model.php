<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_aktivitas_model extends CI_Model {

    public function insert_log($data) {
        return $this->db->insert('log_aktivitas', $data);
    }

    public function get_all_logs() {
        $this->db->select('log_aktivitas.*, users.nama');
        $this->db->from('log_aktivitas');
        $this->db->join('users', 'log_aktivitas.id_user = users.id_user', 'left');
        $this->db->order_by('waktu', 'DESC');
        return $this->db->get()->result();
    }
    public function get_recent_logs($limit = 5) {
    $this->db->select('log_aktivitas.*, users.nama');
    $this->db->from('log_aktivitas');
    $this->db->join('users', 'log_aktivitas.id_user = users.id_user', 'left');
    $this->db->order_by('waktu', 'DESC');
    $this->db->limit($limit);
    return $this->db->get()->result();
}

}
