<?php
session_start();
include 'koneksi_Db.php';

// Fungsi untuk mendapatkan data barang berdasarkan ID
function getBarangById($id) {
    global $conn;
    $query = "SELECT * FROM tbl_pinjam WHERE id = '$id'";
    $result = $conn->query($query);
    return $result->fetch_assoc();
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $idBarang = $_POST['idbarang'];
    $tglBarangMasuk = $_POST['tanggal'];
    $tipeBarang = $_POST['tipeBarang'];
    $keterangan = $_POST['keterangan'];

    $tglBarangMasuk = date('Y-m-d', strtotime($tglBarangMasuk));

    $query = "UPDATE t_barang SET nama = '$nama', idbarang = '$idBarang', tanggal = '$tglBarangMasuk', tipeBarang = '$tipeBarang', keterangan = '$keterangan' WHERE idbarang = '$id'";
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

    $query = "DELETE FROM t_barang WHERE idbarang = '$id'";
    $result = $conn->query($query);

    if ($result) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan saat menghapus data.";
    }
}

// Mendapatkan semua data barang
$query = "SELECT * FROM t_barang";
$result = $conn->query($query);
$dataBarang = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataBarang[] = $row;
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
    <title>Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Data Barang</h3>
        <table>
            <tr>
                <th>Nama</th>
                <th>ID Barang</th>
                <th>Tanggal Barang Masuk</th>
                <th>Tipe Barang</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($dataBarang as $barang) : ?>
            <tr>
                <td><?= $barang['nama']; ?></td>
                <td><?= $barang['idbarang']; ?></td>
                <td><?= $barang['tanggal']; ?></td>
                <td><?= $barang['tipeBarang']; ?></td>
                <td><?= $barang['keterangan']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $barang['idbarang']; ?>">Edit</a>
                    <a href="hapus.php?hapus=<?= $barang['idbarang']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
