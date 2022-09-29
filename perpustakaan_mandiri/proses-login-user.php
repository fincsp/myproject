<?php
session_start();
include "connection.php";
$barcodektm = $_POST['barcodektm'];
$query = "SELECT * FROM anggota WHERE barcodektm = '$barcodektm'";
$hasil = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($hasil);

if ($data_user != null) {
    // ... jika hasil tidak null berarti user ketemu,
    if ($barcodektm == $data_user['barcodektm']) {
        // $_SESSION['user'] = $data_user;
        header('Location: login2.php');
    } else {
        header('Location: login1.php');
    }
} else {
    header('Location: login1.php');
}
?>
