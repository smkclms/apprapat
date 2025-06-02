<h3>Manajemen Super Admin (Guru)</h3>
<a href="<?php echo site_url('user/tambah_guru'); ?>" class="btn btn-success mb-3">Tambah Super Admin</a>

<table class="table table-bordered">
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
          <a href="<?php echo site_url('user/edit_guru/'.$u->id_user); ?>" class="btn btn-sm btn-primary">Edit</a>
          <a href="<?php echo site_url('user/hapus/'.$u->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
