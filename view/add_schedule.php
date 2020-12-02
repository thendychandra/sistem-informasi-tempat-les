<h3 class='page-header'>Jadwal Les</h3>
<?php
if (isset($_GET['st'])) {
        if ($_GET['st']==1) {
            echo "<div class='alert alert-warning'><strong>Berhasil Disimpan.</strong></div>";
        } elseif ($_GET['st']==2) {
            echo "<div class='alert alert-danger'><strong>Gagal Menyimpan.</strong></div>";
        } elseif ($_GET['st']==3) {
            echo "<div class='alert alert-success'><strong>Berhasil dihapus.</strong></div>";
        } elseif ($_GET['st']==4) {
            echo "<div class='alert alert-danger'><strong>Data tidak boleh kosong.</strong></div>";
        } elseif ($_GET['st']==5) {
            echo "<div class='alert alert-danger'><strong>Gagal dihapus.</strong></div>";
        }
    }
 ?>
    <nav class="navbar">
      <div class="container-fluid">
        <?php 
        include 'navbar.php';
        ?>
      </div>
    </nav>
<?php
	if(isset($_POST['choose_pb'])){
		$teacher = mysqli_real_escape_string($conn, $_POST['pb']);
		$sql_cek = "SELECT name_user FROM detail_pb WHERE id_user = $teacher";
		$r = mysqli_query($conn, $sql_cek);
		$t=mysqli_fetch_array($r);
	} else{	
        $t = array("<pre>Silakan pilih salah satu Pembimbing diatas</pre>");
	}		
?>
<div class='table table-bordered'>
<table class='table table-striped'>

 		   <thead>
			<tr>
			    <th colspan='12'><?php echo "Guru Pengampu: ".$t[0]; ?></th>
			</tr>
                        <tr>
                            <th colspan='2' width='100px'>Senin</th>
                            <th colspan='2' width='100px'>Selasa</th>
                            <th colspan='2' width='100px'>Rabu</th>
                            <th colspan='2' width='100px'>Kamis</th>
                            <th colspan='2' width='100px'>Jumat</th>
                            <th colspan='2' width='100px'>Sabtu</th>
                        </tr>
                    </thead>
                    <tbody>	
			<?php
			function jadual($sesi, $hari){
			include 'lib/db/dbconfig.php';
			$user_sw = $_SESSION['id'];
			if(isset($_POST['choose_pb'])){
			$teacher = mysqli_real_escape_string($conn, $_POST['pb']);}
			else{
			$teacher = 0;
			}
			$sql_cek = "SELECT name_user, note FROM data_jadwal NATURAL LEFT JOIN detail_user WHERE sesi=$sesi && hari=$hari && id_pb=$teacher && id_user=$user_sw";
			$r = mysqli_query($conn, $sql_cek);
			while($sql=mysqli_fetch_array($r)){
			$nama = $sql['name_user'];
			$note = $sql['note'];
			echo "&bullet;"."&nbsp;".$nama."&nbsp;".$note."<br/>";
			}}
			?>

			<tr height='100px'>
                            <td width='25px'>14.00</td>
                            <td width='75px'><?php jadual("1","1");?></td>
                            <td width='25px'>14.00</td>
                            <td width='75px'><?php jadual("1","2");?></td>
                            <td width='25px'>14.00</td>
                            <td width='75px'><?php jadual("1","3");?></td>
                            <td width='25px'>14.00</td>
                            <td width='75px'><?php jadual("1","4");?></td>
                            <td width='25px'>12.30</td>
                            <td width='75px'><?php jadual("1","5");?></td>
                            <td width='25px'>09.00</td>
                            <td width='75px'><?php jadual("1","6");?></td>
                        </tr>
			<tr height='100px'>
                            <td width='25px'>16.00</td>
                            <td width='75px'><?php jadual("2","1");?></td>
                            <td width='25px'>16.00</td>
                            <td width='75px'><?php jadual("2","2");?></td>
                            <td width='25px'>16.00</td>
                            <td width='75px'><?php jadual("2","3");?></td>
                            <td width='25px'>16.00</td>
                            <td width='75px'><?php jadual("2","4");?></td>
                            <td width='25px'>14.00</td>
                            <td width='75px'><?php jadual("2","5");?></td>
                            <td width='25px'>10.30</td>
                            <td width='75px'><?php jadual("2","6");?></td>
                        </tr>
			<tr height='100px'>
                            <td width='25px'>17.30</td>
                            <td width='75px'><?php jadual("3","1");?></td>
                            <td width='25px'>17.30</td>
                            <td width='75px'><?php jadual("3","2");?></td>
                            <td width='25px'>17.30</td>
                            <td width='75px'><?php jadual("3","3");?></td>
                            <td width='25px'>17.30</td>
                            <td width='75px'><?php jadual("3","4");?></td>
                            <td width='25px'>15.30</td>
                            <td width='75px'><?php jadual("3","5");?></td>
                            <td width='25px'>12.00</td>
                            <td width='75px'><?php jadual("3","6");?></td>
                        </tr>
			<tr height='100px'>
                            <td width='25px'>19.00</td>
                            <td width='75px'><?php jadual("4","1");?></td>
                            <td width='25px'>19.00</td>
                            <td width='75px'><?php jadual("4","2");?></td>
                            <td width='25px'>19.00</td>
                            <td width='75px'><?php jadual("4","3");?></td>
                            <td width='25px'>19.00</td>
                            <td width='75px'><?php jadual("4","4");?></td>
                            <td width='25px'>17.30</td>
                            <td width='75px'><?php jadual("4","5");?></td>
                            <td width='25px'>13.30</td>
                            <td width='75px'><?php jadual("4","6");?></td>
                        </tr>
			<tr height='100px'>
                            <td width='25px'>00.00</td>
                            <td width='75px'><?php jadual("5","1");?></td>
                            <td width='25px'>00.00</td>
                            <td width='75px'><?php jadual("5","2");?></td>
                            <td width='25px'>00.00</td>
                            <td width='75px'><?php jadual("5","3");?></td>
                            <td width='25px'>00.00</td>
                            <td width='75px'><?php jadual("5","4");?></td>
                            <td width='25px'>19.00</td>
                            <td width='75px'><?php jadual("5","5");?></td>
                            <td width='25px'>00.00</td>
                            <td width='75px'><?php jadual("5","6");?></td>
                        </tr>
			
		 </tbody></table>
</div>
<script src="lib/js/sweetalert2.min.js"></script> <link rel="stylesheet" type="text/css" href="lib/js/sweetalert2.css">
    <script>
        function hapusSiswa(id_siswa) {
            var id = id_siswa;
            swal({
                title: 'Anda Yakin?',
                text: 'Semua data Siswa akan dihapus!',type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                closeOnConfirm: true
            }, function() {
                    window.location.href="./model/proses.php?del_siswa="+id;
                });
        }
    </script>
<!-- <script>
function confirmSubmit() {
    var msg;
    msg = "Apakah Anda Yakin Akan Menghapus Data ? ";
    var agree=confirm(msg);
    if (agree)
    return true ;
    else
    return false ;
}
</script> -->