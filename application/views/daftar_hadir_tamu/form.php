<h3>Form Daftar Hadir Tamu</h3>

<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('daftarhadirtamu'); ?>">
  <div class="mb-3">
    <label for="id_rapat">Pilih Rapat</label>
    <select name="id_rapat" id="id_rapat" class="form-control" required>
      <option value="">-- Pilih Rapat --</option>
      <?php foreach($rapat_list as $rapat): ?>
        <option value="<?php echo $rapat->id_rapat; ?>">
          <?php echo htmlspecialchars($rapat->judul); ?> (<?php echo $rapat->tanggal; ?>)
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" required />
  </div>
  <div class="mb-3">
    <label for="instansi">Instansi</label>
    <input type="text" name="instansi" id="instansi" class="form-control" required />
  </div>
  <button type="submit" class="btn btn-primary">Kirim</button>
</form>
