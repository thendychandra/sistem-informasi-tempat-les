<?php
if (strcmp($page, "absen")==0) {
        if (isset($_SESSION['sw'])) {
          include './view/absen.php';
        } else{
          include './view/adm/absen.php';
        }
      }elseif (strcmp($page, "absensi")==0) {        
        if (isset($_SESSION['sw'])) {
          include './view/detail_absen.php';
          } else{
          include './view/adm/detail_absen.php';
        }
      }elseif (strcmp($page, "qr_absen")==0) {        
          include './view/qr_absen.php';
      }elseif (strcmp($page, "catatan")==0) {
        if (isset($_SESSION['sw'])) {
          include './view/note.php';
          } else{
          include './view/adm/catatan.php';
        }
      }elseif (strcmp($page, "tambah_catatan")==0) {
        include './view/add_note.php';
      }elseif (strcmp($page, "req_catatan")==0) {
        if (!isset($_SESSION['sw'])) {
            include './view/adm/req_catatan.php';
        }else {
            header("location:home");
        }
      } elseif (strcmp($page, "add_siswa")==0) {
        if (isset($_SESSION['adm'])) {
            include './view/adm/add_siswa.php';
        }else {
            header("location:home");
        }
      } elseif (strcmp($page, "add_pb")==0) {
        if (isset($_SESSION['adm'])) {
            include './view/adm/add_pb.php';
        }else {
            header("location:home");
        }
      }  elseif (strcmp($page, "siswa")==0) {
        if (!isset($_SESSION['sw'])) {
            include './view/adm/siswa.php';
        }else {
            header("location:home");
        }
      } elseif (strcmp($page, "add_schedule")==0) {
        if (isset($_SESSION['sw'])) {
            include './view/add_schedule.php';
        }else {
            include './view/adm/add_schedule.php';
        }
      } elseif (strcmp($page, "create_barcode")==0) {
        if (isset($_SESSION['adm'])) {
            include './view/adm/create_barcode.php';
        }else {
            header("location:home");
        }
      } elseif (strcmp($page, "katasandi")==0) {
        if (!isset($_SESSION['sw'])) {
            include './view/adm/katasandi.php';
        }else {
            header("location:home");
        }
      } elseif (strcmp($page, "keluar")==0) {
        header("location:view/logout.php");
        //include './view/logout.php';
      } else {
        if (isset($_SESSION['adm'])) {
          header("location:create_barcode");
        }else {
          header("location:qr_absen");
        }
      }
?>