<?php


 
if( isset($_POST["submit"]) ){
	$name = $_POST["name"];
	$str = strtolower($str);
	$flag = $_POST["flag"];
	$score=0;
	
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	
	if(emptyInputSignup($name, $flag) !== false){
		header("location: ../index_blank.php");
		exit();
	}
	
	if(invalidUid($name) !== false){
		header("location: ../index_uidfail.php");
		exit();
	}
	
	if(invalidFlag($conn, $flag) !== false){
		header("location: ../index_failure.php");
		exit();
	}else{
		header("location: ../index.php?flag=valid");
		//exit();
	}
	if(uidExists($conn, $name) !== false){
		addScore($conn, $name, $flag);
		header("location: ../index_success.php");
		exit();
	}else{
		createUser($conn, $name, $score);
		addScore($conn, $name, $flag);
		header("location: ../index_success.php");
		exit();
	}
	
	
	
	
}else{
	header("location: ../index.php");
	exit();
}