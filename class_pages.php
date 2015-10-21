<?php 
include 'class_db.php';

Class PAGES{
	public static function create_page($conn,$PAGE_TITLE,$PROJECT_ID){
		$query	=	"INSERT INTO `cms`.`pages` (`PAGE_ID`, `PAGE_TITLE`, `PROJECT_ID`, `STATUS`) VALUES (NULL, '$PAGE_TITLE', '$PROJECT_ID', '1');";
		$result = $conn->query($query); //$conn->insert_id;
		return $result;
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
		
	
	
}//endofclass
		
$con	=	new 	database;
$conn	=	$con->connection();
$page	=	new PAGES;
$PAGE_TITLE	=	'title';
$PROJECT_ID	=	'1';
if($page->create_page($conn,$PAGE_TITLE,$PROJECT_ID))
	echo 'Page created';

?>