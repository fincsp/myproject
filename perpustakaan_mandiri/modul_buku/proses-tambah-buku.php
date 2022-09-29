<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

include '../connection.php';

$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$jumlah    = $_POST['jumlah'];
$barcode    = '213';
$lokasi    = 'a3';

// ambil data file yang diupload
$file        = $_FILES['cover']['tmp_name'];
$nama_file   = $_FILES['cover']['name'];
$destination = "cover/" . $nama_file;

$query = "INSERT INTO buku (buku_judul, kategori_id, buku_deskripsi, buku_jumlah, buku_cover, barcode, buku_lokasi) 
    VALUES ('$judul', $kategori, '$deskripsi', $jumlah, '$nama_file', '$barcode', '$lokasi')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {

    // jika data berhasil diinsert, lakukan proses upload
    move_uploaded_file($file, $destination);

    header('Location: list-buku.php');
} else {
    header('Location: list-buku.php');
}
