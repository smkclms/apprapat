<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_guru_or_siswa(); // guru dan siswa bisa akses
        $this->load->model('User_model');
        $this->load->model('Rapat_model');
    }

    public function index() {
        // Total user siswa
        $data['total_users'] = count($this->User_model->get_all_siswa());

        // Total rapat (semua status)
        $data['total_rapat'] = $this->Rapat_model->count_all();

        // Rapat yang akan dilaksanakan (tanggal >= hari ini)
        $data['rapat_akan_datang'] = $this->Rapat_model->count_upcoming();

        // Rapat yang sudah dilaksanakan (status = 'selesai')
        $data['rapat_selesai'] = $this->Rapat_model->count_finished();

        // Rapat yang sedang berlangsung (tanggal hari ini dan status 'berlangsung')
        $data['rapat_berlangsung'] = $this->Rapat_model->count_ongoing();

        $data['nama'] = $this->session->userdata('nama');
        $data['level'] = $this->session->userdata('level');

        $this->load->view('templates/header', ['title' => 'Dashboard']);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
