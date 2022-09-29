<?php
session_start();
// ... jika belum login, alihkan ke halaman login
if (! isset($_SESSION['pin'])) {
    header('Location: login1.php');
    exit();
}

include 'connection.php';
include 'function.php';
$search = $_POST['barcode'];

$query = "select * from buku where barcode like '%".$search."%'";
$hasil = mysqli_query($db, $query);
$data_buku = mysqli_fetch_assoc($hasil);

$buku     			= $data_buku['buku_id'];
$anggota  			= $_SESSION['pin'];
$tgl_pinjam 		= date("Y-m-d H:i:s");
$tgl_jatuh_tempo    = date('Y-m-d H:i:s', strtotime("+7 day"));;

// cek stok buku
$stok_buku = cek_stok($db, $buku);

if ($stok_buku < 1) {
	$_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses peminjaman gagal!</font>';
    header('Location: pinjam-form.php');
    exit();
}

$query = "INSERT INTO pinjam (buku_id, anggota_id, tgl_pinjam, tgl_jatuh_tempo) 
    VALUES ('$buku', $anggota, '$tgl_pinjam', '$tgl_jatuh_tempo')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {
    kurangi_stok($db, $buku);
	$_SESSION['messages'] = '<font color="green" class="form" style="margin-left: 550px;">proses peminjaman sukses!</font>';
    header('Location: login1.php');
} else {
	$_SESSION['messages'] = '<font color="green" class="form" style="margin-left>proses peminjaman gagal!</font>';
    header('Location: login1.php');
}
