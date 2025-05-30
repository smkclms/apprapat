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

    /* Warna biru dasar yang diminta: rgb(52, 144, 236) -> #3490ec */
    /* Akan digunakan sebagai referensi untuk variasi warna */

    #sidebar {
      position: fixed;
      top: 56px;
      left: 0;
      width: 220px;
      height: calc(100vh - 56px);
      /* Warna sidebar utama: lebih gelap sedikit dari biru dasar untuk kontras */
      background-color: #2b6cb0; /* Biru yang lebih dalam dan gelap */
      color: white;
      transition: transform 0.3s ease;
      transform: translateX(0);
      overflow-y: auto;
      z-index: 1030;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.25);
    }

    /* Panel profil: Menggunakan warna biru dasar dengan sedikit penyesuaian */
    .profile-panel {
      background-color: #3490ec; /* Warna biru dasar yang diminta */
      border-radius: 15px; /* Sudut membulat */
      padding: 20px 15px;
      margin: 15px; /* Jarak dari tepi sidebar */
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.25); /* Shadow lebih menonjol */
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      /* Tambahan efek gradien lembut (opsional) */
      background-image: linear-gradient(to bottom right, #3490ec, #2c84d4); /* Sedikit gradien ke biru yang lebih gelap */
    }

    /* Hover pada panel profil */
    .profile-panel:hover {
      background-color: #3f9be6; /* Sedikit lebih terang saat hover */
      box-shadow: 0 6px 12px rgba(0,0,0,0.35);
    }

    /* Nama profil */
    .profile-name {
      font-size: 1.4rem;
      line-height: 1.3;
      color: #f8f9fa; /* Hampir putih */
      font-weight: 700;
      margin-bottom: 8px;
      word-wrap: break-word;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    }

    /* Link edit profil */
    .profile-edit-link {
      display: block;
      margin-top: 6px;
      color: #e0e6eb; /* Warna teks lebih lembut */
      font-size: 0.95rem;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    .profile-edit-link:hover {
      color: #fff; /* Lebih terang saat hover */
      text-decoration: underline;
    }

    /* Navbar atas */
    .navbar.bg-primary {
      background-color: #2b6cb0 !important; /* Sesuaikan dengan warna sidebar utama */
    }

    /* Menu navigasi */
    #sidebar ul.nav {
      border-radius: 15px;
      padding: 12px 0;
      margin: 15px;
      box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.1); /* Sedikit shadow internal */
    }

    /* Link menu */
    #sidebar .nav-link {
      color: #ecf0f1; /* Warna teks yang cocok dengan background gelap */
      padding: 12px 20px;
      font-weight: 500;
      transition: background-color 0.3s ease, color 0.3s ease, border-radius 0.3s ease;
      border-radius: 8px;
      margin: 4px 10px;
      display: flex;
      align-items: center;
    }
    /* Icon menu */
    #sidebar .nav-link i {
      font-size: 1.2rem;
      margin-right: 12px;
    }
    /* Hover menu */
    #sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.15); /* Background lebih lembut saat hover */
      color: #fff;
      text-decoration: none;
      border-radius: 10px;
    }
    #sidebar .nav-link.active {
      background-color: rgba(255, 255, 255, 0.25); /* Background untuk item aktif */
      color: #fff;
      font-weight: 700;
      border-radius: 10px;
    }

    /* Scrollbar custom (opsional) */
    #sidebar::-webkit-scrollbar {
      width: 6px;
    }
    #sidebar::-webkit-scrollbar-thumb {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 3px;
    }
    #sidebar::-webkit-scrollbar-track {
      background: transparent;
    }

    #sidebar.collapsed {
      transform: translateX(-220px);
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
      border: 3px solid rgba(255,255,255,0.4); /* Border putih tipis pada foto profil */
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
      <a href="<?php echo site_url('dashboard'); ?>" class="nav-link">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
    </li>
    <?php if ($this->session->userdata('level') == 1): // hanya guru yang lihat menu ini ?>
<li>
  <a href="<?php echo site_url('user'); ?>" class="nav-link">
    <i class="bi bi-people me-2"></i> Manajemen User
  </a>
</li>
<?php endif; ?>

    <li>
      <a href="<?php echo site_url('rapat'); ?>" class="nav-link">
        <i class="bi bi-calendar-event me-2"></i> Rapat
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('notulen'); ?>" class="nav-link">
        <i class="bi bi-journal-text me-2"></i> Notulen
      </a>
    </a>
    </li>
    <li>
      <a href="<?php echo site_url('auth/logout'); ?>" class="nav-link">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
      </a>
    </li>
  </ul>
</div>

<div id="content" class="pt-3 mt-4">