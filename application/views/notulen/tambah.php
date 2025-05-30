<?php $this->load->view('templates/header', ['title' => 'Tambah Notulen']); ?>

<h3>Tambah Notulen</h3>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('notulen/tambah'); ?>">
  <div class="mb-3">
    <label for="id_rapat">Pilih Kegiatan Rapat</label>
    <select name="id_rapat" id="id_rapat" class="form-control" required>
      <option value="">-- Pilih Rapat --</option>
      <?php foreach($rapat_list as $rapat): ?>
        <option value="<?php echo $rapat->id_rapat; ?>" <?php echo set_select('id_rapat', $rapat->id_rapat); ?>>
          <?php echo htmlspecialchars($rapat->judul); ?> (<?php echo $rapat->tanggal; ?>)
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="isi_notulen">Isi Notulen</label>
    <textarea name="isi_notulen" id="isi_notulen" class="form-control" rows="5" required><?php echo set_value('isi_notulen'); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?php echo site_url('notulen'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php $this->load->view('templates/footer'); ?>
