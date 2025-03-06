<?php
$host = "localhost"; // Server database
$user = "root"; // Username default XAMPP
$pass = ""; // Password default kosong
$db   = "db_chart"; // Nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
