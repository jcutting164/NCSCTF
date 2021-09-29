<!DOCTYPE html>

<html>
<body background="bgd.png"

<!-- Title code -->
<!-- Vm0wd2QyUXlWa1pOVldoVFYwZFNUMVpzWkZOV01WbDNXa2M1V0ZadGVGWlZNbmhQVmpGS2MySkVU
bGhoTWsweFZtcEJlRmRIVmtkWApiRnBPWW0xb1VWZFdaSHBsUmxsNFZHNU9hQXBTYlZKd1ZqQmFS
MDB4WkZkYVNIQnNVbTFTU1ZaWGRGZFdkM0JwVW14d2QxWlhNVFJXCmJWWkhXa1prV0dKVldsVlpi
RnBIVFRGU2MxZHNaRlprTTBKd1ZXcEdTMVZHWkZkYVJFSlhDbUpXUmpSWGExcHJWMnN3ZVdGR1Zs
VlcKYkhCNlZHdGFhMk5zWkhOYVJtUnJUVEJLZGxaR1dsZGtNa2w0V2toT1lWTkhVbE5EYlVZMlZt
eG9WbUpIYUhwV01qRlhaRWRXUjFOcwpaRmNLWWxVd2QxWkVSbGRVTWtwelVXeFdUbEpZVGt4RFp6
MDlDZz09Cg== -->

<title>NCS CTF</title>
<body style="height:4000px;">
<center>
<a href="flag.zip" download>

<h1 style="color:white;font-size:62px;"> NCSCTF{ThirdTimesTheCharm} </h1>
</a>

<h2 style="color:white;font-size:40px;"> NCSCTF{ </h2>
<img src="morse.gif" alt="decode this"  width="250" />
<h2 style="color:white;font-size:40px;"> } </h2>


</center>












<!-- Getting input -->
<center>



<section class="signup-form">
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="name" placeholder="Username..."><br><br>
		<input type="text" name="flag" placeholder="Flag..."><br><br>
		<button type="submit" name="submit">Submit Flag</button><br><br>

	</form>
</section>

</center>


<style>
  p {color:white;font-size:40px;margin-left: 100px;}
  
</style>
<p>

<?php 
	require_once 'includes/dbh.inc.php';
	require_once 'includes/functions.inc.php';
	$resultDatas = getTableData($conn);
	
	$allrows = array(
	
	);
	
	if(mysqli_num_rows($resultDatas) > 0){
		// output
		while($row = mysqli_fetch_assoc($resultDatas)){
			
			$allrows[] = $row;
			
			//echo $row["usersName"]  . " : " . $row["score"]. "<br>";
		}
	}else{
		echo "0 results";
	}
	
	$sortedrows= array(
	
	);
	$index = count($allrows);
	for($y=0; $y<$index; $y++){
		$temprow_score=0;
		$tempindex=0;
		for($x=0; $x<$index; $x++){
			if($temprow_score<$allrows[$x]["score"]){
				$temprow_score=$allrows[$x]["score"];
				$tempindex=$x;
			}
			//echo $allrows[$x]["usersName"] . " : " . $allrows[$x]["score"]. "<br>";
		}
		$sortedrows[] = $allrows[$tempindex];
		unset($allrows[$tempindex]);
	}
	for($x=0; $x<count($sortedrows); $x++){
		
		echo $sortedrows[$x]["usersName"] . " : " . $sortedrows[$x]["score"]. "<br>";
	}
	
	
	

?>

</p>




</body>
</html>