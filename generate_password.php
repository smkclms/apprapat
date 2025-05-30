<?php
// Ganti 'password123' dengan password yang ingin Anda hash
$password_plain = 'password123';

// Generate hash password
$hash = password_hash($password_plain, PASSWORD_DEFAULT);

// Tampilkan hasil hash
echo "Password asli: " . $password_plain . "<br>";
echo "Password hash: " . $hash;
