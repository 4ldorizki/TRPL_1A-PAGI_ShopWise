<?php
session_start();
require 'config/koneksi.php';

if (!isset($_SESSION['login'])) {
    if (isset($_COOKIE['login'])) {
        $_SESSION['login'] = $_COOKIE['login'];
    } else {
        header('location:login.php');
    }
}


$result = mysqli_query($koneksi, "SELECT * from user where id_user = '$_SESSION[login]' ");
$row = mysqli_num_rows($result);
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShopWise | Grocery Organizer</title>

    <link href="img/icon.png" rel="icon">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link href="boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrapp.min.js"></script>

    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 320px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            text-align: left;
            border-radius: 5px;
            /* Mengatur teks menjadi rata kanan */
        }

        .dropdown-content a {
            color: black;
            padding: 15px 10px;
            text-decoration: none;
            align-items: center;
            display: block;
            text-align: left;
            /* Mengatur teks menjadi rata kanan */
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown2 {
            position: relative;
            display: inline-block;
        }

        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 250px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            text-align: left;
            border-radius: 5px;
            /* Mengatur teks menjadi rata kanan */
        }

        .dropdown-content2 a {
            color: black;
            padding: 15px 10px;
            text-decoration: none;
            align-items: center;
            display: block;
            text-align: left;
            /* Mengatur teks menjadi rata kanan */
        }

        .dropdown-content2 a:hover {
            background-color: #f1f1f1;
        }
    </style>

</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php?p=beranda"><img src="img/logo1.jpeg" alt=""></a>
        </div>

        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <div class="dropdown2">
                    <?php
                    $id_user1 = $_SESSION['login'];

                    $query1 = mysqli_query($koneksi, "SELECT * FROM shopping_list 
                                    WHERE status = 'Belum belanja' AND shopping_date <= NOW() AND id_user = '$id_user1'");
                    if (!$query1) {
                        die('Error: ' . mysqli_error($koneksi)); // Menampilkan pesan kesalahan jika kueri SELECT gagal
                    }
                    ?>
                    <a onclick="toggleDropdown2()">
                        <i class="fa fa-bell"></i> Notifikasi
                    </a>
                    <div class="dropdown-content2" id="myDropdown2">
                        <h6 align='center' class="mt-2 mb-2">-- Notifikasi --</h6>
                        <?php while ($row1 = mysqli_fetch_assoc($query1)) { ?>
                            <a href="?p=belanja&id_belanja=<?= $row1['id_shopping'] ?>">
                                <i class="fa fa-exclamation" style="color: red;"> </i>
                                <?= $row1['shopping_name'] ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="header__top__right__language">
                <div>
                    <i class="fa fa-user"></i>
                    <?= $data['username'] ?>
                </div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li> <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="index.php?p=beranda">Beranda</a></li>
                <li><a href="index.php?p=produk">Produk</a></li>
                <li><a href="index.php?p=daftar_belanja">Daftar Belanja</a></li>
                <li><a href="index.php?p=riwayat">Riwayat</a></li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>


    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">


                            <div class="header__top__right__language">

                                <div class="dropdown">
                                    <?php
                                    $id_user = $_SESSION['login'];

                                    $query = mysqli_query($koneksi, "SELECT * FROM shopping_list 
                                    WHERE status = 'Belum belanja' AND shopping_date <= NOW() AND id_user = '$id_user'");
                                    if (!$query) {
                                        die('Error: ' . mysqli_error($koneksi)); // Menampilkan pesan kesalahan jika kueri SELECT gagal
                                    }
                                    ?>
                                    <a onclick="toggleDropdown()">
                                        <i class="fa fa-bell"></i> Notifikasi
                                    </a>
                                    <div class="dropdown-content" id="myDropdown">
                                        <h6 align='center' class="mt-2 mb-2">-- Notifikasi --</h6>
                                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                            <a href="?p=belanja&id_belanja=<?= $row['id_shopping'] ?>">
                                                <i class="fa fa-exclamation" style="color: red;"> </i>
                                                <?= $row['shopping_name'] ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <div class="header__top__right__language">
                                <div>
                                    <i class="fa fa-user"></i>
                                    <?= $data['username'] ?>
                                </div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li> <a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                                </a>
                            </div>
                            <!-- <div>
                                    <i class="fa fa-bell"></i> Notifikasi
                                </div>
                                <ul>

                                </ul> -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php?p=beranda"><img src="img/logo1.jpeg" width="200" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="index.php?p=beranda">Beranda</a></li>
                            <li><a href="index.php?p=produk">Produk</a></li>
                            <li><a href="index.php?p=daftar_belanja">Daftar Belanja</a></li>
                            <li><a href="index.php?p=riwayat">Riwayat</a></li>


                        </ul>
                    </nav>
                </div>

                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <?php
    extract($_GET);
    @$p = $_GET['p'];
    switch ($p) {
        case 'beranda':
            include 'page/home.php';
            break;
        case 'produk':
            include 'page/produk.php';
            break;
        case 'kategori':
            include 'page/kategori.php';
            break;
        case 'daftar_belanja':
            include 'page/daftar_belanja.php';
            break;
        case 'riwayat':
            include 'page/riwayat.php';
            break;
        case 'belanja':
            include 'page/belanja.php';
            break;
        case 'simpan_barang':
            include 'page/simpan_barang.php';
            break;
        case 'simpan_belanja':
            include 'page/simpan_belanja.php';
            break;
        case 'hapus_belanja':
            include 'page/hapus_belanja.php';
            break;
        case 'hapus_produk':
            include 'page/hapus_produk.php';
            break;
        case 'simpan_harga':
            include 'page/simpan_harga.php';
            break;
        case 'status_belanja':
            include 'page/status_belanja.php';
            break;
        case 'hapus_riwayat':
            include 'page/hapus_riwayat.php';
            break;
        case 'riwayat_belanja':
            include 'page/riwayat_belanja.php';
            break;
        default:
            # code...
            break;
    }
    ?>
    <!-- Js Plugins -->

    <?php include 'page/footer.php'; ?>
    <script>
        var dropdown = document.getElementById("myDropdown");
        var dropdown2 = document.getElementById("myDropdown2");

        function toggleDropdown() {
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        document.addEventListener("mouseup", function (e) {
            if (e.target.closest(".dropdown") !== null) return;
            if (!dropdown.contains(e.target)) {
                dropdown.style.display = "none";
            }
        });

        // Hanya tampilkan dropdown saat tombol diklik pertama kali
        window.onload = function () {
            dropdown2.style.display = "none";
        };
        function toggleDropdown2() {
            dropdown2.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        document.addEventListener("mouseup", function (e) {
            if (e.target.closest(".dropdown") !== null) return;
            if (!dropdown2.contains(e.target)) {
                dropdown2.style.display = "none";
            }
        });

        // Hanya tampilkan dropdown saat tombol diklik pertama kali
        window.onload = function () {
            dropdown.style.display = "none";
        };
    </script>

    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>
    <script src="package/dist/sweetalert2.all.min.js"></script>





</body>

</html>