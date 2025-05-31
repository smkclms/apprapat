
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
  .card:hover {
    transform: translateY(-4px);
    transition: 0.3s ease;
    box-shadow: 0 6px 16px rgba(0,0,0,0.15);
  }

  .dark-mode {
    background-color: #121212;
    color: white;
  }

  .dark-mode .card {
    background-color: #1f1f1f !important;
    color: white;
  }

  .dark-toggle {
    position: fixed;
    top: 15px;
    right: 15px;
    z-index: 999;
  }

  footer {
    background: #f8f8f8;
    font-size: 14px;
    color: #555;
  }

  .dark-mode footer {
    background-color: #1f1f1f;
    color: #aaa;
  }
</style>

<!-- Dark mode toggle (opsional) -->
<button class="btn btn-outline-dark dark-toggle" onclick="document.body.classList.toggle('dark-mode')">
  <i class="bi bi-moon-fill"></i>
</button>

<h3 class="mb-1">Selamat datang, <strong><?php echo $nama; ?></strong>!</h3>
<p class="text-muted">Level Anda: <span class="badge bg-secondary"><?php echo ($level == 1) ? 'Guru' : 'Siswa'; ?></span></p>

<div class="row mt-4">
  <div class="col-md-4 mb-4">
    <div class="card text-white bg-primary h-100 shadow-sm">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5 class="card-title">Total User Siswa</h5>
          <p class="card-text display-6 mb-0"><?php echo $total_users; ?></p>
        </div>
        <i class="bi bi-people-fill display-4"></i>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card text-white bg-success h-100 shadow-sm">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5 class="card-title">Total Rapat</h5>
          <p class="card-text display-6 mb-0"><?php echo $total_rapat; ?></p>
        </div>
        <i class="bi bi-calendar-check-fill display-4"></i>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card text-white bg-info h-100 shadow-sm">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5 class="card-title">Rapat Akan Datang</h5>
          <p class="card-text display-6 mb-0"><?php echo $rapat_akan_datang; ?></p>
        </div>
        <i class="bi bi-clock-history display-4"></i>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card text-white bg-warning h-100 shadow-sm">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5 class="card-title">Rapat Selesai</h5>
          <p class="card-text display-6 mb-0"><?php echo $rapat_selesai; ?></p>
        </div>
        <i class="bi bi-check-circle-fill display-4"></i>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card text-white bg-danger h-100 shadow-sm">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h5 class="card-title">Rapat Berlangsung</h5>
          <p class="card-text display-6 mb-0"><?php echo $rapat_berlangsung; ?></p>
        </div>
        <i class="bi bi-broadcast-pin display-4"></i>
      </div>
    </div>
  </div>
</div>

<?php if ($level == 1 && !empty($recent_logs)): ?>
  <div class="card mt-5 shadow-sm">
    <div class="card-header bg-secondary text-white">
      <strong>Log Aktivitas Terbaru</strong>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
          <thead class="table-light">
            <tr>
              <th>Waktu</th>
              <th>Pengguna</th>
              <th>Aktivitas</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recent_logs as $log): ?>
              <tr>
                <td><?= date('d/m/Y H:i', strtotime($log->waktu)) ?></td>
                <td><?= $log->nama ?></td>
                <td><?= $log->aktivitas ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer text-end">
      <a href="<?= site_url('log_aktivitas') ?>" class="btn btn-sm btn-secondary">Lihat Semua</a>
    </div>
  </div>
<?php endif; ?>

<footer class="text-center mt-5 py-3">
  Dev: <a href="https://www.profilsaya.my.id" target="_blank">Muhamad_Nazmudin</a> &copy; 2025
</footer>
