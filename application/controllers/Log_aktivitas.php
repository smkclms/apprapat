<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_aktivitas extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_guru(); // hanya guru yang bisa lihat log
        $this->load->model('Log_aktivitas_model');
    }

    public function index() {
        $data['logs'] = $this->Log_aktivitas_model->get_all_logs();
        $this->load->view('templates/header', ['title' => 'Log Aktivitas']);
        $this->load->view('log_aktivitas/index', $data);
        $this->load->view('templates/footer');
    }
}
