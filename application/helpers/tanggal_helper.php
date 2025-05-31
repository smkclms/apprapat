<?php
if (!function_exists('format_tanggal_indonesia')) {
    function format_tanggal_indonesia($tanggal) {
        $hari = [
            'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'
        ];
        $bulan = [
            'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret', 'April' => 'April',
            'May' => 'Mei', 'June' => 'Juni', 'July' => 'Juli', 'August' => 'Agustus',
            'September' => 'September', 'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
        ];
        $timestamp = strtotime($tanggal);
        return $hari[date('l', $timestamp)] . ', ' . date('d', $timestamp) . ' ' . $bulan[date('F', $timestamp)] . ' ' . date('Y', $timestamp);
    }
}