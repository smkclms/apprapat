<?php $this->load->view('templates/header', ['title' => 'Upload Foto Kegiatan']); ?>

<h3>Upload Foto Kegiatan Rapat</h3>

<?php if (isset($error)): ?>
  <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<form method="post" action="<?php echo site_url('filelampiran/upload/'.$id_rapat); ?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Pilih Foto (jpg, png, gif max 2MB)</label>
    <input type="file" name="foto_kegiatan" class="form-control" required />
  </div>
  <button type="submit" class="btn btn-primary">Upload</button>
  <a href="<?php echo site_url('rapat'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php $this->load->view('templates/footer'); ?>
