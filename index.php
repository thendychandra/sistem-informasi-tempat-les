<?php

session_start();
include './lib/db/dbconfig.php';
//include './lib/db/functions.php';
date_default_timezone_set('Asia/Jakarta');

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = "home";
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = "id";
}

// if ($page == "qr_absen" AND !isset($_SESSION['sw']) AND !isset($_SESSION['pb']) AND !isset($_SESSION['adm'])){
//   include 'qr_absen.php';
// } elseif ($page == "verify" AND !isset($_SESSION['sw']) AND !isset($_SESSION['pb']) AND !isset($_SESSION['adm'])){
//   include 'verify.php';
// } else

if (!isset($_SESSION['sw']) AND !isset($_SESSION['pb']) AND !isset($_SESSION['adm'])) {
  include 'view/login.php';
} else {
  include 'view/media.php';
}
?>