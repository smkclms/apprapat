<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_guru_or_siswa(); // hanya guru yang bisa akses
        $this->check_access([1, 2]); // izinkan guru dan siswa
        $this->load->model('User_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('form_validation');
        $this->load->library('excel'); // load PHPExcel wrapper
    }

public function index() {
    $this->load->library('pagination');

    // Ambil nilai dari dropdown (GET), default 10
    $per_page = $this->input->get('per_page');
if ($per_page === NULL || $per_page === '') {
    $per_page = 10;
}

    // Konfigurasi pagination
    $config['base_url'] = site_url('user/index');
    $config['total_rows'] = $this->User_model->count_all_siswa();
    $config['per_page'] = $per_page;
    $config['page_query_string'] = TRUE; // supaya ?per_page=10&page=2
    $config['query_string_segment'] = 'page';

    // Bootstrap style
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close'] = '</span></li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close'] = '</span></li>';
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close'] = '</span></li>';

    $this->pagination->initialize($config);

    // Ambil offset berdasarkan GET 'page'
    $page = $this->input->get('page');
if ($page === NULL || $page === '') {
    $page = 0;
}


    $data['users'] = $this->User_model->get_siswa_pagination($per_page, $page);
    $data['pagination'] = $this->pagination->create_links();
    $data['per_page'] = $per_page; // dikirim ke view

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
public function import() {
        if ($_FILES && isset($_FILES['userfile'])) {
            $file = $_FILES['userfile']['tmp_name'];

            try {
                $objPHPExcel = PHPExcel_IOFactory::load($file);
                $sheet = $objPHPExcel->getActiveSheet();
                $rows = $sheet->toArray();

                $count = 0;
                foreach ($rows as $index => $row) {
                    if ($index == 0) continue; // skip header

                    $nama = $row[0];
                    $username = $row[1];
                    $password = $row[2];
                    $email = $row[3];

                    if ($nama && $username && $password) {
                        $data = [
                            'nama' => $nama,
                            'username' => $username,
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'email' => $email,
                            'id_role' => 2, // siswa
                            'created_at' => date('Y-m-d H:i:s')
                        ];
                        $this->User_model->insert_user($data);
                        $count++;
                    }
                }

                $this->session->set_flashdata('success', "$count user berhasil diimport.");
                redirect('user/import');
            } catch(Exception $e) {
                $data['error'] = 'Error loading file: ' . $e->getMessage();
                $this->load->view('templates/header', ['title' => 'Import User']);
                $this->load->view('user/import', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->load->view('templates/header', ['title' => 'Import User']);
            $this->load->view('user/import');
            $this->load->view('templates/footer');
        }
    }
    public function hapus($id) {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        redirect('user');
    }
}
