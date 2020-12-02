<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="lib/img/favicon.png">
    <link rel="stylesheet" href="lib/style.css">
    <link rel="stylesheet" href="lib/css/style.css">
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">

    <title>Athena Study Center</title>

    <link href="./lib/bootstrap.min.css" rel="stylesheet">
    <link href="./lib/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="./lib/dashboard.css" rel="stylesheet">
    <script src="./lib/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="./lib/fa/css/all.css">

    <!--<link href="./lib/css/now-ui-dashboard.css" rel="stylesheet">
    <link href="./css/demo.css" rel="stylesheet">-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <nav class="navbar navbar-default navbar-fixed-top" style="background: -webkit-linear-gradient(right, rgba(117,121,255,0.6), rgba(178,36,239,0.6));">
      <div class="container-fluid">
			<!--<div id="clockdate">

				<div class="clockdate-wrapper">

					<div id="clock"></div>

					<div id="date"><?php echo date('l, F j, Y'); ?></div>

				</div>

			</div>-->


        <?php 
        include './model/layout/navbar.php';
        ?>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php 
          include './model/layout/sidebar.php';
          ?>  
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php 
          include './model/layout/content.php';
          ?>
        </div>
      </div>
    </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./lib/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./lib/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="./lib/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./lib/ie10-viewport-bug-workaround.js"></script>
    <!-- <script src="./js/now-ui-dashboard.js?v=1.0.1"></script> -->
</body>
</html>