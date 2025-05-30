<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarHadir_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('daftar_hadir', $data);
    }

    // Opsional: fungsi untuk mengambil data daftar hadir
    public function get_by_rapat($id_rapat) {
        return $this->db->get_where('daftar_hadir', ['id_rapat' => $id_rapat])->result();
    }
    public function get_peserta_by_rapat($id_rapat) {
    $this->db->select('instansi');
    $this->db->where('id_rapat', $id_rapat);
    return $this->db->get('daftar_hadir')->result();
}

public function count_hadir_by_rapat($id_rapat) {
    // Asumsikan semua tamu yang mengisi daftar hadir berarti hadir
    $this->db->where('id_rapat', $id_rapat);
    return $this->db->count_all_results('daftar_hadir');
}

}
