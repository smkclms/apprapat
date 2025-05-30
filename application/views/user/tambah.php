<?php $this->load->view('templates/header', ['title' => 'Tambah User']); ?>

<h3>Tambah User Siswa</h3>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('user/tambah'); ?>">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" required />
  </div>
  <div class="mb-3">
    <label>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required />
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required />
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" />
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?php echo site_url('user'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php $this->load->view('templates/footer'); ?>
