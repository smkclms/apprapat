

<h3>Profil Saya</h3>

<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('profile'); ?>">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', $user->nama); ?>" required />
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo set_value('email', $user->email); ?>" />
  </div>
  <div class="mb-3">
    <label>No. Telepon</label>
    <input type="text" name="no_telepon" class="form-control" value="<?php echo set_value('no_telepon', $user->no_telepon); ?>" />
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
<footer style="width: 100%; text-align: center; padding: 10px 0; font-size: 14px; color: #555; position: fixed; bottom: 0; left: 0; background: #f8f8f8;">
  Dev: <a href="https://www.profilsaya.my.id" target="_blank" rel="noopener noreferrer">Muhamad_Nazmudin</a> @2025
</footer>

