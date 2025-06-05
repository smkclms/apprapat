<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login dan Daftar Hadir - Aplikasi Rapat</title>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" /> -->
  <!-- Ganti ke lokal -->
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-icons.css') ?>">
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #fce4ec);
      min-height: 100vh;
      padding-top: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
      height: auto;
       }
       
    .card:hover {
      transform: translateY(-2px);
    }
    h3 {
      font-weight: 600;
    }
    .form-label {
      font-weight: 500;
    }
    .btn {
      font-weight: 500;
    }
    .container {
  padding-bottom: 100px; /* atau lebih besar dari tinggi footer */
}

  </style>
</head>
<body>

<div class="container px-3">
  <div class="row flex-column flex-lg-row g-4 align-items-stretch justify-content-center">

<!-- FORM LOGIN AGAR MUNCUL STRIP - UNTUK MEMPERKECIL LAYOUT -->
 <div class="card p-4 mx-auto" style="max-width: 500px;">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="text-primary mb-0">
      <i class="bi bi-person-lock me-2"></i>Login Aplikasi Rapat
    </h3>
    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#loginForm" aria-expanded="true" aria-controls="loginForm">
      <i class="bi bi-dash"></i>
    </button>
  </div>

  <div class="collapse show" id="loginForm">
    <form method="post" action="<?php echo site_url('auth/do_login'); ?>">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" id="username" name="username" class="form-control" required autofocus />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <input type="password" id="password" name="password" class="form-control" required />
          <button class="btn btn-outline-secondary" type="button" id="togglePassword">
            <i class="bi bi-eye-slash" id="eyeIcon"></i>
          </button>
        </div>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>
    <!-- Form Login NORMAL-->
    <!-- <div class="col-lg-5">
      <div class="card p-4">
        <h3 class="mb-3 text-primary"><i class="bi bi-person-lock me-2"></i>Login Aplikasi Rapat</h3>

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
            <div class="input-group">
            <input type="password" id="password" name="password" class="form-control" required />
            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
              <i class="bi bi-eye-slash" id="eyeIcon"></i>
            </button>
          </div>

          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div> -->

    <!-- Daftar Hadir & Jadwal -->
    <div class="col-lg-7">
      <div class="card p-4 mb-4">
        <h3 class="mb-3 text-success"><i class="bi bi-pencil-square me-2"></i>Daftar Hadir Tamu</h3>

        <?php if($this->session->flashdata('success')): ?>
          <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

        <form method="post" action="<?php echo site_url('daftarhadirtamu'); ?>">
          <div class="mb-3">
            <label for="id_rapat" class="form-label">Pilih Rapat</label>
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
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required />
          </div>
          <div class="mb-3">
            <label for="instansi" class="form-label">Instansi</label>
            <input type="text" name="instansi" id="instansi" class="form-control" required />
          </div>
          <button type="submit" class="btn btn-success w-100">Kirim</button>
        </form>
      </div>

      <div class="card p-4">
        <h3 class="mb-3 text-info"><i class="bi bi-calendar3 me-2"></i>Jadwal Rapat Mendatang</h3>
        <?php if(count($rapat_list) == 0): ?>
          <p>Tidak ada rapat yang dijadwalkan.</p>
        <?php else: ?>
          <ul class="list-group">
            <?php foreach(array_slice($rapat_list, 0, 4) as $rapat): ?>
              <li class="list-group-item">
                <strong><?php echo htmlspecialchars($rapat->judul); ?></strong><br />
                Tanggal: <?php echo $rapat->tanggal; ?> |
                Jam: <?php echo $rapat->jam_mulai; ?> - <?php echo $rapat->jam_selesai ?: '-'; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<footer style="width: 100%; text-align: center; padding: 10px 0; font-size: 14px; color: #555; position: fixed; bottom: 0; left: 0; background: #f8f8f8;">
  Dev: <a href="https://www.profilsaya.my.id" target="_blank" rel="noopener noreferrer">Muhamad_Nazmudin</a> @2025
</footer>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- JS local -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script>
  const togglePassword = document.getElementById("togglePassword");
  const passwordField = document.getElementById("password");
  const eyeIcon = document.getElementById("eyeIcon");

  togglePassword.addEventListener("click", function () {
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;

    // Ganti ikon
    eyeIcon.classList.toggle("bi-eye");
    eyeIcon.classList.toggle("bi-eye-slash");
  });
</script>

</body>
</html>
