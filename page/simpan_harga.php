<?php
include 'config/koneksi.php';

// Pastikan semua data yang diperlukan tersedia
if (
    isset($_POST['harga']) &&
    isset($_POST['id_added']) &&
    isset($_POST['id_item']) &&
    isset($_POST['jumlah'])
) {
    // Ambil data dari formulir
    $id_belanja = $_POST['id_belanja'];
    $hargaArray = $_POST['harga'];
    $idAddedArray = $_POST['id_added'];
    $idItemArray = $_POST['id_item'];
    $jumlahArray = $_POST['jumlah'];

    // Loop melalui setiap elemen array
    for ($i = 0; $i < count($hargaArray); $i++) {
        // Ambil data untuk setiap barang
        $harga = (int) str_replace(['Rp ', '.', ','], '', $hargaArray[$i]);
        $idAdded = mysqli_escape_string($koneksi, $idAddedArray[$i]);
        $idItem = mysqli_escape_string($koneksi, $idItemArray[$i]);
        $jumlah = mysqli_escape_string($koneksi, $jumlahArray[$i]);

        // Lakukan query UPDATE untuk setiap barang
        $query = mysqli_query($koneksi, "UPDATE added_to SET amount='$jumlah', price_of_goods='$harga' WHERE id_added='$idAdded' AND id_item = '$idItem'");

        // Periksa apakah query berhasil
        if (!$query) {
            echo "<script>
                      alert('Data Gagal Disimpan. " . mysqli_error($koneksi) . "');
                  </script>";
            exit;
        }
    }

    // Redirect ke halaman daftar belanja setelah berhasil
    echo "<script>
              window.location.href='index.php?p=belanja&id_belanja=$id_belanja';
          </script>";
    exit;
} else {
    echo "<script>
            alert('Data Tidak Lengkap');
            window.location.href='index.php?p=daftar_belanja';
          </script>";
    exit;
}

?>