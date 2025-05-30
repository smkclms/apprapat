<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarHadirTamu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Rapat_model');
        $this->load->model('DaftarHadir_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    // Halaman daftar rapat dan form daftar hadir
    public function index() {

    // Ambil daftar rapat yang akan datang
    $data['rapat_list'] = $this->Rapat_model->get_all_upcoming();

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('instansi', 'Instansi', 'required');
    $this->form_validation->set_rules('id_rapat', 'Rapat', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('daftar_hadir_tamu/header'); // tanpa sidebar
        $this->load->view('daftar_hadir_tamu/form', $data);
        $this->load->view('daftar_hadir_tamu/footer');
    } else {
        $data_insert = [
            'id_rapat' => $this->input->post('id_rapat'),
            'nama' => $this->input->post('nama'),
            'instansi' => $this->input->post('instansi'),
            'waktu_hadir' => date('Y-m-d H:i:s')
        ];
        $this->DaftarHadir_model->insert($data_insert);
        $this->session->set_flashdata('success', 'Terima kasih, kehadiran Anda telah dicatat.');
        redirect('daftarhadirtamu');
    }
}
}

