<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
		<div class="navbar-athena">
		<a rel="home" href="#" title="The Best Study Community">
		<img src="./lib/img/athena.png">&nbsp
		ATHENA STUDY CENTER
    	</a></div>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right visible-xs">
<li id="output_m"></li>
<?php
	if (isset($_SESSION['pb'])) {
   			$link=array("","siswa","absen","qr_absen","absensi","req_catatan","catatan","add_schedule","katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Daftar Siswa","Absen","Absen QR-Code","Lihat Absensi","Catatan","Lihat Catatan","Jadwal Les","Ubah Katasandi","Keluar");

			for ($i=1; $i <= count($link)-1 ; $i++) {
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['sw'])) {
			$link=array("","absen","qr_absen","absensi","tambah_catatan","catatan","add_schedule","keluar");
			$name=array("","Absen","Absen Qr-Code","Absensiku","Tambah Catatan","Catatan","Jadwal Les","Keluar");
			
			for ($i=1; $i <= count($link)-1 ; $i++) {
				
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['adm'])) {
			$link=array("","add_siswa","add_pb","siswa","absen","absensi","req_catatan","catatan","add_schedule","create_barcode","katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Tambah Siswa","Tambah Pengajar","Daftar Siswa","Absen","Lihat Absensi","Catatan","Lihat Catatan","Jadwal Les","Buat Qr Code","Ubah Katasandi","Keluar");

			for ($i=1; $i <= count($link)-1 ; $i++) {
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		}
 ?>
</ul>
</div>