<!DOCTYPE html>

<html>
<body background="bgd.png"

<!-- Title code -->
<title>NCS CTF</title>
<body style="height:4000px;">
<center>
<a href="index.php">

<h1 style="color:white;font-size:62px;"> NCS Club CTF </h1>

</a>
<h1 style="color:white;font-size:45px;"> Invalid Username. Use letters/numbers only. </h1>
<a href="https://www.youtube.com/watch?v=wDgQdr8ZkTw&ab_channel=GameGuard">
<img src="badtime.gif" alt="Bad Time">
</a>

</center>









<!-- Getting input -->
<center>



<section class="signup-form">
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="name" placeholder="Username..."><br><br>
		<input type="text" name="flag" placeholder="NCSCTF{NameOfFlagHere}"><br><br>
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