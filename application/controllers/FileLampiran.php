<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileLampiran extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_guru_or_siswa(); // guru dan siswa boleh upload
        $this->load->model('FileLampiran_model');
        $this->load->helper(['url', 'form']);
    }

    public function upload($id_rapat = null) {
        if (!$id_rapat) {
            show_404();
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // max 2MB
        $config['file_name'] = 'rapat_'.$id_rapat.'_'.time();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_kegiatan')) {
            $error = $this->upload->display_errors();
            $this->load->view('templates/header', ['title' => 'Upload Foto Kegiatan']);
            $this->load->view('file_lampiran/upload', ['error' => $error, 'id_rapat' => $id_rapat]);
            $this->load->view('templates/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'id_rapat' => $id_rapat,
                'nama_file' => $upload_data['file_name'],
                'path_file' => 'uploads/'.$upload_data['file_name'],
                'file_type' => $upload_data['file_type'],
                'uploaded_at' => date('Y-m-d H:i:s')
            ];
            $this->FileLampiran_model->insert($data);
            $this->session->set_flashdata('success', 'Foto berhasil diupload');
            redirect('rapat');
        }
    }
}
