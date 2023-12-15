<?php
require '../config/koneksi.php';
if (isset($_GET['image_id'])) {
    $sql = "SELECT * FROM items WHERE id_item=" . $_GET['image_id'];
    $result = mysqli_query($koneksi, "$sql")
        or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>");
    $row = mysqli_fetch_array($result);
    //header("Content-type: " . $row["imageType"]);
    echo $row["image"];
}
mysqli_close($conn);
?>