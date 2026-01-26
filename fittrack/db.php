<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "fittrack_db");
if (!$conn) { die("Koneksi Gagal: " . mysqli_connect_error()); }
?>