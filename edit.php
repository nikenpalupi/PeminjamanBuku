<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi_Db.php';

    if (isset($_GET['id'])) {
        $id_anggota = $_GET['id'];
        $query = "SELECT * FROM tbl_pinjam WHERE id_anggota = '$id_anggota'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Error: " . mysqli_errno($conn) . " - " . mysqli_error($conn));
        }

        $data = mysqli_fetch_assoc($result);
        $id_anggota = $data["id_anggota"];
        $nama = $data["nama"];
        $judul_buku = $data["judul_buku"];
        $penulis = $data["penulis"];
        $tgl_pinjam = $data["tgl_pinjam"];
        $tgl_kembali = $data["tgl_kembali"];
    } else {
        header("location: pinjam.php");
        exit();
    }
// }
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b36937;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .container {
            width: 400px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        form {
            margin-top: 20px;
        }

        fieldset {
            border: none;
            padding: 0;
            margin: 0;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            color: #A9907E;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #A9907E;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #b36937;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #896C5F;
        }
    </style>
</head>
<body>
    <h1>Edit Data</h1>
    <div class="container">
        <form id="form_pendaftaran" action="proses_edit.php" method="post">
            <fieldset>
                <legend>Edit Data</legend>
                <p>
                    <label for="id">ID</label>
                    <input type="hidden" name="id" value="<?php echo $id_anggota; ?>">
                    <input type="text" name="idDisabled" id="idDisabled" value="<?php echo $id_anggota ?>">
                </p>
                <p>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $nama ?>">
                </p>
                <p>
                    <label for="judul_buku">Judul Buku</label>
                    <input type="text" name="judul_buku" id="judul_buku" value="<?php echo $judul_buku ?>">
                </p>
                <p>
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" value="<?php echo $penulis ?>">
                </p>
                <p>
                    <label for="tgl_pinjam">Tgl Pinjam</label>
                    <input type="text" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo $tgl_pinjam ?>">
                </p>
                <p>
                    <label for="tgl_kembali">Tgl Kembali</label>
                    <input type="text" name="tgl_kembali" id="tgl_kembali" value="<?php echo $tgl_kembali?>">
                </p>
            </fieldset>
            <p>
                <input type="submit" name="edit" value="Update Data">
            </p>
        </form>
    </div>
</body>
</html>
