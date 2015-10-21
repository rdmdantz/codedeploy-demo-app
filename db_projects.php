<?php 
$projectName = $_POST['name'];

//echo $projectName;

	    //create DB connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		$select	=	"SELECT * FROM `CMS`.`projects` WHERE `projects`.`PROJECT_NAME` ='$projectName'";
		$result	=	$conn->query($select);
		$rowcount=mysqli_num_rows($result);
		$data=	'';
		if($rowcount > 0){
			$data	=	'Project already exists';
			$error = true;
			}else{
				$insert	=	"INSERT INTO `CMS`.`projects` (PROJECT_NAME, STATUS) VALUES('$projectName',1)";
				$result	=	$conn->query($insert);
				$data	=	'Project '.$projectName.' created successfully ';
				$error = false;
				}
			$OUTPUT_ARR	 = array('error' => $error ,'data' => $data, 'project_name' => './index.php?p='.$projectName);		
			print_r(json_encode($OUTPUT_ARR));	
		/*if this result is true, it means this project name already exists in db 
		otherwise write INSERT query to save in db*/
		
?>