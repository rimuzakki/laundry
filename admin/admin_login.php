<?php

session_start();
include '../koneksi.php';

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$login = mysqli_query($mysqli, "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}'");

	if (mysqli_num_rows($login) == 0) {
		die("Username atau password salah!");
	} else {
		$_SESSION['admin'] = 1;
		header("Location: index.php");
	}
	
}

?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" type="image/png" href="../img/favicon/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="../img/favicon/favicon-16x16.png" sizes="16x16" />

  <title>Pangestu Laundry</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <!-- <link href="../css/style.min.css" rel="stylesheet"> -->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body>
	
	<h1 style="text-align: center">My Blog Login</h1>
	<hr>
	
	<form action="" method="post">
	
		<p>Username:</p>
		<input type="text" name="username">
		
		<p>Password:</p>
		<input type="password" name="password">
		
		<br>
		<br>
		<input type="submit" name="submit" value="Login">
	
	</form>

	
</body>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
