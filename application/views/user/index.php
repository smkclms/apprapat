<div class="my-4 px-3">
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-3">
  <h3 class="mb-0 text-dark">
    <i class="fas fa-user-graduate text-primary me-2"></i> Manajemen User (Siswa)
  </h3>
  <div>
    <a href="<?= site_url('user/import'); ?>" class="btn btn-info me-2">
      <i class="fas fa-file-import"></i> Import User
    </a>
    <a href="<?= site_url('user/tambah'); ?>" class="btn btn-success">
      <i class="fas fa-user-plus"></i> Tambah User
    </a>
  </div>
</div>

  <!-- Flash Message -->
  <?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i>
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<form method="get" class="form-inline mb-3">
    <label for="per_page" class="mr-2">Tampilkan</label>
    <select name="per_page" id="per_page" class="form-control form-control-sm mr-2" style="width: auto;">
        <option value="10" <?= ($per_page == 10) ? 'selected' : '' ?>>10</option>
        <option value="20" <?= ($per_page == 20) ? 'selected' : '' ?>>20</option>
        <option value="50" <?= ($per_page == 50) ? 'selected' : '' ?>>50</option>
        <option value="100" <?= ($per_page == 100) ? 'selected' : '' ?>>100</option>
    </select>
    <button type="submit" class="btn btn-sm btn-primary">Terapkan</button>
</form>

  <!-- Tabel -->
  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-bordered table-hover mb-0">
        <thead class="thead-light">
          <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if(empty($users)): ?>
            <tr>
              <td colspan="4" class="text-center text-muted py-3">Data user belum tersedia.</td>
            </tr>
          <?php else: ?>
            <?php foreach($users as $u): ?>
              <tr>
                <td><?= htmlspecialchars($u->nama); ?></td>
                <td><?= htmlspecialchars($u->username); ?></td>
                <td><?= htmlspecialchars($u->email); ?></td>
                <td>
                  <a href="<?= site_url('user/edit/'.$u->id_user); ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a href="<?= site_url('user/hapus/'.$u->id_user); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')">
                    <i class="fas fa-trash-alt"></i> Hapus
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Navigasi pagination -->
<div class="mt-3">
  <?= $pagination; ?>
</div>


  <!-- Footer -->
  <footer class="text-center mt-4 text-muted small">
    Dev: <a href="https://www.profilsaya.my.id" target="_blank" rel="noopener noreferrer">Muhamad_Nazmudin</a> &copy; 2025
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</div>
