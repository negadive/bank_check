<html>
<head>
	<?php
	include 'func.php';
	include 'koneksi.php';
	?>
	<style>
		.table {
			//width: 100%;
			//border-collapse: collapse;
		}

		.hehe {
			border: 1px solid black;
			padding: 5px;
		}

		th {text-align: left;}
	</style>
</head>

<body >
<div  style="height:278.4px; width:242.4;">
	<img src="info.png" height="278.4" width="242.4" style="border-radius: 5px; z-index:-1;"/>
	<?php
	$iduser = $_GET['iduserr'];
	$i = $_GET['iditem'];

	$it="it".$i;
	$io="io".$i;
	$ioo="ioo".$i;
	$is="is".$i;

	$sql="SELECT `$it`, `$io`, `$ioo`, `$is` FROM `store` WHERE `user_id` ='$iduser'";
	$result = mysqli_query($con, $sql);
	if ($result){
		$row = mysqli_fetch_array($result);
		echo "<div style='position: absolute; left: 20px; top: 140px; z-index: 2;'>";
		
		echo get_of($row[$it],'name');
		if((get_of($row[$it],'type') != 1) && (get_of($row[$it],'type') != 7) && (get_of($row[$it],'type') != 100)){
			echo "+".$row[$io];
		}else{
			echo "(".$row[$io].")";
		}
		
		echo "<br>";
		echo "$row[$it]";
		echo "<br>";
		echo "<br>";
		echo "No. Seri : <br>$row[$is]";
		echo "<br>";
		echo "<br>";
		
		if($row[$ioo]!=0){
			if($row[$ioo] == -1){
				echo "<div id=opt_tam style='color : red;'>Unident </div>";
			}else{
				echo "<div id=opt_tam style='color : rgb(120,48,180);'>";
				echo "<br>Option tambahan";
				opt_tam($row[$ioo]);
				echo "</div>";
			}
		}
	}
	?>
	</div>
</div>	
</body>
</html>
