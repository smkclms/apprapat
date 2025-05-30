<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pdf');  // load library TCPDF wrapper
        $this->load->model('Rapat_model');
        $this->load->model('Notulen_model');
        $this->load->model('FileLampiran_model');
    }

    public function rapat($id_rapat) {
    $rapat = $this->Rapat_model->get_by_id($id_rapat);
    $notulen = $this->Notulen_model->get_by_rapat($id_rapat);
    $lampiran = $this->FileLampiran_model->get_by_rapat($id_rapat);

    if (!$rapat) show_404();

    // Buat PDF
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Laporan Rapat');
$pdf->SetMargins(10, 10, 10); // kiri, atas, kanan
$pdf->SetAutoPageBreak(TRUE, 10); // 10mm dari bawah halaman
$pdf->SetFont('helvetica', '', 10); // gunakan font kecil agar tabel tidak rusak
$pdf->AddPage();


    // Konten HTML laporan
    $html = $this->load->view('laporan/rapat_pdf', [
        'rapat' => $rapat, 
        'notulen' => $notulen,
        'lampiran' => $lampiran,
    ], true);

    $pdf->writeHTML($html, true, false, true, false, '');

    // Hindari error TCPDF: "Some data has already been output"
    ob_end_clean();

    // Tampilkan PDF
    $pdf->Output('laporan_rapat_'.$id_rapat.'.pdf', 'I');
}

}
