<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat_model extends CI_Model {

    public function get_all() {
        return $this->db->order_by('id_rapat', 'ASC')->get('rapat')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('rapat', ['id_rapat' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('rapat', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_rapat', $id)->update('rapat', $data);
    }

    public function delete($id) {
        return $this->db->delete('rapat', ['id_rapat' => $id]);
    }
    public function get_all_upcoming() {
    $today = date('Y-m-d');
    $this->db->where('tanggal >=', $today);
    $this->db->order_by('tanggal', 'ASC');
    return $this->db->get('rapat')->result();
}
public function get_rapat_detail($id_rapat) {
    return $this->db->get_where('rapat', ['id_rapat' => $id_rapat])->row();
}
public function count_all() {
    return $this->db->count_all('rapat');
}

public function count_upcoming() {
    $today = date('Y-m-d');
    $this->db->where('tanggal >', $today);
    return $this->db->count_all_results('rapat');
}


public function count_finished() {
    $this->db->where('status', 'selesai');
    return $this->db->count_all_results('rapat');
}

public function count_ongoing() {
    $this->db->where('status', 'berlangsung');
    return $this->db->count_all_results('rapat');
}




}
