<?php $this->load->view('templates/header', ['title' => 'Tambah Super Admin']); ?>

<!-- Font Awesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-success text-white">
      <h5 class="mb-0"><i class="fas fa-user-plus"></i> Tambah Guru</h5>
    </div>
    <div class="card-body">

<?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<form method="post" action="<?php echo site_url('user/tambah_guru'); ?>">
  <div class="mb-3">
    <label><i class="fa fa-user"></i>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>" required />
  </div>
  <div class="mb-3">
    <label><i class="fa fa-user-circle"></i>Username</label>
    <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" required />
  </div>
  <div class="mb-3">
    <label><i class="fa fa-lock"></i>Password</label>
    <input type="password" name="password" class="form-control" required />
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo set_value('email'); ?>" />
  </div>
  <div class="form-group mt-3">
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
          </button>
  <a href="<?php echo site_url('user/index_guru'); ?>" class="btn btn-secondary">Batal</a>
</form>

<?php $this->load->view('templates/footer'); ?>
