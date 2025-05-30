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
}
