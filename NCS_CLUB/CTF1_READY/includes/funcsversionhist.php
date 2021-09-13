<?php


function emptyInputSignup($name, $flag){
	
	$result;
	if(empty($name) || empty($flag)){
		$result=true;
	}else{
		$result=false;
	}
	
	return $result;
	
}

function invalidUid($name){
	
	$result;
	if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
		$result=true;
	}else{
		$result=false;
	}
	
	return $result;
	
}



function invalidFlag($conn, $flag){
	
	//code
	// need access to sql database...
	$flag = strtoupper($flag);
	$sql = "SELECT * FROM `flags` WHERE flag = ?;";

	$stmt= mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../index.php?error=invalidflag");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $flag);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if(mysqli_fetch_assoc($resultData)){
		$result=false;
		return $result;
	}else{
		$result=true;
		return $result;
	}
	
	
	
	mysqli_stmt_close($stmt);
	
	//header("location: ../index.php?flagsubmitted");
	
	
}

function uidExists($conn, $name){
	$sql = "SELECT * FROM `users` WHERE usersName = ?;";
	$stmt= mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../index.php?error=uidalreadyexists");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $name);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if(mysqli_fetch_assoc($resultData)){
		$result=true;
		return $result;
	}else{
		$result=false;
		return $result;
	}
	
	mysqli_stmt_close($stmt);
	
}

function createUser($conn, $name,$score){
	//$sql = "INSERT INTO `users` (usersName, score) VALUE (?,?);";
	$sql = "INSERT INTO `users` (usersName, score) VALUE (?,?);";

	$stmt= mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../index.php?error=stmtfailedcreateuser");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $name, $score);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	header("location: ../index.php?error=none");
	
	
}

function getTableData($conn){
	
	$sql = "SELECT userId, usersName, score FROM users";
	//$stmt= mysqli_stmt_init($conn);
	//if(!mysqli_stmt_prepare($stmt,$sql)){
	//	header("location: ../index.php?error=failedtoretrieve");
	//	exit();
	//}
	//mysqli_stmt_execute($stmt);
	$resultData = mysqli_query($conn, $sql);
	
	return $resultData;
}

function addScore($conn, $name, $flag){
	
	/* parts:
	
		- get flag score
		- get current user score
		- add score
		- replace data
	
	
	*/
	
	$flag = strtoupper($flag);
	
	
	
	$sql = "SELECT userId, usersName, score FROM users";
	$resultDataUser = mysqli_query($conn, $sql);
	$allrows = array(
	
	);
	$endUserValue=0;
	if(mysqli_num_rows($resultDataUser) > 0){
		// output
		while($row = mysqli_fetch_assoc($resultDataUser)){
			
			$allrows[] = $row;
			
			if(strtolower($row["usersName"])==strtolower($name)){
				$endUserValue=intval($row["score"]);
			}
		}
	}else{
		echo "0 results";
	}
	
	
	// updating the value
	$endUserValue +=5;
	$sql = "UPDATE users SET score = ". $endUserValue . " WHERE usersName = ?;";
	
	$stmt= mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../index.php?error=addscorefailureflag");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $name);

	mysqli_stmt_execute($stmt);
	
	
	
	mysqli_stmt_close($stmt);
	
	
}


/*
function createUser($conn, $name,$score){
	//$sql = "INSERT INTO `users` (usersName, score) VALUE (?,?);";
	//$sql = "INSERT INTO `users` (usersName, score) VALUE (?,?);";

	$stmt= $conn->prepare("INSERT INTO users (usersName, score) VALUES(?,?)");
	
	$stmt->bind_param("ss",$name,$score);
	
	$stmt->execute();
	
	header("location: ../index.php?error=none");
	
	
}*/