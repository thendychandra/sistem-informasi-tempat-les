<?php

include('lib/phpqrcode/qrlib.php');
 
$success = false;
function getUsernameFromEmail($email) {

	$find = '@';
	$pos = strpos($email, $find);

	$username = substr($email, 0, $pos);

	return $username;

}
if(isset($_POST['submit'])){
if($_POST['day']!="0" && $_POST['session']!="0" && $_POST['pb']!="0"){
$hari_ini = date("l");
$day = $_POST['day'];
switch($day){
	case "1":
		$today = "Monday"; break;
	case "2":
		$today = "Tuesday"; break;
	case "3":
		$today = "Wednesday"; break;
	case "4":
		$today = "Thursday"; break;
	case "5":
		$today = "Friday"; break;
	case "6":
		$today = "Saturday"; break;
	default:
		$today = "empty"; break;
}
if($hari_ini==$today) {
	$success = true;
	$pb = $_POST['pb'];
	$date_now = date("d-m-yy");
	$tempDir = 'temp/';  $session = $_POST['session'];

 	$filename = $day."-".$session."-".$pb."-".date("dmy");
	$file_name = $filename.".png";
	define ("SECRETKEY", "mysecretkey1234");
	 $sha = openssl_encrypt($day." ".$session." ".$pb." ".date("d-m-Y"), "AES-128-ECB", SECRETKEY);
	$codeContents = $sha;
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_Q, 8, 1);
	$logopath='temp/logo_new1.png';

	 // ambil file qrcode
	 $QR = imagecreatefrompng($tempDir.''.$filename.'.png');

	 // memulai menggambar logo dalam file qrcode
	 $logo = imagecreatefromstring(file_get_contents($logopath));
	 
	 imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
	 imagealphablending($logo , false);
	 imagesavealpha($logo , true);
	
	 $QR_width = imagesx($QR);
	 $QR_height = imagesy($QR);
	
	 $logo_width = imagesx($logo);
	 $logo_height = imagesy($logo);
	
	 // Scale logo to fit in the QR Code
	 $logo_qr_width = $QR_width/2.5;
	 $scale = $logo_width/$logo_qr_width;
	 $logo_qr_height = $logo_height/$scale;
	
	 imagecopyresampled($QR, $logo, $QR_width/3.3, $QR_height/3.3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
	
	 // Simpan kode QR lagi, dengan logo di atasnya
	 imagepng($QR,$tempDir.$filename.'.png');

	echo "<div class='alert alert-success'><strong>Qr-Code berhasil dibuat.</strong></div>";    
}
else{
echo "<div class='alert alert-danger'><strong>Hanya bisa mencetak Qr-Code di hari yang sama.</strong></div>";
}
}
else{
echo "<div class='alert alert-danger'><strong>Silakan pilih sesi dan pembimbing dengan benar.</strong></div>";
}}
?>

<!DOCTYPE html>

<html lang="en-US">

	<head>

	<title></title>

	<link rel="icon" href="img/favicon.ico" type="image/png">

	<link rel="stylesheet" href="libs/bootstrap.min.css">

	<link rel="stylesheet" href="lib/style.css">

	</head>


	<body onload="rm_notif()">
	<!-- <div class="myoutput"> -->

		<h3><strong></strong></h3>

<?php function print_sha(){echo openssl_decrypt($sha, "AES-128-ECB", SECRETKEY);}?>
		<div class="input-field">

			<h3>Silakan pilih hari, sesi dan mentor</h3>

			<form method="post" action="create_barcode" >

				<div class="form-group">

					<label>Hari</label>
<br/>
<?php
$hari_ini = date("l");
switch($hari_ini){
	case "Monday":
		$today = "0"; break;
	case "Tuesday":
		$today = "1"; break;
	case "Wednesday":
		$today = "2"; break;
	case "Thursday":
		$today = "3"; break;
	case "Friday":
		$today = "4"; break;
	case "Saturday":
		$today = "5"; break;
	default:
		$today = "empty"; break;
}
$select = array("", "", "", "", "", "");
$select[$today] = "selected";
$date = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
					echo "<select name='day'>";
						for ($i = 0; $i < 6; $i++){
							$v = $i + 1;
							echo "<option value='$v' $select[$i]>$date[$i]</option>";
						}
					echo "</select>";
				echo "</div>";
?>
				<div class="form-group">

					<label>Sesi</label>
<br/>
					<select name="session">
						<option value="0">--</option>
						<option value="1">Sesi 1</option>
						<option value="2">Sesi 2</option>
						<option value="3">Sesi 3</option>
						<option value="4">Sesi 4</option>
						<option value="5">Sesi 5</option>
					</select>
				</div>
<div class="form-group">

					<label>Mentor</label>
<br/>
					<?php
					$q="SELECT * FROM detail_pb ORDER BY id_user ASC";
					$r = mysqli_query($conn, $q);
					echo "<select name='pb'><option value='0'>--</option>";
					while($name=mysqli_fetch_row($r)){
						echo "<option value='$name[0]'>$name[1]</option>";
					}
					echo "</select>";
					?>
				</div>

				<div class="form-group">

					<input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" value="Buat Qr-Code" />

				</div>

			</form>

		</div>

		<?php

		if(!isset($filename)){

			$filename = "logo_qr";

		}

		?>

		<div class="qr-field">

			<h3 style="text-align:center">QR-Code: </h3>

			<center>

				<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">

						<?php echo '<img src="temp/'. @$filename.'.png" style="width:206px; height:206px;"><br>'; ?>

				</div>
				<?php 
				if(isset($_POST['submit']) && $success){
					if($_POST['day']!="0" && $_POST['session']!="0" && $_POST['pb']!="0"){
						switch($_POST['day']){
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
							$today = "kosong"; break;
						}
					$date = date("d-m-yy");
					$session = $_POST['session'];
					$pb = $_POST['pb'];
					$q="SELECT * FROM detail_pb WHERE id_user=$pb";
					$r = mysqli_query($conn, $q);
					$name = mysqli_fetch_row($r);
					echo $today.", ".$date." (Sesi: ".$session.")";
					echo "<br>Pembimbing: <u>".$name[1]."</u><br>";
					}
				}
				?>
				<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png " id="myAnchor" disabled>Download QR Code</a>

			</center>

		</div>

		<!-- </div> -->
<script>
	document.getElementById("myAnchor").addEventListener("click", function(event){
  event.preventDefault()
});
</script>
<script>
function rm_notif(){
	setTimeout(function() {
		$('.alert').fadeOut('slow');
	}, 3000);
}
</script>
</body>
</html>