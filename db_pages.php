<?php 

include 'class_db.php';

Class PAGES{
	public static function create_page($conn,$PAGE_TITLE,$PROJECT_ID){
		$query	=	"INSERT INTO `cms`.`pages` (`PAGE_ID`, `PAGE_TITLE`, `PROJECT_ID`, `STATUS`) VALUES (NULL, '$PAGE_TITLE', '$PROJECT_ID', '1');";
		$result = $conn->query($query);  ;
		return $conn->insert_id;
		}

	public static function update_page($conn,$PAGE_TITLE,$PROJECT_ID,$PAGE_ID){
		$query	=	"UPDATE `cms`.`pages` 
						SET  `PAGE_TITLE`	=	'$PAGE_TITLE',
							`PROJECT_ID`	= 	'$PROJECT_ID',
							`STATUS`	=	'1'
						WHERE 
							`PAGE_ID` 	=	$PAGE_ID";
		$result = $conn->query($query);
		return $result;
		}
		
	public static function  check_page_exist($conn,$PAGE_TITLE,$PROJECT_ID){
		$query	=	"SELECT * FROM `cms`.`pages` WHERE  `PAGE_TITLE` = '$PAGE_TITLE' and `PROJECT_ID`	= '$PROJECT_ID' ;";
	 	$result = $conn->query($query); 
		if(mysqli_num_rows ($result)>0)
			return true;
		else
			return false;
		}
	
}//endofclass
		
$con	=	new 	database;
$conn	=	$con->connection();
$page	=	new PAGES;
$PAGE_TITLE	=	'ADSF';
$PROJECT_ID	=	'1';
if(!$page->check_page_exist($conn,$PAGE_TITLE,$PROJECT_ID)){
	 
	echo 'Page created'.$page->create_page($conn,$PAGE_TITLE,$PROJECT_ID);
}else
{
	echo 'page exist';
	}
?>