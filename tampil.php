<?php
session_start();
include 'koneksi_Db.php';

// Fungsi untuk mendapatkan data barang berdasarkan ID
function getPinjamgById($id) {
    global $conn;
    $query = "SELECT * FROM tbl_pinjam WHERE id = '$id'";
    $result = $conn->query($query);
    return $result->fetch_assoc();
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    $tgl_pinjam = date('Y-m-d', strtotime($tgl_pinjam));
    $tgl_kembali = date('Y-m-d', strtotime($tgl_kembali));

    $query = "UPDATE tbl_pinjam SET id = '$id', nama = '$nama', judul_buku = '$judul_buku', penulis = '$penulis', tgl_pinjam = '$tgl_pinjam', tgl_kembali = '$tgl_kembali' WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan saat memperbarui data.";
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    $query = "DELETE FROM tbl_pinjam WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
}

// Mendapatkan semua data pinjam
$query = "SELECT * FROM tbl_pinjam";
$result = $conn->query($query);

// Inisialisasi variabel $dataPinjam sebagai array
$dataPinjam = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPinjam[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Data Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b36937;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #a6774c;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h3 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            outline: 1px solid #ddd;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table td a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
            padding: 6px 12px;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #fff;
            transition: background-color 0.3s ease;
        }

        table td a:hover {
            background-color: #007bff;
            color: #fff;
        }

        table td a.delete {
            color: #dc3545;
            border-color: #dc3545;
        }

        table td a.delete:hover {
            background-color: #dc3545;
        }

        p {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data Pinjaman</h3>
        <?php if (count($dataPinjam) > 0) : ?>
        <table>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($dataPinjam as $pinjam) : ?>
            <tr>
                <td><?= $pinjam['id_anggota']; ?></td>
                <td><?= $pinjam['nama']; ?></td>
                <td><?= $pinjam['judul_buku']; ?></td>
                <td><?= $pinjam['penulis']; ?></td>
                <td><?= $pinjam['tgl_pinjam']; ?></td>
                <td><?= $pinjam['tgl_kembali']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $pinjam['id_anggota']; ?>" class="edit">Edit</a>
                    <a href="delete.php?hapus=<?= $pinjam['id_anggota']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="delete">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else : ?>
        <p>Tidak ada data pinjaman.</p>
        <?php endif; ?>
    </div>
</body>
</html>
