<?php

include 'koneksi_Db.php';

if ($_SERVER["REQUEST_METHOD"]=="POST") {

$id = $_POST["id"];
$nama = $_POST["nama"];
$judul_buku = $_POST["judul_buku"];
$penulis = $_POST["penulis"];
$tgl_pinjam = $_POST["tgl_pinjam"];
$tgl_kembali = $_POST["tgl_kembali"];


$query = "UPDATE tbl_pinjam SET nama='$nama', judul_buku='$judul_buku', penulis='$penulis', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali' WHERE id_anggota='$id'";
echo $query;
$result = mysqli_query($conn, $query);

if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
    " - ".mysqli_error($link));
} else {
    header("location:tampil.php");
}
}
?>