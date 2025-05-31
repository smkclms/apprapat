

<div class="d-flex justify-content-between mb-3">
  <h3>Daftar Notulen</h3>
  <a href="<?php echo site_url('notulen/tambah'); ?>" class="btn btn-success">Tambah Notulen</a>
</div>

<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Judul Rapat</th>
      <th>Isi Notulen</th>
      <th>Disusun Oleh</th>
      <th>Waktu Input</th>
      <th>Aksi</th>
    </tr>
  </thead>
    <tbody>
  <?php foreach($notulen as $n): ?>
    <tr>
      <td><?php echo $n->judul_rapat; ?></td>
      <!-- <td><?php echo nl2br(htmlspecialchars($n->isi_notulen)); ?></td> -->
       <!-- menggantin tampilan isi notulen hanya 200 karakter -->
        <td>
  <?php
    $isi = strip_tags($n->isi_notulen);
    echo nl2br(htmlspecialchars(mb_strimwidth($isi, 0, 100, '...')));
  ?>
</td>

      <td><?php echo htmlspecialchars($n->nama_user); ?></td>
      <td><?php echo $n->waktu_input; ?></td>
      <td>
        <a href="<?php echo site_url('notulen/cetak/'.$n->id_rapat); ?>" target="_blank" class="btn btn-sm btn-info">Cetak</a>
        <a href="<?php echo site_url('notulen/edit/'.$n->id_notulen); ?>" class="btn btn-sm btn-primary">Edit</a>
        <a href="<?php echo site_url('notulen/hapus/'.$n->id_notulen); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
      </td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
<footer style="width: 100%; text-align: center; padding: 10px 0; font-size: 14px; color: #555; position: fixed; bottom: 0; left: 0; background: #f8f8f8;">
  Dev: <a href="https://www.profilsaya.my.id" target="_blank" rel="noopener noreferrer">Muhamad_Nazmudin</a> @2025
</footer>


