<?php
session_start();
session_unset();
session_destroy();
header("location: ../index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>
<!--
<h2 class="center">Apakah Anda benar-benar ingin keluar?</h2>
<form class='form-horizontal' role='form' style='width:50%' name='formulir' method='post' action='keluar'>
   <button type='submit' class='btn btn-default' name='yes' style='margin-left:85%'>Ya</button>
   <button type='submit' class='btn btn-default' name='no' style='margin-left:85%'>Tidak</button>
</form>-->
