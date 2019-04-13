<?php
function get_of($name,$what){
	$lines = file('a.txt');
	foreach (array_values($lines) AS $line){
		//list($key, $val) = explode(':', trim($line) );
		list($key, $val, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,$type , , , $ico) = array_pad(explode('|', trim($line), 75), 3, null);
		if( (trim($key) == $name) && (trim($key) != 0) ){
			if($what=="name"){
				return $val;
			}else if($what=="ico"){
				return $ico;
			}else if($what=="type"){
				return $type;
			}
		}
	}
	return false;
} 

function opt_tam($opt){
	$opt2 = ['MP','HP','Kec. Grkn','Eva','Crit','Acc','Aspd','Def','M.atk','Atk',];
	$opt3 = ['DDT','DDH','Kec. Grkn','Eva','Crit','Acc','Aspd','Def','M.atk','Atk',];
	//$opt  = 2147483647;
	//printf("%032b<br>", $opt);
	$optc = sprintf('%031b', $opt);
	//echo $a;
	//28 25 22 19 16 13 10 7 4 1
	?>
	<table style="font-size:15; color : rgb(120,48,180);">
	<?php
	$i=11;
	$x=0;
	while( $x<5){
		echo "<tr>";
		$y=0;
		while($y<2 && $i>1) {
			echo "<td width=100>";
		//	while(($i > 0 )) {
				do { //kalo 0, geser
					$i--;
					$z = $i*3-2;
					$optd = substr($optc,$z,3);
					$optd = bindec($optd);
				} while($optd == 2 && $i>1);
				if($optd != 2){ //bukan 0
					if($optd > 2){ //opt +
						if($i==7){ //aspd
							$optd = ($optd - 2)*3; 
						}else if($i<7 && $i>2){ // acc, crit, eva, mspd
							$optd = ($optd - 2)*2; 
						}else if($i<3 && $i>0){ // acc, crit, eva, mspd
							$optd = ($optd - 2)."%"; 
						}else{
							$optd = ($optd - 2)*5;
						}
						//$optd = ($optd - 2)*5;
					}else{ //opt -
						$optd = (-2 + $optd)*5;
					}
					if($optc[0]==1){
						echo $opt3[$i-1].".".$optd;
					}else{
						echo $opt2[$i-1].".".$optd;
					}
				}
				$optz[$i]=$optd;
		//	}
			echo "</td>";
			$y++;
		}
		echo "</tr>";
		 $x++;
	}

	echo "</table>";

}

?>