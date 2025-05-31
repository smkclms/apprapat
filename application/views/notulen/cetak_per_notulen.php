<!DOCTYPE html>
<html>
<head>
  <title>Notulen</title>
  <style>
    body { font-family: helvetica, sans-serif; font-size: 12px; }
    h1, h2, h3 { text-align: center; }
    p { margin: 4px 0; }
    div.tanda-tangan {
      margin-top: 50px;
      text-align: right;
    }
  </style>
</head>
<body>
  <h1>Laporan Notulen Rapat</h1>
  <h2><?= $rapat->judul; ?></h2>

 <p><strong>Hari, Tanggal:</strong> <?= format_tanggal_indonesia($rapat->tanggal); ?></p>
  <p><strong>Tempat:</strong> <?= $rapat->tempat; ?></p>
  <p><strong>Pemimpin Rapat:</strong> <?= $rapat->pemimpin_rapat; ?></p>
  <p><strong>Peserta:</strong>
    <?= implode(', ', array_map(function($p) {
        return htmlspecialchars($p->instansi);
    }, $peserta)); ?>
  </p>
  <p><strong>Hadir:</strong> <?= $jumlah_hadir; ?></p>

  <p style="text-align: justify;">
  <h3>Hasil Rapat</h3>
  <p><?= nl2br(htmlspecialchars($notulen->isi_notulen)); ?></p>
  
  <div class="tanda-tangan">
    <p style="margin-top: 200px; font-weight: bold;">
        Notulis
    </p>
    <p>
        <?= htmlspecialchars($notulen->nama_user); ?>
    </p>
</div>

</body>
</html>
