<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileLampiran_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('file_lampiran', $data);
    }

    public function get_by_rapat($id_rapat) {
        return $this->db->get_where('file_lampiran', ['id_rapat' => $id_rapat])->result();
    }
    
}
