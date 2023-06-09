<?php
include 'koneksi_Db.php';

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id= validateInput($_POST['id']);
    $nama = validateInput($_POST['nama']);
    $judul_buku = validateInput($_POST['judul_buku']);
    $penulis = validateInput($_POST['penulis']);
    $tgl_pinjam = validateInput($_POST['tgl_pinjam']);
    $tgl_kembali = validateInput($_POST['tgl_kembali']);


    $sql = "INSERT INTO tbl_pinjam( id, nama, judul_buku, penulis, tgl_pinjam, tgl_kembali) VALUES ( '$id', '$nama',  '$judul_buku',  '$penulis', '$tgl_pinjam', '$tgl_kembali')";

    if (mysqli_query($conn,$sql )) {
        echo "Peminjaman berhasil";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Siswa Baru</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<style>
        body {
            background-image: url(gambar/bukuuu.jpg);
        }
        h1 {
        color: white;
        }
        img.img {
        width: 50%;
        height: 308px;
        object-fit: cover;
        }
    </style>
<nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="tambah.php">Tambah Siswa</a></li>
            <li><a href="daftar_siswa.php">Daftar Siswa</a></li>
            <li><a href="syarat.php">Syarat</a></li>
        </ul>
    </nav>
<body>
    <section class="box-formulir">
        <h2>Peminjaman Buku</h2>
        <form action="" method="post">
            <div class="box">
                <table class="table-form">
                    <tr>
                        <td>Id</td>
                        <td>:</td>
                        <td>
                            <input type= "text"  name="id" class= "input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <input type= "text"  name="nama" class= "input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td>
                            <input type= "text"  name="judul_buku" class= "input-control">
                        </td>
                    </tr>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td>
                            <input type= "text"  name="penulis" class= "input-control">
                        </td>
                    </tr>
                    <tr>
                        <td>Tgl Pinjam</td>
                        <td>:</td>
                        <td>
                            <input type= "text"  name="tgl_pinjam" class= "input-control" placeholder="yyyy-mm-dd">
                        </td>
                    </tr>
                
                    <tr>
                        <td>Tgl Kembali</td>
                        <td>:</td>
                        <td>
                            <input type= "text"  name="tgl_kembali" class= "input-control" placeholder="yyyy-mm-dd">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type= "submit" name="submit" class="btn_daftar" value="Pinjam Sekarang">
                        </td>
                    </tr>



        </form>
    </section>
    
   
</body>
</html>