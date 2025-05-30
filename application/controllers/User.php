<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_guru(); // hanya guru yang bisa akses
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_siswa();
        $this->load->view('templates/header', ['title' => 'Manajemen User']);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', ['title' => 'Tambah User']);
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'id_role' => 2, // siswa/admin terbatas
                'created_at' => date('Y-m-d H:i:s')
            ];
            $this->User_model->insert_user($data);
            $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            redirect('user');
        }
    }

    public function edit($id) {
        $data['user'] = $this->User_model->get_user_by_id($id);
        if (!$data['user']) show_404();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', ['title' => 'Edit User']);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $update_data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email')
            ];
            // Jika password diisi, update juga
            $password = $this->input->post('password');
            if ($password) {
                $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
            }
            $this->User_model->update_user($id, $update_data);
            $this->session->set_flashdata('success', 'User berhasil diperbarui');
            redirect('user');
        }
    }

    public function hapus($id) {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect('user');
    }
}
