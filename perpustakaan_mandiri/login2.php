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
	<form method="post" name="calc" id="form_login" action="cek-pin.php" style="margin-top: 120px;">
		<table class="form">
			<tr>
			<td colspan=3><input type=text Name="display" placeholder="Masukkan PIN"></td>
			</tr>
			<tr>
			<td><input type=button value="1" OnClick="calc.display.value+='1'"></td>
			<td><input type=button value="2" OnClick="calc.display.value+='2'"></td>
			<td><input type=button value="3" OnClick="calc.display.value+='3'"></td>
			</tr>
			<tr>
			<td><input type=button value="4" OnClick="calc.display.value+='4'"></td>
			<td><input type=button value="5" OnClick="calc.display.value+='5'"></td>
			<td><input type=button value="6" OnClick="calc.display.value+='6'"></td>
			</tr>
			<tr>
			<td><input type=button value="7" OnClick="calc.display.value+='7'"></td>
			<td><input type=button value="8" OnClick="calc.display.value+='8'"></td>
			<td><input type=button value="9" OnClick="calc.display.value+='9'"></td>
			</tr>
			<tr>
			<td><input type=button class="btn-submit" value="X" OnClick="calc.display.value=''"></td>
			<td><input type=button value="0" OnClick="calc.display.value+='0'"></td>
			<td><input type=submit class="btn-edit" value="V" OnClick="calc.display.value=eval(calc.display.value)"></td>
			</tr>
		</table>
	</form>
</body>
</html>