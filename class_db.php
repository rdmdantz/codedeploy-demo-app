<?php
class database {
	static public function connection(){
 	
	$host	=	null;
	$user	=	'root';
	$password	=	'';
	$database	=	'cms';
 	$con= new mysqli(
  $host, // host
  $user, // username
  $password,     // password
  $database // database name
  
  );

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

	mysqli_select_db($con,$database);return $con;
	}
 	
}
 ?>