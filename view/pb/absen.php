<h3 class="page-header">Konfirmasi Absensi</h3>
<?php
  $sql = "SELECT*FROM data_absen NATURAL JOIN detail_user WHERE st_jam_msk='Menunggu'";
  $query = $conn->query($sql);
  // Notifikasi Absen
  	if (isset($_GET['ab'])) {
  		if ($_GET['ab']==1) {
  			echo "<div class='alert alert-warning'><strong>Absen telah dikonfirmasi.</strong></div>";
  		} elseif($_GET['ab']==2) {
  			echo "<div class='alert alert-danger'><strong>Gagal, Silahkan Coba Kembali!</strong></div>";
  		} elseif($_GET['ab']==3) {
        echo "<div class='alert alert-warning'><strong>Absen berhasil ditolak.</strong></div>";
      } 
  	} 

    if ($query->num_rows!==0) {
          echo "<form method='post' action='./model/proses.php'>";
          echo "<tr><th colspan='6'>Yang ditandai :
          <button type='submit' class='btn btn-warning' name='acc_absen2'>Konfirmasi</button>&nbsp;
                  <button type='submit' class='btn btn-danger' name='dec_absen2'/>Tolak</button>
           </th></tr>";
          echo "<div class='table-responsive'>
                 <table class='table table-striped'>
                  <thead>
                     <tr>
                      <th>No</th>
                      <th>Nama Siswa</th>
                      <th>Keterangan</th>
                      <th>Hari, Tanggal</th>
                      <th>Pukul</th>
                      <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>";
          $no=0;
          while ($get_absen=$query->fetch_assoc()) {
		switch($get_absen['hari']){
		case "1":
			$today = "Senin"; break;
		case "2":
			$today = "Selasa"; break;
		case "3":
			$today = "Rabu"; break;
		case "4":
			$today = "Kamis"; break;
		case "5":
			$today = "Jumat"; break;
		case "6":
			$today = "Sabtu"; break;
		default:
			$today = "error"; break;
		}
            $id_absen = $get_absen['id_absen'];
            $id_user = $get_absen['id_user'];
            $name = $get_absen['name_user'];
            $date = "$today, $get_absen[id_tgl]";
            if ($get_absen['st_jam_msk']==="Menunggu") {
              $type = "in";
              $status = "Absen masuk";
              $time = $get_absen['jam_msk'];
            }elseif ($get_absen['st_jam_klr']==="Menunggu") {
              $type = "out";
              $status = "Absen keluar";
              $time = $get_absen['jam_klr'];
            }
            $no++; 

              echo  "<tr>
                  <td>
                    <input type='checkbox' name='id_absen[]' value='$id_absen,$type'/> <b>$no</b>
                  </td>
                  <td>$name</td>
                  <td><strong><i>$status</i></strong></td>
                  <td>$date</td>
                  <td>$time</td>
                  <td>
                  <button type='button' class='btn btn-warning' onclick=\"window.location.href='./model/proses.php?acc_absen=$id_absen&type=$type';\">Konfirmasi</button>&nbsp;
                  <button type='button' class='btn btn-danger' onclick=\"window.location.href='./model/proses.php?dec_absen=$id_absen&type=$type';\">Tolak</button>
                  </td>
                  </tr>";
          }
          
          echo "</form></tbody></table></div>";
          $conn->close();
    } else {
        echo "<div class='alert alert-danger'><strong>Tidak ada permintaan Absen.</strong></div>";
    }
?>