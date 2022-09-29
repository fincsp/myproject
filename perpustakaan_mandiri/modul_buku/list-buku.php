<?php

// ... ambil data dari database
include 'proses-list-buku.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container clearfix">
        <h1 align=center>Perpustakaan Mandiri</h1>

        <?php include '../sidebar.php' ?>

        <div class="content">
            <h1>Daftar Buku</h1>
            <div class="btn-tambah-div">
			<form action="list-buku.php" method="get">
				<input type="text" name="search" placeholder="search" id="search"/>
			</form>
                <a href="tambah-buku.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
			
            <?php if (empty($data_buku)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Cover</th>
                    <th width="20%">Pilihan</th>
                </tr>
				<?php 
					if(isset($_GET['search'])){
						$search = $_GET['search'];
						$data = mysqli_query($db,"select * from buku where buku_judul like '%".$search."%'union 
						select * from buku where buku_deskripsi like '%".$search."%' ");				
					}else{
						$data = mysqli_query($db,"select * from buku");		
					}
					while($buku = mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $buku['buku_judul'] ?></td>
						<td><?php echo $buku['kategori_id'] ?></td>
						<td><?php echo $buku['buku_deskripsi'] ?></td>
						<td><?php echo $buku['buku_jumlah'] ?></td>
						<td><img class="buku-cover" src="cover/<?php echo $buku['buku_cover'] ?>"></td>
						<td>
							<a href="edit-buku.php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-edit">Edit</a>
							<a href="delete-buku.php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
						</td>
					</tr>
				<?php } ?>
            </table>
            <?php endif ?>
        </div>

    </div>
</body>
</html>
