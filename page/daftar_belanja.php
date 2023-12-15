<!-- Breadcrumb Section Begin -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Daftar Belanja</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php?p=beranda">Beranda</a>
                        <span>Daftar Belanja</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class="mt-4"></div>
<section class="hero hero-normal">
    <div class="container">
        <div class="row ">
            <div class="col-lg-3 mt-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-shopping-cart fa-10x"></i>
                        <span>Daftar Belanja</span>
                    </div>
                    <?php
                    include 'config/koneksi.php';
                    $id_user = $_SESSION["login"];
                    $result = mysqli_query($koneksi, "SELECT * FROM shopping_list WHERE id_user = '$id_user'");

                    ?>

                    <ul>
                        <?php while ($row = mysqli_fetch_array($result)) { ?>
                            <li><a href="?p=belanja&id_belanja=<?= $row['id_shopping'] ?>">
                                    <?= $row['shopping_name'] ?>
                                </a></li>
                        <?php } ?>
                        <li><button style="border:none; background:none" data-bs-toggle="modal"
                                data-bs-target="#tmbhblj"><i class="fa fa-solid fa-plus"></i>
                                Tambah </li></button>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php
include 'config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM shopping_list where id_user = '$id_user'");
$data = mysqli_fetch_array($query);

?>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <section class="mr-3 ">
        <div class="container">
            <div class="col-lg-5 col-md-4">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <?php if (@$data['id_shopping'] == null) { ?>

                        <?php } else { ?>
                            <h2>
                                <?= $data['shopping_name'] ?>
                            </h2>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php
    include 'config/koneksi.php';
    @$id_belanja = $data['id_shopping'];
    if ($id_belanja == null) { ?>
        <h2 align='center'>Daftar Belanja Kosong <br> <button class="primary-btn cart-btn cart-btn-center mb-5"
                data-bs-toggle="modal" data-bs-target="#tmbhblj"><i class="fa fa-solid fa-plus"></i>
                Tambah Daftar Belanja</button></h2>




        <!-- modal tambah daftar belanja -->
        <div class="example-modal">
            <div id="tmbhblj" class="modal fade" role="dialog" style="display:none;">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">Tambah ke Daftar Belanja</h3>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?p=simpan_belanja" method="post" role="form">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-left">Nama Belanja</label>
                                        <div class="col-sm-8 mb-2"><input type="text" class="form-control" name="tmbhblj"
                                                placeholder="Masukkan Nama Belanja" value="" required></div>

                                        <!-- <input type="text" name="tmbhblj" placeholder="nama belanja" required> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-4 control-label text-left">Tanggal Belanja</label>
                                        <div class="col-sm-8 mb-2"><input type="datetime-local" class="form-control"
                                                name="tggl" placeholder="Masukkan Tanggal Belanja" value="" required></div>
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-success" value="Masukkan">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal selesai -->
        <?php return;
    }
    // mengambil data dari 3 table added_to, items, dan shopping list
    $result = mysqli_query($koneksi, "SELECT * FROM added_to 
    JOIN items ON added_to.id_item = items.id_item 
    JOIN shopping_list ON added_to.id_shopping = shopping_list.id_shopping 
    WHERE added_to.id_shopping = '$id_belanja' and id_user = $id_user ");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>


                            </tr>
                        </thead>
                        <tbody>
                            <form action="?p=simpan_harga" method="post">
                                <?php foreach ($result as $row):

                                    ?>
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="img/product/<?= $row['photo_item'] ?>" width="100" alt="">
                                            <h5>
                                                <?= htmlspecialchars($row['name_item']) ?>
                                            </h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            <input type="text" id="inpt" name="harga[]" style="text-align: center;"
                                                placeholder="Tambahkan harga"
                                                value="<?= 'Rp ' . number_format($row['price_of_goods']) ?>">
                                            <input type="hidden" name="id_added[]" value="<?= $row['id_added'] ?>">
                                            <input type="hidden" name="id_item[]" value="<?= $row['id_item'] ?>">
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="jumlah[]" id="inptt" pattern="[0-9]*"
                                                        value="<?= htmlspecialchars($row['amount']) ?>">
                                                </div>
                                            </div>
                                        </td> <!-- <td class="shoping__cart__total">
                                        $110.00
                                    </td> -->
                                        <td class="shoping__cart__item__close">
                                            <a data-bs-toggle='modal' data-bs-target="#deleteblj<?= $row['id_added'] ?>">
                                                <span class="icon_close"></span></a>
                                        </td>
                                    </tr>

                                    </tr>

                                    <!-- modal hapus -->
                                    <div class="example-modal">
                                        <div id="deleteblj<?= $row['id_added'] ?>" class="modal fade" role="dialog"
                                            style="display:none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Konfirmasi Hapus Produk</h3>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 align="center">Apakah anda yakin ingin menghapus
                                                            <strong>
                                                                <span class="grt">
                                                                    <?= $row['name_item'] ?>
                                                                </span>
                                                            </strong> ?
                                                        </h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <a href="index.php?p=hapus_produk&id=<?php echo $row['id_added']; ?>"
                                                            class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal hapus selesai -->
                                <?php endforeach; ?>

                        </tbody>



                        <!-- modal hapus -->
                        <div class="example-modal">
                            <div id="deleteblj<?= $row['id_added'] ?>" class="modal fade" role="dialog"
                                style="display:none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Konfirmasi Hapus Produk</h3>
                                        </div>
                                        <div class="modal-body">
                                            <h5 align="center">Apakah anda yakin ingin menghapus
                                                <strong><span class="grt">
                                                        <?= $row['name_item'] ?>
                                                    </span></strong> ?
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="nodelete" type="button" class="btn btn-danger pull-left"
                                                data-bs-dismiss="modal">Batal</button>
                                            <a href="?p=hapus_produk&id=<?= $row['id_added'] ?>"
                                                class="btn btn-primary">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- modal hapus selesai -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="shoping__cart__btns">

                    <a href="index.php?p=hapus_belanja&id=<?= $id_belanja ?>" class="primary-btn cart-btn cart-btn-left"
                        onclick="return confirm('Apakah anda yakin ingin menghapus belanja ini?')"
                        style="background:#EC7063; color:#ffffff; border:none"><span class=""></span>
                        Hapus</a>

                    <input type="hidden" name="id_belanja" value="<?= $id_belanja ?>">

                    <button class="primary-btn cart-btn cart-btn-left"
                        style="background:#7fad39; border:none; color:#ffffff"><span class=""></span>
                        Simpan</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <form action="index.php?p=status_belanja" method="post">
                        <input type="hidden" name="id_belanja" value="<?= $id_belanja ?>">
                        <input type="hidden" name="id_user" value="<?= $id_user ?>">
                        <?php
                        include 'config/koneksi.php';
                        $result = mysqli_query($koneksi, "SELECT * FROM shopping_list WHERE id_shopping = '$id_belanja'");
                        $row = mysqli_fetch_assoc($result);
                        if ($row['status'] == 'Sudah belanja') {
                            ?>
                            <button class="primary-btn cart-btn cart-btn-right" style="background:#EC7063; color:#ffffff"
                                name="status2"><span class=""></span>
                                <span class="fa fa-times"></span> Tandai Belum Belanja </button>

                            <?php

                        } else { ?>
                            <button class="primary-btn cart-btn cart-btn-right" style="background:#7fad39; color:#ffffff"
                                name="status1"><span class=""></span>
                                <span class="fa fa-check"></span> Tandai Sudah Belanja </button>

                        <?php }
                        ?>


                    </form>
                </div>
            </div>
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM shopping_list WHERE id_user = '$id_user'");
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">

                        <h5 class="fa fa-solid fa-bell mt-2"> Pengingat Belanja</h5>
                        <form action="#" method="post">
                            <input type="datetime-local" name="tanggal" value="<?= $row['shopping_date'] ?>">
                            <button name="simpan" class="site-btn"><span class=""></span>
                                Simpan</button>
                            <!-- <button type="submit" class="site-btn">Simpan</button> -->
                            <?php
                            extract($_POST);
                            if (isset($simpan)) {

                                include 'config/koneksi.php';
                                mysqli_query($koneksi, "UPDATE shopping_list SET shopping_date = '$tanggal' WHERE id_shopping = '$id_belanja'");

                                echo "<script>alert('Data Tersimpan');
                                    window.location.href='?p=daftar_belanja'
                                    </script>";

                            }



                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            // menhitung total barang dan harga barang
            $resultTotal = mysqli_query($koneksi, "SELECT SUM(amount) AS total, SUM(amount * price_of_goods) AS total_price FROM added_to WHERE id_shopping = '$id_belanja'");
            $dataTotal = mysqli_fetch_assoc($resultTotal);

            $total_barang = $dataTotal['total'];
            $total_harga = $dataTotal['total_price'];

            $result1 = mysqli_query($koneksi, "SELECT * FROM shopping_list WHERE id_shopping = '$id_belanja'");
            $data1 = mysqli_fetch_assoc($result1);
            ?>

            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Total Belanja</h5>
                    <ul>
                        <li>Total Barang: <span style="color:#1c1c1c">
                                <?= ($total_barang == 0) ? "0" : $total_barang ?>
                            </span></li>
                        <li>Total Harga: <span>
                                <?= "Rp " . number_format($total_harga) ?>
                            </span></li>
                        <li>
                            <div align="center" style="color:#1c1c1c;">
                                <?php

                                if ($data1['status'] == 'Belum belanja') { ?>
                                    <h4 style="color: red; font-weight: bold; ">Belum Belanja</h4>
                                <?php } else { ?>
                                    <h4 style="color: green; font-weight: bold; ">Sudah Belanja</h4>
                                <?php } ?>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>



        </div>
    </div>
</section>


<!-- modal tambah daftar belanja -->
<div class="example-modal">
    <div id="tmbhblj" class="modal fade" role="dialog" style="display:none;">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Tambah ke Daftar Belanja</h3>
                </div>
                <div class="modal-body">
                    <form action="index.php?p=simpan_belanja" method="post" role="form">

                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 control-label text-left">Nama Belanja</label>
                                <div class="col-sm-8 mb-2"><input type="text" class="form-control" name="tmbhblj"
                                        placeholder="Masukkan Nama Belanja" value="" required></div>

                                <!-- <input type="text" name="tmbhblj" placeholder="nama belanja" required> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-4 control-label text-left">Tanggal Belanja</label>
                                <div class="col-sm-8 mb-2"><input type="datetime-local" class="form-control" name="tggl"
                                        placeholder="Masukkan Tanggal Belanja" value="" required></div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <input type="submit" name="submit" class="btn btn-success" value="Masukkan">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal selesai -->

<!-- Shoping Cart Section End -->

<script>
    var input = document.getElementById("inpt");
    var inputt = document.getElementById("inptt");

    input.addEventListener("input", function () {
        var inputValue = input.value;
        var numericValue = inputValue.replace(/[^0-9]/g, ""); // Hanya biarkan digit
        numericValue = new Intl.NumberFormat('id-ID').format(numericValue); // Format angka
        input.value = "Rp " + numericValue;
    });

    inputt.addEventListener("input", function () {
        var inputValue = inputt.value;
        var numericValue = inputValue.replace(/\D/g, ""); // Hanya biarkan digit
        inputt.value = numericValue;
    });

</script>