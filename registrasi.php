<?php
include "koneksi_Db.php";

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek_user = mysqli_query($conn, "SELECT * FROM registrasi WHERE username = '$username'");
    // $cek_login = mysqli_num_rows($cek_user);

    if ($cek_user) {
        echo "<script>
            alert('Username telah terdaftar');
            window.location = 'logIn.php';
        </script>";
    } else {
        $query = "INSERT INTO t_user (nama, username, password) VALUES ('$nama', '$username', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>
                alert('Registrasi telah berhasil');
                window.location = 'login.php';
            </script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Peminjaman Buku</title>
    <style>
        body {
            background-image: url("gambar/book\ lagi.jpg");
            font-family: Arial, sans-serif;
        }

        .box {
            width: 300px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: #b36937;
        }

        .box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }

        .inputBox input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            border: none;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }

        .inputBox span {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #999;
            pointer-events: none;
            transition: 0.5s;
        }

        .inputBox input:focus ~ span,
        .inputBox input:valid ~ span {
            top: -20px;
            font-size: 12px;
            color: #af6553;
        }

        .inputBox input[type="submit"] {
            background-color: #af6553;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .borderLine {
            position: absolute;
            bottom: -10px;
            width: 100%;
            height: 2px;
            background-color: #af6553;
        }

        .button-container input[type="submit"]:hover {
            background-color: #925343;
        }
        
        .button-container input[type="submit"] {
        background-color: #af6553;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button-container input[type="submit"]:hover {
        background-color: #925343;
    }
    </style>
    
</head>

<body>
    <div class="box">
        <span class="borderLine"></span>
        <form action="" method="POST">
            <h2>-SIGN IN-</h2>
            <div class="inputBox">
                <input type="name" required="required" name="nama">
                <span>Nama</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" required="required" name="username">
                <span>Username</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" required="required" name="password">
                <span>password</span>
                <i></i>
            </div>
            <div class="button-container">
                <input type="submit" value="daftar" name="daftar">
            </div>
        </form>
    </div>
<body>