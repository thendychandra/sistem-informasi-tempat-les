<?php

include('lib/phpqrcode/qrlib.php');
 

function getUsernameFromEmail($email) {

	$find = '@';
	$pos = strpos($email, $find);

	$username = substr($email, 0, $pos);

	return $username;

}
if(isset($_POST['submit'])){
if($_POST['day']!="0" && $_POST['session']!="0"){
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

	$date_now = date("d-m-yy");
	$tempDir = 'temp/';  $session = $_POST['session'];

 	$filename = $day."-".$session."-".date("dmy");
	$file_name = $filename.".png";
	
     //buat cek hari sesi dan date now
     $check = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_qr WHERE file_name = '$file_name'"));
     if($check == 1){
	$token = mysqli_fetch_row(mysqli_query($conn,"SELECT token FROM data_qr WHERE file_name = '$file_name'"));
	$codeContents = $token[0];
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
	echo "<div class='alert alert-danger'><strong>Qr-Code sudah dibuat.</strong></div>";
     } else{
	//TOKEN GENERATOR

    	function generateRandomString($length = 32) {

    	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    	$charactersLength = strlen($characters);

    	$randomString = '';

    	for ($i = 0; $i < $length; $i++) {

        	$randomString .= $characters[rand(0, $charactersLength - 1)];

    	}

    	return $randomString;

    	}
   
   
    //verif token harus beda-beda

    	$token = generateRandomString();

    
    $checking = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_qr WHERE token = '$token'"));
 	//validasi data token

    	for ($q = 0; $checking == 1; $q++) {

       		$token = generateRandomString();

       		$checking = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM data_qr WHERE token = '$token'"));
     	}


	$codeContents = "A-".$token;
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);


	 //simpan data
	$id_qr = "NULL";
	$sql= "INSERT INTO data_qr (id_qr,
			hari,
			sesi,
			date,
			file_name,
			token) VALUES (?,
			?,
			?,
			?,
			?,
			?)";
		if ($statement = $conn->prepare($sql)) {
			$statement->bind_param(
				"isssss", $id_qr, $day, $session, $date_now, $file_name, $codeContents
				);
			if ($statement->execute()) {
				$statement->close();
				echo "<div class='alert alert-success'><strong>Qr-Code berhasil dibuat.</strong></div>";
			} else {
				echo "<div class='alert alert-danger'><strong>Qr-Code gagal dibuat. Silakan coba lagi.</strong></div>";
			}
		}else {
		   echo "<div class='alert alert-danger'><strong>Qr-Code gagal dibuat. Silakan coba lagi.</strong></div>";	
		}
 
	

     } //tutup else check
}
else{
echo "<div class='alert alert-danger'><strong>Hanya bisa mencetak Qr-Code di hari yang sama.</strong></div>";
}
}
else{
echo "<div class='alert alert-danger'><strong>Silakan pilih hari dan sesi terlebih dahulu.</strong></div>";
}}
?>

<!DOCTYPE html>

<html lang="en-US">

	<head>

	<title>Quick Response (QR) Code Generator</title>

	<link rel="icon" href="img/favicon.ico" type="image/png">

	<link rel="stylesheet" href="libs/css/bootstrap.min.css">

	<link rel="stylesheet" href="libs/style.css">

	<script src="libs/navbarclock.js"></script>

	</head>


	<body onload="startTime()">

		<div class="myoutput">

		<h3><strong>QRCode Generator</strong></h3>

<?php function print_sha(){define ("SECRETKEY", "mysecretkey1234"); $sha = openssl_encrypt($day." ".$session." ".date("ymd"), "AES-128-ECB", SECRETKEY); echo openssl_decrypt($sha, "AES-128-ECB", SECRETKEY);} ?>
		<div class="input-field">

			<h3>Please Choose Day & Session</h3>

			<form method="post" action="create_barcode" >

				<div class="form-group">

					<label>Day</label>
<br/>
					<select name="day">
						<option value="0">--</option>
						<option value="1">Senin</option>
						<option value="2">Selasa</option>
						<option value="3">Rabu</option>
						<option value="4">Kamis</option>
						<option value="5">Jumat</option>
						<option value="6">Sabtu</option>
					</select>
				</div>

				<div class="form-group">

					<label>Session</label>
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

					<input type="submit" name="submit" class="btn btn-primary submitBtn" style="width:20em; margin:0;" />

				</div>

			</form>

		</div>

		<?php

		if(!isset($filename)){

			$filename = "athena";

		}

		?>

		<div class="qr-field">

			<h2 style="text-align:center">QR Code Result: </h2>

			<center>

				<div class="qrframe" style="border:2px solid black; width:210px; height:210px;">

						<?php echo '<img src="temp/'. @$filename.'.png" style="width:206px; height:206px;"><br>'; ?>

				</div>

				<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Download QR Code</a>

			</center>

		</div>

		</div>

</body>
</html>