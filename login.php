<?php
session_start();
require 'config/koneksi.php';
if (isset($_SESSION['login'])) {
    header('location:index.php?p=beranda');
    exit();
}

if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($koneksi, $_POST['name']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);


    $result = mysqli_query($koneksi, "SELECT * FROM user where username='$name' or email='$name'");
    $result_admin = mysqli_query($koneksi, "SELECT * FROM admin where username='$name'");

    // cek apakah dia admin
    if (mysqli_num_rows($result_admin) == 1) {
        //cek password
        $row = mysqli_fetch_assoc($result_admin);

        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = $row["id_admin"];
            header("location:admin/index.php?p=kategori");
        }


    }
    #cek apakah dia user
    if (mysqli_num_rows($result) == 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);

        //cek apakah password sama atau tidak
        if (password_verify($password, $row["password"])) {

            //set session
            $_SESSION["login"] = $row["id_user"];

            // set cookie
            setcookie("user", $row["id_user"], time() + (86400 * 30), "/");

            header("location:index.php?p=beranda");
            exit;
        } else {
            echo "<script>
            alert('Password Salah! Silahkan Coba Lagi');
            window.location.href='login.php';
    </script>";

        }
    } else {
        echo "<script>
                alert('Username atau Password Salah! Silahkan Coba Lagi');
                window.location.href='login.php';
        </script>";
        exit;
    }


    return;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopWise | Login</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {

            background-repeat: no-repeat;

            width: 100%;
            max-width: -10%;
            display: block;
        }

        .card-heading {
            position: absolute;
            left: 10%;
            top: 70%;
            right: 10%;
            font-size: 1.75rem;
            font-weight: 700;
            color: #7fad39;
            line-height: 1.222;

            small {
                display: block;
                font-size: 0.75em;
                font-weight: 400;
                margin-top: 0.25em;
            }
        }
    </style>

    <link href="img/icon.png" rel="icon">
    
</head>

<body>
    <div class="container">
        <!-- code here -->
        <div class="card">
            <div class="card-image">
                <div align="center">
                    <img src="img/logo1.jpeg" width="250" alt="">
                </div>
                <br>
                <h2 class="card-heading">
                    Masuk

                </h2>
            </div>
            <form class="card-form" method="post">
                <div class="input">
                    <input type="input" name="name" class="input-field" required />
                    <label class="input-label">Email atau Nama pengguna</label>
                </div>
                <div class="input">
                    <input type="password" name="password" class="input-field" required />
                    <label class="input-label">Kata Sandi</label>
                </div>
                <div class="action">
                    <button class="action-button" name="login">Masuk</button>
                </div>
            </form>
            <div class="card-info">
                <p>Belum memiliki akun? <a href="daftar.php">Daftar</a></p>
            </div>
        </div>
    </div>

</body>

</html>