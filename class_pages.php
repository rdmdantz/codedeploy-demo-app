<?php 
include 'class_db.php';

Class PAGES{
	public static function Create_page($conn,$PAGE_TITLE,$PROJECT_ID){
		$query	=	"INSERT INTO `cms`.`pages` (`PAGE_ID`, `PAGE_TITLE`, `PROJECT_ID`, `STATUS`) VALUES (NULL, '$PAGE_TITLE', '$PROJECT_ID', '1');";
		$result = $conn->query($query);
		}
		
	
	
}//endofclass
		
$con	=	new 	database;
$conn	=	$con->connection();
$page	=	new PAGES;
$PAGE_TITLE	=	'title';
$PROJECT_ID	=	'1';
$page->Create_page($conn,$PAGE_TITLE,$PROJECT_ID);