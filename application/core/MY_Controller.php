<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $user_level;

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->user_level = $this->session->userdata('level');
    }

    protected function check_guru_or_siswa() {
    if (!in_array($this->user_level, [1, 2])) { // 1=guru, 2=siswa
        show_error('Anda tidak memiliki akses ke halaman ini.', 403, 'Akses Ditolak');
        exit;
    }
}
 protected function check_guru() {
        if ($this->user_level != 1) {
            show_error('Anda tidak memiliki akses ke halaman ini.', 403, 'Akses Ditolak');
            exit;
        }
    }
protected function check_access($levels = array()) {
    if (!in_array($this->user_level, $levels)) {
        show_error('Anda tidak memiliki akses ke halaman ini.', 403, 'Akses Ditolak');
        exit;
    }
}


}
