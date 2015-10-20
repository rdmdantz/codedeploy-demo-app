<?php 
$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		if( isset($_POST['ID'])){
		$ID	=	 $_POST['ID'];
	//echo $_POST['ID'];
		$select_div				=		"SELECT `divs`.NAME AS DIV_NAME, `divs`.ELEMENT AS HTML,`html_css`.ID, `html_css`.NAME, `html_css`.CSS AS CSS, `html_css`.CLASS AS CLASS FROM `CMS`.`divs`,`CMS`.`html_css`  WHERE `divs`.HTML_CSS_ID = `html_css`.ID AND `divs`.HTML_CSS_ID = $ID";
		$result_div				=		$conn->query($select_div);
		$data	=	array();
		while($row=mysqli_fetch_assoc($result_div)){ 
					// $DIV_NAME	 	= 		$row['DIV_NAME'];//label
					// $HTML	 		= 		$row['HTML'];
					// $CSS	 		= 		$row['CSS'];
					// $CLASS	 		= 		$row['CLASS'];
					// $NAME	 		= 		$row['NAME'];
					 $data	=	$row;
					}
					
					//echo $select_div;
			$OUTPUT_ARR	 = array('data' => $data);		
			print_r(json_encode($OUTPUT_ARR));
		}
?>