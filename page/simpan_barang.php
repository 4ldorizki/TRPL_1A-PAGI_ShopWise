<?php
include 'config/koneksi.php';

if (isset($_POST['submit'])) {
    $pilih = isset($_POST['pilih']) ? $_POST['pilih'] : array();
    $id_item = $_POST['id_item'];

    // Memeriksa apakah setidaknya satu daftar belanja dipilih
    if (empty($pilih)) {
        echo "<script>
            alert('Anda belum memilih daftar belanja. Pilih minimal satu daftar belanja.');
            window.location.href='index.php?p=produk';
        </script>";
        exit;
    }

    $jum = count($pilih);

    // Memeriksa apakah data kategori sudah ada sebelumnya
    for ($a = 0; $a < $jum; $a++) {
        $id_shopping = $pilih[$a];
        $selected_item = $id_item[$a]; // Gunakan nama variabel yang berbeda untuk item individu

        $query_check = mysqli_query($koneksi, "SELECT * FROM added_to WHERE id_item = '$selected_item' AND id_shopping = '$id_shopping'");
        if (mysqli_num_rows($query_check) > 0) {
            // Data sudah ada, tidak perlu menyimpan lagi
            echo "<script>
                alert('Anda sudah memasukkan barang tersebut');
                window.location.href='index.php?p=produk';
            </script>";
            exit;
        }

        $query = mysqli_query($koneksi, "INSERT INTO added_to VALUES('', '$selected_item', '$id_shopping', '', '')");

        if ($query) {
            echo "<script>
                alert('Barang berhasil ditambahkan');
                window.location.href='index.php?p=produk';
            </script>";
        }
    }
}
?>