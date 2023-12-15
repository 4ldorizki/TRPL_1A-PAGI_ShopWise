<?php

include 'koneksi.php';

function registrasi($data)
{
    global $koneksi;

    $username = mysqli_real_escape_string($koneksi, stripcslashes($data["username"]));
    $email = mysqli_real_escape_string($koneksi, $data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    //cek duplicate email
    $result = mysqli_query($koneksi, "SELECT email from user where email = '$email' or username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Email atau Nama Pengguna Sudah Terdaftar');
            </script>";
        return false;
    }

    //cek konfirmasi password

    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    //ENKRIPSI  
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    //TAMBAH DATA
    mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$email','$password_hashed')");

    return mysqli_affected_rows($koneksi);
}

function getDataItems($koneksi)
{
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT * FROM items");
    $dataItems = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $dataItems[] = $row;
    }

    return $dataItems;
}

function getCariItems($koneksi, $keyword)
{
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT * FROM items WHERE name_item LIKE '%" . $keyword . "%'");
    $dataItems = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $dataItems[] = $row;
    }

    return $dataItems;
}
function getDataItems2($koneksi)
{
    global $koneksi;
    global $id;

    $result = mysqli_query($koneksi, "SELECT * FROM items where id_category = '$id'");
    $dataItems2 = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $dataItems2[] = $row;
    }

    return $dataItems2;
}

function getCariItems2($koneksi, $keyword1)
{
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT * FROM items WHERE name_item LIKE '%" . $keyword1 . "%'");
    $dataItems2 = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $dataItems2[] = $row;
    }

    return $dataItems2;
}
// function getDataRiwayat($koneksi)
// {
//     global $koneksi;
//     global $id_userr;
//     $result = mysqli_query($koneksi, "SELECT * FROM shopping_list where status = 'Sudah belanja' and id_user = '$id_userr'");
//     $dataItems3 = array();

//     while ($row = mysqli_fetch_assoc($result)) {
//         $dataItems3[] = $row;
//     }

//     return $dataItems3;
// }

// function getCariRiwayat($koneksi, $keyword3)
// {
//     global $koneksi;

//     $result = mysqli_query($koneksi, "SELECT * FROM shopping_list WHERE shopping_name LIKE '%" . $keyword3 . "%'");
//     $dataItems3 = array();

//     while ($row = mysqli_fetch_assoc($result)) {
//         $dataItems3[] = $row;
//     }

//     return $dataItems3;
// }
?>