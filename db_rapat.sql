-- ada kolom yang saya tidak ikutkan, silahkan cari dan tambahkan sendiri untuk melengkapinya

-- phpMyAdmin SQL Dump
-- Custom Dump for Aplikasi Rapat (Sempurna & Lengkap)
-- Generation Time: 2025-05-27 05:40:00
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `db_rapat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_rapat`;

-- Table: roles
CREATE TABLE `roles` (
  `id_role` INT AUTO_INCREMENT PRIMARY KEY,
  `role_name` VARCHAR(50) NOT NULL UNIQUE COMMENT 'Contoh: guru, siswa, tamu',
  `description` VARCHAR(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert default roles
INSERT INTO `roles` (`role_name`, `description`) VALUES
('guru', 'Admin utama dengan akses penuh'),
('siswa', 'Admin dengan akses terbatas'),
('tamu', 'Pengguna tanpa login untuk daftar hadir');

-- Table: users
CREATE TABLE `users` (
  `id_user` INT AUTO_INCREMENT PRIMARY KEY,
  `nama` VARCHAR(100) NOT NULL,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `no_telepon` VARCHAR(20) DEFAULT NULL,
  `id_role` INT NOT NULL DEFAULT 2 COMMENT 'Referensi ke roles.id_role',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_role`) REFERENCES roles(`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_users_username ON users(username);

-- Table: rapat
CREATE TABLE `rapat` (
  `id_rapat` INT AUTO_INCREMENT PRIMARY KEY,
  `judul` VARCHAR(255) NOT NULL,
  `agenda` TEXT NOT NULL,
  `tanggal` DATE NOT NULL,
  `jam_mulai` TIME NOT NULL,
  `jam_selesai` TIME DEFAULT NULL,
  `status` ENUM('pending', 'berlangsung', 'selesai') DEFAULT 'pending',
  `created_by` INT NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`created_by`) REFERENCES users(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_rapat_tanggal ON rapat(tanggal);

-- Table: undangan
CREATE TABLE `undangan` (
  `id_undangan` INT AUTO_INCREMENT PRIMARY KEY,
  `id_rapat` INT NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) DEFAULT NULL,
  `instansi` VARCHAR(100) DEFAULT NULL,
  `status` ENUM('belum', 'diterima', 'ditolak') DEFAULT 'belum',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_rapat`) REFERENCES rapat(`id_rapat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_undangan_rapat ON undangan(id_rapat);

-- Table: daftar_hadir
CREATE TABLE `daftar_hadir` (
  `id_hadir` INT AUTO_INCREMENT PRIMARY KEY,
  `id_rapat` INT NOT NULL,
  `nama` VARCHAR(100) NOT NULL,
  `instansi` VARCHAR(100) DEFAULT NULL,
  `waktu_hadir` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `keterangan` VARCHAR(255) DEFAULT NULL,
  FOREIGN KEY (`id_rapat`) REFERENCES rapat(`id_rapat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_daftar_hadir_rapat ON daftar_hadir(id_rapat);

-- Table: notulen
CREATE TABLE `notulen` (
  `id_notulen` INT AUTO_INCREMENT PRIMARY KEY,
  `id_rapat` INT NOT NULL,
  `isi_notulen` TEXT NOT NULL,
  `disusun_oleh` INT NOT NULL,
  `waktu_input` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_rapat`) REFERENCES rapat(`id_rapat`),
  FOREIGN KEY (`disusun_oleh`) REFERENCES users(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_notulen_rapat ON notulen(id_rapat);

-- Table: file_lampiran
CREATE TABLE `file_lampiran` (
  `id_file` INT AUTO_INCREMENT PRIMARY KEY,
  `id_rapat` INT NOT NULL,
  `nama_file` VARCHAR(255) NOT NULL,
  `path_file` VARCHAR(255) NOT NULL,
  `file_type` VARCHAR(50) DEFAULT NULL COMMENT 'Contoh: pdf, docx, jpg',
  `uploaded_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_rapat`) REFERENCES rapat(`id_rapat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_file_lampiran_rapat ON file_lampiran(id_rapat);

-- Table: log_aktivitas
CREATE TABLE `log_aktivitas` (
  `id_log` INT AUTO_INCREMENT PRIMARY KEY,
  `id_user` INT DEFAULT NULL,
  `aktivitas` VARCHAR(255) NOT NULL,
  `waktu` DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_user`) REFERENCES users(`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE INDEX idx_log_aktivitas_user ON log_aktivitas(id_user);
