<?php
/*
$serverName = "db5004824216.hosting-data.io";
$dBUsername = "dbu1400834";
$dBPassword = "joshiscoollollol";
$dBName = "dbs4047179";

$conn = mysqli_connect($serverName,$dBusername,$dBPassword,$dBName);


//$conn = new mysqli($serverName,$dBusername,$dBPassword,$dBName);


if(!$conn){
	die("Connection failed: " . mysqli_connect_error());

}*/



  $host_name = 'db5004824216.hosting-data.io';
  $database = 'dbs4047179';
  $user_name = 'dbu1400834';
  $password = 'joshiscoollollol';

  $conn = new mysqli($host_name, $user_name, $password, $database);

  if ($conn->connect_error) {
    die('<p>Failed to connect to MySQL: '. $conn->connect_error .'</p>');
  } 
?>