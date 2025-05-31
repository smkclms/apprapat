<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notulen extends MY_Controller {

    public function __construct() {
    parent::__construct();
    $this->check_guru_or_siswa();
    $this->load->model('Notulen_model');
    $this->load->model('Rapat_model');
    $this->load->model('DaftarHadir_model'); // Tambahkan ini
    $this->load->helper(['url', 'form']);
    $this->load->library('form_validation');
}



    public function index() {
    $data['notulen'] = $this->Notulen_model->get_all_with_rapat_and_user();
    $this->load->view('templates/header', ['title' => 'Daftar Notulen']);
    $this->load->view('notulen/index', $data);
    $this->load->view('templates/footer');
}


    public function tambah() {
    $this->load->model('Rapat_model'); // pastikan model rapat dimuat

    $data['rapat_list'] = $this->Rapat_model->get_all(); // ambil semua rapat

    $this->form_validation->set_rules('id_rapat', 'Rapat', 'required');
    $this->form_validation->set_rules('isi_notulen', 'Isi Notulen', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header', ['title' => 'Tambah Notulen']);
        $this->load->view('notulen/tambah', $data);
        $this->load->view('templates/footer');
    } else {
        $data_insert = [
            'id_rapat' => $this->input->post('id_rapat'),
            'isi_notulen' => $this->input->post('isi_notulen'),
            'disusun_oleh' => $this->session->userdata('id_user'),
            'waktu_input' => date('Y-m-d H:i:s')
        ];
        $this->Notulen_model->insert($data_insert);
        $this->session->set_flashdata('success', 'Notulen berhasil disimpan');
        redirect('notulen');
    }
}


    public function edit($id) {
        $data['notulen'] = $this->Notulen_model->get_by_id($id);
        if (!$data['notulen']) show_404();

        $this->form_validation->set_rules('id_rapat', 'Rapat', 'required');
        $this->form_validation->set_rules('isi_notulen', 'Isi Notulen', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', ['title' => 'Edit Notulen']);
            $this->load->view('notulen/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $update_data = [
                'id_rapat' => $this->input->post('id_rapat'),
                'isi_notulen' => $this->input->post('isi_notulen')
            ];
            $this->Notulen_model->update($id, $update_data);
            $this->session->set_flashdata('success', 'Notulen berhasil diperbarui');
            redirect('notulen');
        }
    }

    public function hapus($id) {
        $this->Notulen_model->delete($id);
        $this->session->set_flashdata('success', 'Notulen berhasil dihapus');
        redirect('notulen');
    }
    public function cetak($id_rapat) {
    $this->load->library('pdf'); // library TCPDF atau dompdf sesuai Anda

    $rapat = $this->Rapat_model->get_rapat_detail($id_rapat);
    if (!$rapat) show_404();

    $notulen = $this->Notulen_model->get_by_rapat($id_rapat);
    $peserta = $this->DaftarHadir_model->get_peserta_by_rapat($id_rapat);
    $jumlah_hadir = $this->DaftarHadir_model->count_hadir_by_rapat($id_rapat);

    // Data tidak hadir bisa Anda input manual di form lain, atau set '-' sementara
    $tidak_hadir = '-'; 

    $data = [
        'rapat' => $rapat,
        'notulen' => $notulen,
        'peserta' => $peserta,
        'jumlah_hadir' => $jumlah_hadir,
        'tidak_hadir' => $tidak_hadir,
    ];

    $html = $this->load->view('notulen/cetak', $data, true);

    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Laporan Notulen Rapat');
    $pdf->SetMargins(15, 20, 15);
    $pdf->AddPage();
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->Output('notulen_rapat_'.$id_rapat.'.pdf', 'I');
}

}
