<?php
$koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

$id = $_POST["id"];
$nama = $_POST["nama"];
$judul_buku = $_POST["judul_buku"];
$penulis = $_POST["penulis"];
$tgl_pinjam = $_POST["tgl_pinjam"];
$tgl_kembali = $_POST["tgl_kembali"];


$query = "UPDATE peminjaman_buku SET nama='$nama', judul_buku='$judul_buku', tanggal_pinjam='$tanggal_pinjam' WHERE id=$id";

if (mysqli_query($koneksi, $query)) {
    header("Location: home.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
