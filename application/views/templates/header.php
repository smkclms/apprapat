<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo isset($title) ? $title : 'Aplikasi Rapat'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <style>
    body {
      overflow-x: hidden;
      padding-top: 56px;
      margin: 0;
    }
    #sidebar {
      position: fixed;
      top: 56px;
      left: 0;
      width: 220px;
      height: calc(100vh - 56px);
      background-color: #007bff;
      color: white;
      transition: transform 0.3s ease;
      transform: translateX(0);
      overflow-y: auto;
      z-index: 1030;
    }
    #sidebar.collapsed {
      transform: translateX(-220px);
    }
    #sidebar .nav-link {
      color: white;
    }
    #sidebar .nav-link:hover {
      background: rgba(255,255,255,0.1);
      color: white;
    }
    #content {
      margin-left: 220px;
      padding: 20px;
      transition: margin-left 0.3s ease;
    }
    #content.expanded {
      margin-left: 0 !important;
    }
    @media (max-width: 768px) {
      #sidebar {
        top: 56px;
        width: 220px;
        height: calc(100vh - 56px);
      }
      #sidebar.collapsed {
        transform: translateX(-220px);
      }
      #content, #content.expanded {
        margin-left: 0 !important;
      }
    }
    #sidebar img {
      object-fit: cover;
      width: 80px;
      height: 80px;
      border-radius: 50%;
    }
    .profile-panel {
      background-color: #0056b3;
      border-radius: 8px;
      padding: 15px 10px;
      margin-bottom: 15px;
      text-align: center;
    }
    .profile-name {
      font-size: 1.2rem;
      line-height: 1.2;
      color: white;
      font-weight: 600;
      margin-bottom: 5px;
    }
    .profile-edit-link {
      display: block;
      margin-top: 4px;
      color: white;
      font-size: 0.85rem;
      text-decoration: none;
    }
    .profile-edit-link:hover {
      text-decoration: underline;
    }
    #sidebar ul.nav {
      background-color: #007bff;
      border-radius: 8px;
      padding-top: 10px;
      padding-bottom: 10px;
      margin: 0;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <div class="container-fluid">
    <button class="btn btn-primary" id="sidebarToggle" aria-label="Toggle sidebar">
      <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand ms-2" href="<?php echo site_url('dashboard'); ?>">Aplikasi Rapat</a>
  </div>
</nav>

<div id="sidebar" class="pt-3">

  <div class="profile-panel">
    <img src="<?php 
      $foto = $this->session->userdata('foto');
      echo base_url('uploads/profil/' . (isset($foto) && $foto != '' ? $foto : 'default.jpg')); 
    ?>" alt="Foto Profil" class="rounded-circle mb-2" />
    <div class="profile-name"><?php echo $this->session->userdata('nama'); ?></div>
    <a href="<?php echo site_url('profile'); ?>" class="profile-edit-link">Edit Profil</a>
  </div>

  <ul class="nav nav-pills flex-column mb-auto mt-3">
    <li class="nav-item">
      <a href="<?php echo site_url('dashboard'); ?>" class="nav-link text-white">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
    </li>
    <?php if ($this->session->userdata('level') == 1): // hanya guru yang lihat menu ini ?>
<li>
  <a href="<?php echo site_url('user'); ?>" class="nav-link text-white">
    <i class="bi bi-people me-2"></i> Manajemen User
  </a>
</li>
<?php endif; ?>

    <li>
      <a href="<?php echo site_url('rapat'); ?>" class="nav-link text-white">
        <i class="bi bi-calendar-event me-2"></i> Rapat
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('notulen'); ?>" class="nav-link text-white">
        <i class="bi bi-journal-text me-2"></i> Notulen
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link text-white">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
      </a>
    </li>
  </ul>
</div>
<!-- <ul class="nav nav-pills flex-column mb-auto mt-3">
  <li class="nav-item">
    <a href="<?php echo site_url('dashboard'); ?>" class="nav-link text-white">
      <i class="bi bi-speedometer2 me-2"></i> Dashboard
    </a>
  </li>
  <li>
    <a href="<?php echo site_url('rapat'); ?>" class="nav-link text-white">
      <i class="bi bi-calendar-event me-2"></i> Rapat
    </a>
  </li>
  <li>
    <a href="<?php echo site_url('notulen'); ?>" class="nav-link text-white">
      <i class="bi bi-journal-text me-2"></i> Notulen
    </a>
  </li>
  <li>
    <a href="<?php echo site_url('user'); ?>" class="nav-link text-white">
      <i class="bi bi-people me-2"></i> Manajemen User
    </a>
  </li>
  <li>
    <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link text-white">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </a>
  </li>
</ul> -->


<div id="content" class="pt-3 mt-4">
