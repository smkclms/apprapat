<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulen_model extends CI_Model {

    // public function get_all() {
    //     return $this->db->order_by('waktu_input', 'DESC')->get('notulen')->result();
    // }

    public function get_by_id($id) {
        return $this->db->get_where('notulen', ['id_notulen' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('notulen', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id_notulen', $id)->update('notulen', $data);
    }

    public function delete($id) {
        return $this->db->delete('notulen', ['id_notulen' => $id]);
    }
    public function get_all_with_rapat_and_user() {
    $this->db->select('notulen.*, rapat.judul as judul_rapat, users.nama as nama_user');
    $this->db->from('notulen');
    $this->db->join('rapat', 'notulen.id_rapat = rapat.id_rapat', 'left');
    $this->db->join('users', 'notulen.disusun_oleh = users.id_user', 'left');
    $this->db->order_by('notulen.waktu_input', 'DESC');
    return $this->db->get()->result();
}
public function get_by_rapat($id_rapat) {
    $this->db->select('notulen.*, users.nama as nama_user');
    $this->db->from('notulen');
    $this->db->join('users', 'notulen.disusun_oleh = users.id_user', 'left');
    $this->db->where('notulen.id_rapat', $id_rapat);
    return $this->db->get()->result();
}
public function get_latest_notulen_per_rapat() {
    $this->db->select('notulen.*, rapat.judul as judul_rapat, users.nama as nama_user');
    $this->db->from('notulen');
    $this->db->join('rapat', 'notulen.id_rapat = rapat.id_rapat', 'left');
    $this->db->join('users', 'notulen.disusun_oleh = users.id_user', 'left');
    $this->db->group_by('notulen.id_rapat');
    $this->db->order_by('notulen.waktu_input', 'DESC');
    return $this->db->get()->result();
}
public function get_notulen_with_authors() {
    $this->db->select('notulen.id_rapat, rapat.judul as judul_rapat, GROUP_CONCAT(DISTINCT users.nama SEPARATOR ", ") as penyusun');
    $this->db->from('notulen');
    $this->db->join('rapat', 'notulen.id_rapat = rapat.id_rapat', 'left');
    $this->db->join('users', 'notulen.disusun_oleh = users.id_user', 'left');
    $this->db->group_by('notulen.id_rapat');
    $this->db->order_by('rapat.tanggal', 'DESC');
    return $this->db->get()->result();
}
public function get_all_with_authors() {
    $this->db->select('notulen.id_notulen, notulen.id_rapat, notulen.isi_notulen, notulen.waktu_input, rapat.judul as judul_rapat, GROUP_CONCAT(DISTINCT users.nama SEPARATOR ", ") as penyusun');
    $this->db->from('notulen');
    $this->db->join('rapat', 'notulen.id_rapat = rapat.id_rapat', 'left');
    $this->db->join('users', 'notulen.disusun_oleh = users.id_user', 'left');
    $this->db->group_by('notulen.id_rapat');
    $this->db->order_by('notulen.waktu_input', 'DESC');
    return $this->db->get()->result();
}

public function get_by_user($id_user) {
    $this->db->select('notulen.*, rapat.judul as judul_rapat, users.nama as penyusun');
    $this->db->from('notulen');
    $this->db->join('rapat', 'notulen.id_rapat = rapat.id_rapat', 'left');
    $this->db->join('users', 'notulen.disusun_oleh = users.id_user', 'left'); // join ke users
    $this->db->where('disusun_oleh', $id_user);
    $this->db->order_by('notulen.waktu_input', 'DESC');
    return $this->db->get()->result();
}


}
