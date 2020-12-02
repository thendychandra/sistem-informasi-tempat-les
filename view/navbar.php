<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">         <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
  <a class="navbar-brand">Daftar Guru:</a>
  </div>
<div id="navbar" class="navbar-collapse collapse">
<?php
	if (isset($_SESSION['adm'])) {
			$q="SELECT * FROM detail_pb ORDER BY id_user ASC";
			$r = mysqli_query($conn, $q);
			while($name=mysqli_fetch_row($r)){
				$tet = $name[0];
				$link = "?pb=".$tet;
				echo "<ul class='nav navbar-nav navbar-left'>";
				echo "<form class='form-horizontal' role='form' style='width:20%' name='formulir' method='post' action='add_schedule'>";
				echo "<input type='hidden' name='pb' value=$tet><button type='submit' class='btn btn-default' name='choose_pb'>$name[1]</button>";
				echo "</form>";
				echo "</ul>";
			}	
   	}
	elseif(isset($_SESSION['pb'])){
			$user_pb = $_SESSION['id'];
			$q="SELECT * FROM detail_pb WHERE id_user = $user_pb";
			$r = mysqli_query($conn, $q);
			while($name=mysqli_fetch_row($r)){
				$tet = $name[0];
				$link = "?pb=".$tet;
				echo "<ul class='nav navbar-nav navbar-left'>";
				echo "<form class='form-horizontal' role='form' style='width:20%' name='formulir' method='post' action='add_schedule'>";
				echo "<input type='hidden' name='pb' value=$tet><button type='submit' class='btn btn-default' name='choose_pb'>$name[1]</button>";
				echo "</form>";
				echo "</ul>";
			}
	}
	elseif (isset($_SESSION['sw'])) {
			$q="SELECT * FROM detail_pb ORDER BY id_user ASC";
			$r = mysqli_query($conn, $q);
			while($name=mysqli_fetch_row($r)){
				$tet = $name[0];
				$link = "?pb=".$tet;
				echo "<ul class='nav navbar-nav navbar-left'>";
				echo "<form class='form-horizontal' role='form' style='width:20%' name='formulir' method='post' action='add_schedule'>";
				echo "<input type='hidden' name='pb' value=$tet><button type='submit' class='btn btn-default' name='choose_pb'>$name[1]</button>";
				echo "</form>";
				echo "</ul>";
			}	
   	}
 ?>
</div>