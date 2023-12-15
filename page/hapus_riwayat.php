<?php
include 'config/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM shopping_list WHERE id_shopping = '$id'");
if ($query) {
  echo "<script>
    alert('Data Berhasil Dihapus');
    window.location.href='index.php?p=riwayat';
  </script>";
  exit;
} else {
  echo "<script>
            alert('Data Gagal Dihapus');
           </script>";
}
?>