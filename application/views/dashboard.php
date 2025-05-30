

<h3>Selamat datang, <?php echo $nama; ?>!</h3>
<p>Level Anda: <?php echo ($level == 1) ? 'Guru' : 'Siswa'; ?></p>

<div class="row mt-4">
  <div class="col-md-4 mb-3">
    <div class="card text-white bg-primary h-100">
      <div class="card-body">
        <h5 class="card-title">Total User Siswa</h5>
        <p class="card-text display-6"><?php echo $total_users; ?></p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card text-white bg-success h-100">
      <div class="card-body">
        <h5 class="card-title">Total Rapat</h5>
        <p class="card-text display-6"><?php echo $total_rapat; ?></p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card text-white bg-info h-100">
      <div class="card-body">
        <h5 class="card-title">Rapat Akan Datang</h5>
        <p class="card-text display-6"><?php echo $rapat_akan_datang; ?></p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card text-white bg-warning h-100">
      <div class="card-body">
        <h5 class="card-title">Rapat Selesai</h5>
        <p class="card-text display-6"><?php echo $rapat_selesai; ?></p>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-3">
    <div class="card text-white bg-danger h-100">
      <div class="card-body">
        <h5 class="card-title">Rapat Berlangsung</h5>
        <p class="card-text display-6"><?php echo $rapat_berlangsung; ?></p>
      </div>
    </div>
  </div>
</div>

<!-- <a href="<?php echo site_url('auth/logout'); ?>" class="btn btn-danger mt-3">Logout</a> -->

