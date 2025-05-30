<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login dan Daftar Hadir - Aplikasi Rapat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      padding-top: 40px;
    }
    .container {
      max-width: 900px;
    }
  </style>
</head>
<body>

<div class="container">

  <div class="row">
    <!-- Form Login -->
    <div class="col-md-5">
      <div class="card p-4 mb-4">
        <h3 class="mb-3">Login Aplikasi Rapat</h3>

        <?php if($this->session->flashdata('error')): ?>
          <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo site_url('auth/do_login'); ?>">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required autofocus />
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required />
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>

    <!-- Daftar Hadir Tamu dan List Rapat -->
    <div class="col-md-7">
      <div class="card p-4 mb-4">
        <h3 class="mb-3">Daftar Hadir Tamu</h3>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form method="post" action="<?php echo site_url('daftarhadirtamu'); ?>">
          <div class="mb-3">
            <label for="id_rapat">Pilih Rapat</label>
            <select name="id_rapat" id="id_rapat" class="form-select" required>
              <option value="">-- Pilih Rapat --</option>
              <?php foreach($rapat_list as $rapat): ?>
                <option value="<?php echo $rapat->id_rapat; ?>">
                  <?php echo htmlspecialchars($rapat->judul); ?> (<?php echo $rapat->tanggal; ?>)
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="instansi">Instansi</label>
            <input type="text" name="instansi" id="instansi" class="form-control" required />
          </div>
          <button type="submit" class="btn btn-success w-100">Kirim</button>
        </form>
      </div>

      <div class="card p-4">
        <h3 class="mb-3">Jadwal Rapat Mendatang</h3>
        <?php if(count($rapat_list) == 0): ?>
          <p>Tidak ada rapat yang dijadwalkan.</p>
        <?php else: ?>
          <ul class="list-group">
            <?php foreach($rapat_list as $rapat): ?>
              <li class="list-group-item">
                <strong><?php echo htmlspecialchars($rapat->judul); ?></strong><br />
                Tanggal: <?php echo $rapat->tanggal; ?> | Jam: <?php echo $rapat->jam_mulai; ?> - <?php echo isset($rapat->jam_selesai) && $rapat->jam_selesai != '' ? $rapat->jam_selesai : '-'; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
