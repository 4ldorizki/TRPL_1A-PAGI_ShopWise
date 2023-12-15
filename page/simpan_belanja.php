<?php
$nama_belanja = htmlspecialchars($_POST['tmbhblj']);
$tggl = $_POST['tggl'];
include 'config/koneksi.php';
$id_user = $_SESSION["login"];
$belum = 'Belum belanja';
// Memeriksa apakah data kategori sudah ada sebelumnya
$query_check = mysqli_query($koneksi, "SELECT * FROM shopping_list WHERE shopping_name = '$nama_belanja' and id_user = '$id_user'");
if (mysqli_num_rows($query_check) > 0) {
    // Data sudah ada, tidak perlu menyimpan lagi
    echo "<script>
    alert('Daftar belanja sudah ada');
    window.location.href='index.php?p=daftar_belanja';
    </script>";
    exit;
} else {
    $simpan = mysqli_query($koneksi, "INSERT INTO shopping_list VALUES ('', '$nama_belanja', '$tggl', '$belum', '$id_user')");

}
if ($simpan) {
    $id_belanja_baru = mysqli_insert_id($koneksi); // Mendapatkan ID daftar belanja baru yang baru saja ditambahkan
    echo "<script>window.location.href='index.php?p=belanja&id_belanja=$id_belanja_baru'</script>";
}
?>