<?php

session_start();

// jika sudah login, alihkan ke halaman list
if (isset($_SESSION['user'])) {
	header('Location: home.php');
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login Perpustakaan Mandiri</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<?php
	// Check message ada atau tidak
	if (!empty($_SESSION['messages'])) {
		echo $_SESSION['messages']; //menampilkan pesan 
		unset($_SESSION['messages']); //menghapus pesan setelah refresh
	}
	?>
	<form method="post" name="form_login" id="form_login" action="process-screening.php" style="margin-top: 120px;">
		<table class="form">
			<tr>
				<td colspan="2">
					<h2 align="center">Scan Barcode KTM</h2>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="barcodektm" id="username" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="login" id="login" value="Login" class="btnlogin btn-edit" />
				</td>
			</tr>
			<tr style="height:10px"></tr>
		</table>
	</form>
</body>

</html>