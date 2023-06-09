<?php
include "koneksi_Db.php";

if(isset($_GET['hapus'])) {
    $id_anggota = $_GET['hapus'];

    // Melakukan sanitasi pada parameter id
    $id_anggota = mysqli_real_escape_string($conn, $id_anggota);

    $query = "DELETE FROM tbl_pinjam WHERE id_anggota ='$id_anggota'";
    $hasil_query = mysqli_query($conn, $query);
    if(!$hasil_query) {
        die ("Gagal menghapus data: ".mysqli_error($conn)." - ".mysqli_error($conn));
    }
}

header("location: tampil.php");
?>
