<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');  // Pastikan model dimuat di sini
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    // public function login() {
    //     if ($this->session->userdata('logged_in')) {
    //         redirect('dashboard');
    //     }
    //     $this->load->view('auth/login');
    // }
    public function login() {
    if ($this->session->userdata('logged_in')) {
        redirect('dashboard');
    }

    $this->load->model('Rapat_model');
    $data['rapat_list'] = $this->Rapat_model->get_all_upcoming();

    // Load view login dengan data rapat
    $this->load->view('auth/login', $data);
}


    public function do_login() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->User_model->get_user_by_username($username);

    if ($user && password_verify($password, $user->password)) {
        $session_data = [
            'id_user' => $user->id_user,
            'username' => $user->username,
            'nama' => $user->nama,
            'foto' => $user->foto, // pastikan kolom foto ada di tabel users
            'level' => $user->id_role,
            'logged_in' => TRUE
        ];
        $this->session->set_userdata($session_data);
        log_activity('User login: ' . $user->username); // Log aktivitas login
        redirect('dashboard');
    } else {
        $this->session->set_flashdata('error', 'Username atau password salah');
        redirect('auth/login');
    }
}


    public function logout() {
        log_activity('User logout: ' . $this->session->userdata('username'));
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
