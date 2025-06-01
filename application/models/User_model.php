<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Ambil user berdasarkan username
    public function get_user_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    // Ambil user berdasarkan id
    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

    // Ambil semua user siswa
    public function get_all_siswa() {
        return $this->db->where('id_role', 2)->get('users')->result(); // 2 = siswa
    }

    // Insert data user baru
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    // Update data user
    public function update_user($id, $data) {
        return $this->db->where('id_user', $id)->update('users', $data);
    }

    // Hapus user
    public function delete_user($id) {
        return $this->db->delete('users', ['id_user' => $id]);
    }
    // Hitung total user dengan role siswa (id_role = 2)
public function count_all_siswa() {
    $this->db->where('id_role', 2);
    return $this->db->count_all_results('users');
}

// Ambil data siswa berdasarkan batasan halaman
public function get_siswa_pagination($limit, $start) {
    return $this->db
        ->where('id_role', 2)
        ->limit($limit, $start)
        ->order_by('nama', 'ASC')
        ->get('users')
        ->result();
}

}
