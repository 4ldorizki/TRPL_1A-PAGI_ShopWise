<?php

$id_belanja = $_POST['id_belanja'];
$id_user = $_POST['id_user'];
@$status1 = $_POST['status1'];
@$status2 = $_POST['status2'];
include 'config/koneksi.php';


// Pengecekan apakah daftar belanja kosong
$resultCheck = mysqli_query($koneksi, "SELECT COUNT(*) AS total_items FROM added_to WHERE id_shopping = '$id_belanja'");
$dataCheck = mysqli_fetch_assoc($resultCheck);
$totalItems = $dataCheck['total_items'];

if ($totalItems == 0) {
    // Jika daftar belanja kosong, tampilkan pesan peringatan
    echo "<script>
            alert('Anda belum memasukkan produk ke daftar belanja!');
            window.location.href='index.php?p=produk';
          </script>";
    exit;
}

if (isset($status1)) {
    $query = mysqli_query($koneksi, "UPDATE shopping_list SET status = 'Sudah belanja' WHERE id_shopping = '$id_belanja'");

    echo "<script>
       window.location.href='index.php?p=daftar_belanja';
    </script>";
    exit;
}
if (isset($status2)) {
    $query = mysqli_query($koneksi, "UPDATE shopping_list SET status = 'Belum Belanja' WHERE id_shopping = '$id_belanja'");
    echo "<script>
    window.location.href='index.php?p=daftar_belanja';
    </script>";
    exit;
}

# code...

?>