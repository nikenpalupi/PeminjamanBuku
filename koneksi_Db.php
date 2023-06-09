<?php
//Membuat koneksi ke database secara OOP
$conn = new mysqli("localhost", "root", "", "peminjamanbuku");
if($conn->connect_error) {
    die("Koneksi ke database Gagal: " . $conn->connect_error);
}
?>