<!-- kategori dan search -->

<section class="hero hero-normal">
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
                    $result = mysqli_query($koneksi, "SELECT * FROM category")

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
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="" method="post">

                            <input type="text" name="keyword1" placeholder="Cari Barang">
                            <button type="submit" class="site-btn" name="cari1">SEARCH</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- Breadcrumb Section Begin -->

<!-- Breadcrumb Section End -->
<?php
include 'config/koneksi.php';
$id = $_GET['id_category'];
$result1 = mysqli_query($koneksi, "SELECT * FROM category WHERE id_category = '$id'");
while ($data = mysqli_fetch_array($result1)) {
    $name_category = mysqli_escape_string($koneksi, $data['name_category']);

}
?>
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="col-lg-5 col-md-8">
            <div class="product__discount">
                <div class="section-title product__discount__title">
                    <h2>
                        <?= $name_category ?>
                    </h2>
                </div>

            </div>
        </div>
        <?php
        include 'config/koneksi.php';
        include 'config/function.php';
        $id = $_GET['id_category'];
        // Ambil data items
        if (isset($_POST['cari1'])) {
            $keyword1 = $_POST['keyword1'];
            $dataItems = getCariItems2($koneksi, $keyword1);
        } else {
            $dataItems = getDataItems2($koneksi);
        }
        ?>
        <div class="row" id="card">

            <?php foreach ($dataItems as $row) { ?>

                <div class=" col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/<?= $row['photo_item'] ?>">
                            <ul class="product__item__pic__hover">

                                <li><a data-bs-toggle="modal" data-bs-target="#tmbhprd<?php echo $row['id_item']; ?>"><i
                                            class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h4 color="black">
                                <?= $row['name_item'] ?>

                            </h4>

                        </div>
                    </div>
                </div>
                <!-- modal tambah produk ke daftar belanja -->
                <div class="example-modal">
                    <div id="tmbhprd<?php echo $row['id_item']; ?>" class="modal fade" role="dialog" style="display:none;">
                        <div class="modal-dialog">
                            <form action="index.php?p=simpan_barang" method="post" role="form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Tambah ke Daftar Belanja</h3>
                                    </div>
                                    <div class="modal-body">

                                        <?php
                                        include 'config/koneksi.php';
                                        $id_userr = $_SESSION['login'];
                                        $item = $row['id_item'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM shopping_list where id_user = '$id_userr'");
                                        $row = mysqli_fetch_assoc($query);

                                        ?>
                                        <div class="form-group">
                                            <div class="container">
                                                <div class="row" id="checklist">
                                                    <div class="col-12">
                                                        <?php if (@$row['id_shopping'] == null) { ?>
                                                            <div align='center'>
                                                                <h4 align='center'>Anda Belum Membuat Daftar Belanja</h4>
                                                                <a style="color: green;" href="?p=daftar_belanja" class="">
                                                                    Pergi ke Daftar Belanja
                                                                </a>
                                                            </div>
                                                            <!-- <button align='center'
                                                                class="primary-btn cart-btn cart-btn-center "><i
                                                                    class="fa fa-solid fa-plus"></i>
                                                                Tambah Daftar Belanja</button> -->


                                                        <?php } else { ?>
                                                            <ul class="list-group">
                                                                <?php mysqli_data_seek($query, 0);
                                                                while ($row1 = mysqli_fetch_array($query)) { ?>

                                                                    <li class="list-group-item">

                                                                        <div class="d-flex align-items-center">
                                                                            <h4 class="mr-3">
                                                                                <?= $row1['shopping_name'] ?>
                                                                            </h4>
                                                                            <div class="ml-auto">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input type="hidden" name="id_item[]"
                                                                                        value="<?= $item ?>">

                                                                                    <input class="form-check-input" type="checkbox"
                                                                                        id="item1" name="pilih[]"
                                                                                        value="<?= $row1['id_shopping'] ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </li>
                                                                <?php }
                                                                ?>

                                                            </ul>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Batal</button>
                                            <input type="submit" name="submit" class="btn btn-success" value="Masukkan">

                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal selesai -->
    <?php } ?>
    </div>

    </div>
    </div>
    </div>
</section>

<!-- Product Section End -->