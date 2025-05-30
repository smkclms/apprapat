<!DOCTYPE html>
<html>
<head>
  <title>Laporan Notulen Rapat</title>
  <style>
    body { font-family: helvetica, sans-serif; font-size: 12px; }
    h1, h2, h3 { text-align: center; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; }
    div.tanda-tangan span {
  display: block;
  text-align: right;
}
div.tanda-tangan span:first-child {
  font-weight: bold;
  margin-bottom: 4px; /* jarak antara Notulis dan nama */
}

  </style>
</head>
<body>

  <h1>Laporan Notulen Rapat</h1>
  <h2><?php echo $rapat->judul; ?></h2>

  <p><strong>Agenda:</strong> <?php echo $rapat->agenda; ?></p>
  <p><strong>Hari, Tanggal:</strong> <?php
function format_tanggal_indonesia($tanggal) {
    $hari = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );

    $bulan = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    );

    $timestamp = strtotime($tanggal);
    $hari_en = date('l', $timestamp);
    $tgl = date('d', $timestamp);
    $bulan_en = date('F', $timestamp);
    $tahun = date('Y', $timestamp);

    return $hari[$hari_en] . ', ' . $tgl . ' ' . $bulan[$bulan_en] . ' ' . $tahun;
}

echo format_tanggal_indonesia($rapat->tanggal);
?>

  <p><strong>Tempat:</strong> <?php echo $rapat->tempat; ?></p>
  <p><strong>Pemimpin Rapat:</strong> <?php echo $rapat->pemimpin_rapat; ?></p>

  <!-- <p><strong>Peserta:</strong></p>
  <ul>
    <?php foreach($peserta as $p): ?>
      <li><?php echo htmlspecialchars($p->instansi); ?></li>
    <?php endforeach; ?>
  </ul> -->
<!-- merubah data peserta menjadi kesamping -->
 <p><strong>Peserta:</strong>
  <?php
    $peserta_list = array_map(function($p) {
      return htmlspecialchars($p->instansi);
    }, $peserta);
    echo implode(', ', $peserta_list);
  ?>
</p>

  <p><strong>Hadir:</strong> <?php echo $jumlah_hadir; ?></p>
  <!-- <p><strong>Tidak Hadir:</strong> <?php echo $tidak_hadir; ?></p> -->

  <h3>Hasil Rapat</h3>
  <table>
    <thead>
      <tr><th>Uraian</th></tr>
    </thead>
   <tbody>
  <?php foreach($notulen as $n): ?>
    <tr>
      <td>
        <?php
          $isi = nl2br(htmlspecialchars($n->isi_notulen));

          // Tambah jarak dengan margin-bottom, lalu tampilkan Notulis dan nama user rata kanan dengan jarak yang rapih
          $notulis = '
            <br><br><br>
            <div style="text-align: right; line-height: 1.4;">
              <strong>Notulis</strong><br><br>
              ' . htmlspecialchars($n->nama_user) . '
            </div>';

          echo $isi . $notulis;
        ?>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>





  </table>

</body>
</html>
