<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="lib/img/favicon.png">

    <title>Athena Study Center - Verify</title>

    <!-- Bootstrap core CSS -->
    <link href="./lib/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./lib/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./lib/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./lib/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php
  $id="";
include './lib/db/dbconfig.php';
if(isset($_POST['auth_mac'])){
    $id = $_POST['id'];
        $_IP_SERVER = $_SERVER['SERVER_ADDR'];
        $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
        if($_IP_ADDRESS == $_IP_SERVER)
        {
            ob_start();
            system('ipconfig /all');
            $_PERINTAH  = ob_get_contents();
            ob_clean();
            $_PECAH = strpos($_PERINTAH, "Physical");
            $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
            mysqli_query($conn,"UPDATE detail_user SET mac_addr='$_HASIL' WHERE id_user='$id'");
            mysqli_query($conn,"UPDATE detail_user SET user_status='Verified' WHERE id_user='$id'");
            echo "<div class='alert alert-success'><strong>Verifikasi berhasil. Terimakasih.</strong></div>";
        } else {
            $_PERINTAH = "arp -a $_IP_ADDRESS";
            ob_start();
            system($_PERINTAH);
            $_HASIL = ob_get_contents();
            ob_clean();
            $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
            $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
            $_HASIL = substr($_PECAH_STRING[1], 0, 17);
            mysqli_query($conn,"UPDATE detail_user SET mac_addr='$_HASIL' WHERE id_user='$id'");
            mysqli_query($conn,"UPDATE detail_user SET user_status='Verified' WHERE id_user='$id'");
            echo "<div class='alert alert-success'><strong>Verifikasi berhasil. Terimakasih.</strong></div>";
        }
}

if(isset($_GET['token'])){
  $token = mysqli_real_escape_string($conn, $_GET['token']);
  $sql_cek = "SELECT id_user FROM detail_user WHERE mac_addr='$token'";
  $r = mysqli_query($conn, $sql_cek);
  $sql_type=mysqli_fetch_row($r);
  $id = $sql_type[0];
    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
        $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
        if($_IP_ADDRESS == $_IP_SERVER)
        {
            ob_start();
            system('ipconfig /all');
            $_PERINTAH  = ob_get_contents();
            ob_clean();
            $_PECAH = strpos($_PERINTAH, "Physical");
            $_HASIL = substr($_PERINTAH,($_PECAH+36),17);           
        } else {
            $_PERINTAH = "arp -a $_IP_ADDRESS";
            ob_start();
            system($_PERINTAH);
            $_HASIL = ob_get_contents();
            ob_clean();
            $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
            $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
            $_HASIL = substr($_PECAH_STRING[1], 0, 17);
        }
    echo "<div class='container'>
    <form class='form-signin' method='post' action='verify.php'>
      <h2 class='form-signin-heading'>Verifikasi Alamat MAC</h2>
      <h5 class='form-signin-heading'>Ingat!! Satu id siswa hanya dapat digunakan pada satu perangkat untuk absensi.<br><br>
      Pastikan perangkat ini adalah perangkat yang akan Anda gunakan untuk absen.</h5>
      <label for='inputMAC' class='sr-only'>MAC Address</label>
      <input type='text' name='mac' id='inputMAC' class='form-control' placeholder= '$_HASIL' disabled value= '$_HASIL'>
      <input type='hidden' name='id' value='$id'><br>
      <input class='btn btn-lg btn-primary btn-block' type='submit' name='auth_mac' value='Verifikasi'>
    </form>
  </div> <!-- /container -->


  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src='./lib/ie10-viewport-bug-workaround.js'></script>";
}
else{
    echo "<div class='alert alert-danger'><strong>Halaman yang Anda cari tidak ditemukan.</strong></div>";
}
?>
</body></html>