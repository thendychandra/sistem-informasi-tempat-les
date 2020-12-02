<!DOCTYPE html>
<html>
    <body>
    <script>
    // navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
    //         if (navigator.getUserMedia) {
    //             navigator.getUserMedia({ video: true }, videoError);
    //         }
    //         function handleVideo(stream) {
    //             //video.src = window.URL.createObjectURL(stream);
    //             //console.log(stream);
    //         }
    //         function videoError(e) {
    //             // do something
    //             alert("Izinkan program webcam dengan javascript dan html ini untuk melihat demo!")
    //         }
    </script>
    <div class="display-msg" style="display: none"></div>

        <div class="container" id="QR-Code" style="width:90%">

            <div class="panel panel-info">

                <div class="panel-heading">

                    <div class="navbar-form navbar-left">

                        <h4>Qr-Code Scanner</h4>

                    </div>

                    <div class="navbar-form navbar-right">

                        <select class="form-control" id="camera-select"></select>

                        <div class="form-group">

                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip" style="display: none;"><span class="glyphicon glyphicon-upload"></span></button>

                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip" style="display: none;"><span class="glyphicon glyphicon-picture"></span></button>

                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip" style="width: 100px;"><span class="glyphicon glyphicon-play"></span></button>

                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip" style="display: none;"><span class="glyphicon glyphicon-pause"></span></button>

                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip" style="display: none;"><span class="glyphicon glyphicon-stop"></span></button>

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
                                <!-- <h3>Scanned result</h3>   -->
                                <form class='form-horizontal' role='form' style='width:50%' name='formulir' method='post' action='qr_absen'>
                                <select name="qr" style='margin-left:55%; width:92%; display:none;'><option id="scanned-QR">Code will appear here...</option></select>
                                <!-- display:none; -->
                                <!-- <button type='submit' class='btn btn-default' name='qr_submit' style='margin-left:85%'>Absen</button> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <script type="text/javascript" src="js/filereader.js"></script>
        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>