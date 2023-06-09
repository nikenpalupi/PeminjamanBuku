<?php 
session_start();
include 'koneksi_Db.php';

if (isset($_POST['commit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM t_user WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['password'] = $row['password'];
        $_SESSION['nama'] = $row['nama'];
        #echo "Login berhasil";
        header("Location: home.php");
        exit();
    } else {
        echo "Login gagal. Periksa kembali Username dan Password Anda.";
    }
}

?>

<html>
<head>
    <title>Login Anggota</title>
    <link rel="stylesheet"  href="login.css">
</head>
<body>
    <form method="POST" action="login.php">
        <div class="tampilan">
        <div class="kepala">
            <div class="logo"></div>
            <h2 class="judul">Login Anggota</h2>
        </div>
        <div class="artikel">
        <div class="kesalahan">
<?php
    if(isset($_GET["login_error"])){
        echo "Username atau password salah";
    }
?>
</div>
<div class="kotak">
    <p><input type="text" name="username" value="" placeholder="Masukan Username Anda"></p>
    <p><input type="password" name="password" value="" placeholder="Masukan Password Anda"></p>
    <p class="submit"><input type="submit" name="commit" value="Login"></p>
</form>
</div>
</div>

 </div>
</div>
</body>
</html> 
