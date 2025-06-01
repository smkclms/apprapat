<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap JS (untuk alert dismiss) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="container mt-4">
  <h3 class="mb-4"><i class="bi bi-upload me-2"></i>Import User dari Excel</h3>

  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
      <i class="bi bi-check-circle-fill me-2 fs-5"></i>
      <div><?php echo $this->session->flashdata('success'); ?></div>
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if(isset($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
      <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
      <div><?php echo $error; ?></div>
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <div class="card shadow-sm">
    <div class="card-body">
      <form method="post" action="<?php echo site_url('user/import'); ?>" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label"><i class="bi bi-file-earmark-excel me-1"></i> Pilih File Excel (.xlsx)</label>
          <input type="file" name="userfile" accept=".xlsx" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between">
          <a href="<?php echo site_url('user'); ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-upload"></i> Import
          </button>
        </div>
      </form>
    </div>
  </div>

  <div class="mt-3 alert alert-info">
    <strong>Format file Excel:</strong><br>
    Nama | Username | Password | Email (opsional)
  </div>
</div>
