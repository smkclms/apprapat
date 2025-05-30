<!DOCTYPE html>
<html>
<head>
  <title>Laporan Rapat</title>
  <style>
    body { font-family: helvetica, sans-serif; font-size: 12px; }
    h1, h2, h3 { text-align: center; margin-bottom: 10px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 6px; vertical-align: top; }
    img.lampiran-img {
      width: 80px;
      height: auto;
      margin: 2px;
      border: 1px solid #ccc;
      padding: 3px;
    }
  </style>
</head>
<body>
  <h1>Laporan Rapat</h1>
  <h2><?php echo $rapat->judul; ?></h2>
  <p><strong>Agenda:</strong> <?php echo $rapat->agenda; ?></p>
  <p><strong>Tanggal:</strong> <?php echo $rapat->tanggal; ?></p>
  <p><strong>Jam:</strong> <?php echo $rapat->jam_mulai; ?> - <?php echo !empty($rapat->jam_selesai) ? $rapat->jam_selesai : '-'; ?></p>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Isi Notulen</th>
        <th>Disusun Oleh</th>
        <th>Waktu Input</th>
        <th>Lampiran</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($notulen as $n): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td>
  <?php
    $isi = strip_tags($n->isi_notulen);
    echo nl2br(htmlspecialchars(mb_strimwidth($isi, 0, 50, '...')));
  ?>
</td>

        <td><?php echo htmlspecialchars($n->nama_user); ?></td>
        <td><?php echo $n->waktu_input; ?></td>
        <td>
  <?php
    if (!empty($lampiran)) {
      foreach ($lampiran as $file) {
        echo '<img src="' . base_url($file->path_file) . '" style="width:80px; height:auto; margin:2px;" alt="' . htmlspecialchars($file->nama_file) . '" />';
      }
    } else {
      echo '-';
    }
  ?>
</td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
