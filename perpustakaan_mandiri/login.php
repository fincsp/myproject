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
	<form method="post" name="form_login" id="form_login" action="proses-login.php" style="margin-top: 120px;">
		<table class="form">
			<tr>
				<td colspan="2">
					<h1 align="center">Sign In</h1>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="username" placeholder="username" id="username" />
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password" placeholder="password" id="password" />
				</td>
			</tr>
			<tr style="height:10px"></tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="login" id="login" value="Login" class="btnlogin btn-submit" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
