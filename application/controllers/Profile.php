<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
    }

    public function index() {
        $id_user = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->get_user_by_id($id_user);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', ['title' => 'Profil Saya']);
            $this->load->view('profile/index', $data);
            $this->load->view('templates/footer');
        } else {
            $update_data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telepon' => $this->input->post('no_telepon')
            ];
             $password = $this->input->post('password');
    if (!empty($password)) {
        $update_data['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
            $this->User_model->update_user($this->session->userdata('id_user'), $update_data);
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui');
            redirect('profile');
        }
    }
}
