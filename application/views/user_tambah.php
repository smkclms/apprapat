<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
</head>
<body>
    <h2>Tambah User Baru</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <p style="color:green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>

    <?php echo validation_errors('<p style="color:red;">', '</p>'); ?>

    <form method="post" action="<?php echo site_url('user/simpan'); ?>">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?php echo set_value('nama'); ?>" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Role:</label><br>
        <select name="id_role" required>
            <option value="">-- Pilih Role --</option>
            <option value="1" <?php echo set_select('id_role', '1'); ?>>Guru (Admin)</option>
            <option value="2" <?php echo set_select('id_role', '2'); ?>>Siswa (Admin Terbatas)</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
