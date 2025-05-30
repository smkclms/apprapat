<?php $this->load->view('templates/header', ['title' => 'Edit Notulen']); ?>

<h3>Edit Notulen</h3>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('notulen/edit/'.$notulen->id_notulen); ?>">
  <div class="mb-3">
    <label>ID Rapat</label>
    <input type="number" name="id_rapat" class="form-control" value="<?php echo set_value('id_rapat', $notulen->id_rapat); ?>" required />
  </div>
  <div class="mb-3">
    <label>Isi Notulen</label>
    <textarea name="isi_notulen" class="form-control" rows="5" required><?php echo set_value('isi_notulen', $notulen->isi_notulen); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  <a href="<?php echo site_url('notulen'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php $this->load->view('templates/footer'); ?>
