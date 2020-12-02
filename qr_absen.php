<!DOCTYPE html>

<html>
    <head>
    <link rel="icon" href="lib/img/favicon.png">
    <link rel="stylesheet" href="lib/style.css">
    <link rel="stylesheet" href="lib/css/style.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link href="./lib/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="./lib/dashboard.css" rel="stylesheet">
    <script src="./lib/ie-emulation-modes-warning.js"></script>

    <title>Athena Study Center - Absen</title>

    </head>
    <body>
    <?php
        include './lib/db/dbconfig.php';
        //get id tanpa login dengan mac address
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
        $sql_cek = "SELECT id_user FROM detail_user WHERE mac_addr='$_HASIL'";
        $r = mysqli_query($conn, $sql_cek);
        $sql_type=mysqli_fetch_row($r);
        $id = $sql_type[0];

        if(isset($_POST['qr_submit'])&&$_POST['qr']!="Stopped"&&$_POST['qr']!="Scanning ..."&&$_POST['qr']!="Paused"){     
            $token = explode(" " ,$_POST['qr']); 
            define ("SECRETKEY", "mysecretkey1234");
            $token = openssl_decrypt($token[2], "AES-128-ECB", SECRETKEY);
            if($token == ""){
                 echo "<div class='alert alert-danger'><strong>Barcode tidak dikenali.</strong></div>";
            }
            else {
                $token = explode(" " ,$token);
                $day = $token[0];
                $session = $token[1];
		        $pb = $token[2];
                $date = $token[3];
                $date_explode =  explode("-" ,$date);  
                $hour = date("H.i")." WIB";
                $status = "Menunggu";
                $date_now = date("d");
                if($date_now > $date_explode[0]){
                    echo "<div class='alert alert-danger'><strong>Barcode expired.</strong></div>";
                }
                else{
                        if($id != ""){
                        $sql = "SELECT*FROM data_jadwal WHERE id_user='$id' AND hari='$day' AND sesi='$session' AND id_pb='$pb'";
			            $checking = mysqli_num_rows(mysqli_query($conn, $sql));
			            if($checking != 0){
                            $this_day = date("d-m-Y");
                            $sql = "SELECT*FROM data_absen WHERE id_tgl='$this_day' AND id_user='$id'";
                            $query_tday = $conn->query($sql);
                            if ($query_tday->num_rows==0) {
                                $sql = "INSERT INTO data_absen (
                                    id_user,
                                    hari,
                                    sesi,
                                    id_pb,
                                    id_tgl,
                                    jam_msk,
                                    st_jam_msk) VALUES (
                                    ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?,
                                    ?)";
                                if ($statement = $conn->prepare($sql)) {
                                    $statement->bind_param(
                                    "issssss", $id, $day, $session, $pb, $date, $hour, $status
                                    );
                                    if ($statement->execute()) {
                                        // Absen sukses
                                        $sql_cek = "SELECT name_user FROM detail_user WHERE id_user='$id'";
                                        $r = mysqli_query($conn, $sql_cek);
                                        $sql_name=mysqli_fetch_row($r);
                                        $name_user = $sql_name[0];
                                        $conn->close();
                                        echo "<div class='alert alert-success'><strong>Absen berhasil. Terimakasih ".$name_user.".</strong></div>";
                                    }
                                    else {
                                        echo "<div class='alert alert-danger'><strong>Absen Gagal. Silakan coba lagi...</strong></div>";
                                    }
                                }
                                else {
                                    echo "<div class='alert alert-danger'><strong>Absen Gagal. Silakan coba lagi...</strong></div>";
                                }
                            } else {
                                echo "<div class='alert alert-danger'><strong>Sudah absen.</strong></div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'><strong>Maaf Anda tidak terdaftar pada kelas dan sesi ini.</strong></div>";
                        }     
                }else{echo "<div class='alert alert-danger'><strong>Alamat MAC tidak terdaftar.</strong></div>";}}
            }
        }
        ?>

        <div class="container" id="QR-Code" style="width:90%">

            <div class="panel panel-info">

                <div class="panel-heading">

                    <div class="navbar-form navbar-left">

                        <h4>Qr-Code Scanner</h4>

                    </div>

                    <div class="navbar-form navbar-right">

                        <select class="form-control" id="camera-select"></select>

                        <div class="form-group">

                            <button title="Upload QR-Code" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>

                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>

                            <button title="Scan QR-Code" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>

                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>

                            <button title="Stop" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>

                         </div>

                    </div>

                </div>

                <div class="panel-body text-center">

                    <div class="col-md-6">

                        <div class="well" style="position: relative;display: inline-block;">

                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>

                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>

                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>

                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>

                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>

                        </div>
                        <div class="well" style="width: 100%;">

                            <label id="zoom-value" width="100">Zoom: 2</label>

                            <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">

                            <label id="brightness-value" width="100">Brightness: 0</label>

                            <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">

                            <label id="contrast-value" width="100">Contrast: 0</label>

                            <input id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">

                            <label id="threshold-value" width="100">Threshold: 0</label>

                            <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">

                            <label id="sharpness-value" width="100">Sharpness: off</label>

                            <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">

                            <label id="grayscale-value" width="100">grayscale: off</label>

                            <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">

                            <br>

                            <label id="flipVertical-value" width="100">Flip Vertical: off</label>

                            <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">

                            <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>

                            <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="thumbnail" id="result">

                            <div class="well" style="overflow: hidden;">

                                <img width="320" height="240" id="scanned-img" src="temp/athena.png">

                            </div>

                            <div class="caption">
                                <h3>Scanned result</h3>  
                                <form class='form-horizontal' role='form' style='width:50%' name='formulir' method='post' action='qr_absen'>
                                <select name="qr" style='margin-left:55%; width:92%'><option id="scanned-QR">Code will appear here...</option></select>
                                <button type='submit' class='btn btn-default' name='qr_submit' style='margin-left:85%'>Absen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <script type="text/javascript" src="js/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>
        -->
        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>