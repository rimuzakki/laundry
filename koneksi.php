<?php
// $db = mysqli_connect('localhost','root','','laundry');
// if (mysqli_connect_errno()) {
//   echo "Koneksi database gagal, Error 404:".mysqli_connect_errno();
//   die();
// }
$host		= "localhost";
$username	= "root";
$pass		= "";
$database	= "laundry";

// koneksi ke database MySQL
$mysqli		= new mysqli($host, $username, $pass, $database);

if (mysqli_connect_errno()) {
  echo "Koneksi database gagal, Error 404:".mysqli_connect_errno();
  die();
}

//session_start();
// require_once $_SERVER['DOCUMENT_ROOT'].'/laundry/config.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/tutorial/config.php';
// require_once BASEURL.'helpers/helpers.php';

// $cart_id = '';
// if (isset($_COOKIE[CART_COOKIE])) {
// 	$cart_id = sanitize($_COOKIE[CART_COOKIE]);
// }
