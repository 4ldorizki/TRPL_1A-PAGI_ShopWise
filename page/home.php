<!-- Hero Section Begin -->
<!-- kategori dan search -->

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Kategori</span>
                    </div>
                    <?php
                    include 'config/koneksi.php';

                    $result = mysqli_query($koneksi, "SELECT * FROM category");


                    ?>

                    <ul>
                        <li><a href="index.php?p=produk">Semua Produk</a></li>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <li><a href="?p=kategori&id_category=<?= $row['id_category'] ?>">
                                    <?= $row['name_category'] ?>
                                </a></li>
                        <?php } ?>
                    </ul>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="section-title product__discount__title">
                    <?php
                    include 'config/koneksi.php';
                    $id_user = $_SESSION['login'];
                    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
                    ?>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <h2>
                            Selamat Datang
                            <?= $row['username'] ?> 👋
                        </h2>
                    <?php } ?>
                </div>

                <div class="hero__item set-bg" data-setbg="img/banner2.jpg">
                    <div class="hero__text">
                        <span>Shop Wise</span>
                        <h2>A Grocery <br />Organizer App</h2>
                        <p>Menjadikan pengalaman belanja<br>lebih menyenangkan</p>
                        <a href="./index.php?p=daftar_belanja" class="primary-btn">Coba Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<!-- <section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                        <h5><a href="#">Fresh Fruit</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                        <h5><a href="#">Dried Fruit</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                        <h5><a href="#">Sayuran</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                        <h5><a href="#">drink fruits</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                        <h5><a href="#">drink fruits</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Categories Section End -->


<!-- Footer Section Begin -->

<!-- Footer Section End -->