<html>
<head>
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
include 'func.php';
/* function get_value_of($name)
{
     $lines = file('data2.txt');
     foreach (array_values($lines) AS $line)
     {
          //list($key, $val) = explode(':', trim($line) );
		  list($key, $val, $ico) = array_pad(explode('|', trim($line), 3), 3, null);
          if (trim($key) == $name)
          {
                return $val;
          }
     }
     return false;
}  */

$iduser = $_GET['iduserr'];
$i = $_GET['iditem'];

include 'koneksi.php';
mysql_select_db('gdb0101');

$it="it".$i;
$io="io".$i;
$ioo="ioo".$i;
$is="is".$i;

//$sql="SELECT * FROM store WHERE user_id ='$iduser'";
$sql="SELECT `$it`, `$io`, `$ioo`, `$is` FROM `store` WHERE `user_id` ='$iduser'";
$result = mysql_query($sql);
if ($result){
$row = mysql_fetch_array($result);
//echo "".$iduser."<br>".$i."<br>".$it."<br>".$io."<br>".$ioo."";
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
			echo "<div id=opt_tam style='color : red;'>
				Unident </div>";
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
