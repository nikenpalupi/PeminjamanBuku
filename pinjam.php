<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Mengambil data dari formulir
  $id_anggota = isset($_POST['id_anggota']) ? $_POST['id_anggota'] : '';
  $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
  $judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
  $penulis = isset($_POST['penulis']) ? $_POST['penulis'] : '';
  $tgl_pinjam = isset($_POST['tgl_pinjam']) ? $_POST['tgl_pinjam'] : '';
  $tgl_kembali = isset($_POST['tgl_kembali']) ? $_POST['tgl_kembali'] : '';

  // Membuat koneksi ke database
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'peminjamanbuku';

  $koneksi = mysqli_connect($host, $user, $password, $database);

  if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
  }

  // Memasukkan data ke dalam tabel
  $query = "INSERT INTO tbl_pinjam (id_anggota, nama, judul_buku, penulis, tgl_pinjam, tgl_kembali) VALUES ('$id_anggota', '$nama', '$judul_buku','$penulis', '$tgl_pinjam', '$tgl_kembali')";

  if (mysqli_query($koneksi, $query)) {
    echo '<script>alert("Peminjaman berhasil dilakukan"); location.href="tampil.php";</script>';
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
  }
  // Menutup koneksi
  mysqli_close($koneksi);
}

$judul_buku = $_GET['judul'] ?? '';
$penulis = $_GET['penulis'] ?? '';
?>

<html>
<head>
  <title>Peminjaman Buku</title>
  <link rel="stylesheet" type="text/css" href="pinjam.css">
</head>
<body>
  <h1>Peminjaman Buku</h1>
  <form action="pinjam.php" method="POST">
    <fieldset>
        <legend>Peminjaman Buku</legend>
        <label for="id_anggota"> ID Anggota:</label>
        <input type="text" id="id_anggota" name="id_anggota" required>

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="judul">Judul Buku:</label>
        <input type="text" id="judul" name="judul_buku" value="<?php echo $judul_buku;?>" required>

        <label for="judul">Penulis:</label>
        <input type="text" id="penulis" name="penulis" value="<?php echo $penulis;?>" required>

        <label for="tanggal">Tgl_Peminjaman:</label>
        <input type="date" id="tanggal" name="tgl_pinjam" required>

        <label for="tanggal">Tgl_Kembali:</label>
        <input type="date" id="tanggal" name="tgl_kembali" required>

        <input type="submit" value="Pinjam Buku">
    </fieldset>
  </form>
</body>
</html>
