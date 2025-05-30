<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) redirect('auth/login');
        $this->load->model('Rapat_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data['rapat'] = $this->Rapat_model->get_all();
        $this->load->view('templates/header', ['title' => 'Daftar Rapat']);
        $this->load->view('rapat/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('agenda', 'Agenda', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('pemimpin_rapat', 'Pemimpin Rapat', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', ['title' => 'Tambah Rapat']);
            $this->load->view('rapat/tambah');
            $this->load->view('templates/footer');
        } else {
           $data = [
                'judul' => $this->input->post('judul'),
                'agenda' => $this->input->post('agenda'),
                'tanggal' => $this->input->post('tanggal'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai'),
                'tempat' => $this->input->post('tempat'),
                'pemimpin_rapat' => $this->input->post('pemimpin_rapat'),
                'status' => 'pending',
                'created_by' => $this->session->userdata('id_user'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->Rapat_model->insert($data);
            $this->session->set_flashdata('success', 'Rapat berhasil ditambahkan');
            redirect('rapat');
        }
    }

    public function edit($id) {
    $data['rapat'] = $this->Rapat_model->get_by_id($id);
    if (!$data['rapat']) {
        show_404();
    }

    $this->form_validation->set_rules('judul', 'Judul', 'required');
    $this->form_validation->set_rules('agenda', 'Agenda', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
    $this->form_validation->set_rules('tempat', 'Tempat', 'required');
    $this->form_validation->set_rules('pemimpin_rapat', 'Pemimpin Rapat', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Panggil view edit, bukan tambah
        $this->load->view('templates/header', ['title' => 'Edit Rapat']);
        $this->load->view('rapat/edit', $data);
        $this->load->view('templates/footer');
    } else {
        // Konversi tanggal dari dd/mm/yyyy ke yyyy-mm-dd
        $tanggal_db = $this->input->post('tanggal'); // format YYYY-MM-DD, langsung bisa dipakai

        $update_data = [
            'judul' => $this->input->post('judul'),
            'agenda' => $this->input->post('agenda'),
            'tanggal' => $tanggal_db,
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai'),
            'tempat' => $this->input->post('tempat'),
            'pemimpin_rapat' => $this->input->post('pemimpin_rapat'),
            'status' => $this->input->post('status')
        ];

        // Gunakan update, bukan insert
        $this->Rapat_model->update($id, $update_data);
        $this->session->set_flashdata('success', 'Rapat berhasil diperbarui');
        redirect('rapat');
    }
}


    public function hapus($id) {
        $this->Rapat_model->delete($id);
        $this->session->set_flashdata('success', 'Rapat berhasil dihapus');
        redirect('rapat');
    }

}
