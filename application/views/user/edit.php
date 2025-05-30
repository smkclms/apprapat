<?php $this->load->view('templates/header', ['title' => 'Edit User']); ?>

<h3>Edit User Siswa</h3>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('user/edit/'.$user->id_user); ?>">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama', $user->nama); ?>" required />
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo set_value('email', $user->email); ?>" />
  </div>
  <div class="mb-3">
    <label>Password (kosongkan jika tidak ingin diubah)</label>
    <input type="password" name="password" class="form-control" />
  </div>
  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
  <a href="<?php echo site_url('user'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php $this->load->view('templates/footer'); ?>
