<!DOCTYPE html>
<html>
<head>
    <title>Login Aplikasi Rapat</title>
</head>
<body>
    <h2>Login</h2>
    <?php if($this->session->flashdata('error')): ?>
        <p style="color:red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('auth/do_login'); ?>">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
