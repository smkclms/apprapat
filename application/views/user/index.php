

<div class="d-flex justify-content-between mb-3">
  <h3>Manajemen User (Siswa)</h3>
  <a href="<?php echo site_url('user/tambah'); ?>" class="btn btn-success">Tambah User</a>
</div>

<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Username</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $u): ?>
      <tr>
        <td><?php echo htmlspecialchars($u->nama); ?></td>
        <td><?php echo htmlspecialchars($u->username); ?></td>
        <td><?php echo htmlspecialchars($u->email); ?></td>
        <td>
          <a href="<?php echo site_url('user/edit/'.$u->id_user); ?>" class="btn btn-sm btn-primary">Edit</a>
          <a href="<?php echo site_url('user/hapus/'.$u->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
