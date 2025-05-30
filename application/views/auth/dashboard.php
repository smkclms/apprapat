<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?php echo $nama; ?>!</h2>
    <p>Level Anda: <?php echo $level; ?></p>
    <p><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></p>
</body>
</html>
