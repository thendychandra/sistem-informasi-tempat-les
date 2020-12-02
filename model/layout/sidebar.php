<ul class="nav nav-sidebar">
<li id="output"></li>
   <?php
   		if (isset($_SESSION['pb'])) {
			$this_day = date("d-m-Y");
            $sql = "SELECT*FROM absen_pb WHERE id_tgl='$this_day' AND id_user='$_SESSION[id]'";
            $query_tday = $conn->query($sql);

   			$link=array("","siswa","qr_absen","absen","absensi","req_catatan","catatan","add_schedule","katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Daftar Siswa","Absen QR-Code","Absen","Lihat Absensi","Catatan","Lihat Catatan","Jadwal Les","Ubah Katasandi", "Keluar");
			$icon=array("","fas fa-list","fas fa-qrcode","far fa-calendar-check","fas fa-receipt","far fa-comment","far fa-clipboard","far fa-calendar","fas fa-key","glyphicon glyphicon-log-out");
			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "active";
			      } else {
			      	$status = "";
			      }
			    /*if (mysql_num_rows($query_tday)==0 && $link[$i]==="absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				} */
				if ($query_tday->num_rows==0 && $link[$i]==="qr_absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				}
				echo "<li class='$status' id='absen_sidebar'><a href='$link[$i]'><i class='$icon[$i]'></i> $name[$i] $warning</a></li>";
			}
   		}  elseif (isset($_SESSION['adm'])) {
			$link=array("","add_siswa","add_pb","siswa","absen","absensi","req_catatan","catatan","add_schedule","create_barcode","katasandi&id=$_SESSION[id]","keluar");
		 	$name=array("","Tambah Siswa","Tambah Pembimbing","Daftar Siswa","Absen","Lihat Absensi","Catatan","Lihat Catatan","Jadwal Les","Buat Qr Code","Ubah Katasandi","Keluar");
			$icon=array("","fas fa-plus","fas fa-plus","fas fa-list","far fa-calendar-check","fas fa-receipt","far fa-comment","far fa-clipboard","far fa-calendar","fas fa-qrcode","fas fa-key","glyphicon glyphicon-log-out");
			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "active";
			      } else {
			      	$status = "";
			      }
			    /*if (mysql_num_rows($query_tday)==0 && $link[$i]==="absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				} */
				echo "<li class='$status'><a href='$link[$i]'><i class='$icon[$i]'></i> $name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['sw'])) {
   			//$this_day = date("d");
			//$sql = "SELECT*FROM data_absen NATURAL LEFT JOIN tanggal WHERE nama_tgl='$this_day' AND id_user='$_SESSION[id]'";
			//$query = $conn->query($sql);
			//$query_tday = $query->fetch_assoc();

			$this_day = date("d-m-Y");
            $sql = "SELECT*FROM data_absen WHERE id_tgl='$this_day' AND id_user='$_SESSION[id]'";
            $query_tday = $conn->query($sql);

			$link=array("","absen","qr_absen","absensi","tambah_catatan","catatan","add_schedule","keluar");
			$name=array("","Absen","Absen Qr-Code","Absensiku","Tambah Catatan","Catatan","Jadwal Les","Keluar");
			$icon=array("","far fa-calendar-plus","fas fa-qrcode","far fa-calendar-check","fas fa-comment-medical","far fa-comment","far fa-calendar","fas fa-sign-out-alt");
			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "active";
			      } else {
			      	$status = "";
			      }
			    //if ($query->num_rows==0 && $link[$i]==="qr_absen") {
				//	$warning = "<img src='./lib/img/warning.png' width='20' />";
				//} else {
				//	$warning = "";
				//}
                if ($query_tday->num_rows==0 && $link[$i]==="qr_absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				}
				echo "<li class='$status' id='absen_sidebar'><a href='$link[$i]'><i class='$icon[$i]'></i> $name[$i] $warning</a></li>";
			}
		   }
		   //echo "<li $status><a href='$link[$i]'>$name[$i]</a></li>";
	?>
</ul>