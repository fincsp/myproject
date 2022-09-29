<?php
session_start();
include "connection.php";
$pin = $_POST['display'];
$query = "SELECT * FROM anggota WHERE pin = '$pin'";
$hasil = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($hasil);
if ($data_user != null) {
    // ... jika hasil tidak null berarti user ketemu,
    if ($pin == $data_user['pin']) {
        $_SESSION['pin'] = $data_user['anggota_id'];
        header('Location: login3.php');
    } else {
        header('Location: login1.php');
    }
} else {
    header('Location: login1.php');
}