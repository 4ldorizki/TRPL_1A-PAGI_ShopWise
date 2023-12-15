<?php
require 'config/function.php';
require 'config/koneksi.php';

if (isset($_POST["daftar"])) {

    if (registrasi($_POST) > 0) {
        echo "
<script>
    alert('Registrasi Berhasil, Silahkan Login😀');
    window.location.href = 'index.php';
</script>";

    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopWise | Daftar</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            background: url('img/login.jpg');
            background-repeat: no-repeat;
            width: 100%;
            max-width: -10%;
            display: block;
        }

        .card-image {
            border-radius: 8px;
            overflow: hidden;
            padding-bottom: 30%;
            text-align: center;
            margin-top: 10%;
            background-repeat: no-repeat;
            background-size: 150%;
            background-position: 0 5%;
            position: relative;
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
                    Daftar

                </h2>
            </div>
            <form class="card-form" method="post">
                <div class="input">
                    <input type="text" name="email" class="input-field" required />
                    <label class="input-label">Email</label>
                </div>
                <div class="input">
                    <input type="text" name="username" class="input-field" required />
                    <label class="input-label">Nama Pengguna</label>
                </div>

                <div class="input">
                    <input type="password" name="password" class="input-field" required />
                    <label class="input-label">Kata Sandi</label>
                </div>

                <div class="input">
                    <input type="password" name="password2" class="input-field" required />
                    <label class="input-label">Konfirmasi Kata Sandi</label>
                </div>

                <div class="action">
                    <button class="action-button" name="daftar">Daftar</button>
                </div>
            </form>
            <div class="card-info">
                <p>Sudah memiliki akun? <a href="login.php">Login</a></p>
            </div>
        </div>
    </div>

</body>

</html>