
<div class="d-flex justify-content-between mb-3">
  <h3>Daftar Rapat</h3>
  <a href="<?php echo site_url('rapat/tambah'); ?>" class="btn btn-success">Tambah Rapat</a>
</div>

<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Agenda</th>
      <th>Tanggal</th>
      <th>Jam Mulai</th>
      <th>Jam Selesai</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach($rapat as $r): ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo htmlspecialchars($r->judul); ?></td>
        <td><?php echo htmlspecialchars($r->agenda); ?></td>
        <td><?php echo $r->tanggal; ?></td>
        <td><?php echo $r->jam_mulai; ?></td>
        <td><?php echo isset($r->jam_selesai) && $r->jam_selesai != '' ? $r->jam_selesai : '-'; ?></td>
        <td><?php echo ucfirst($r->status); ?></td>
        <td>
          <a href="<?php echo site_url('filelampiran/upload/'.$r->id_rapat); ?>" class="btn btn-sm btn-warning">Upload Foto</a>
          <a href="<?php echo site_url('rapat/edit/'.$r->id_rapat); ?>" class="btn btn-sm btn-primary">Edit</a>
          <a href="<?php echo site_url('rapat/hapus/'.$r->id_rapat); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            <a href="<?php echo site_url('laporan/rapat/'.$r->id_rapat); ?>" target="_blank" class="btn btn-sm btn-info">Cetak</a>        
        </td>
        
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<footer style="width: 100%; text-align: center; padding: 10px 0; font-size: 14px; color: #555; position: fixed; bottom: 0; left: 0; background: #f8f8f8;">
  Dev: <a href="https://www.profilsaya.my.id" target="_blank" rel="noopener noreferrer">Muhamad_Nazmudin</a> @2025
</footer>
