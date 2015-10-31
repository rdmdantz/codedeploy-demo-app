<?php 
print_r($_POST);
//exit;
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
							`STATUS`		=	'1'
						WHERE 
							`PAGE_ID` 		=	$PAGE_ID";
		$result = $conn->query($query);
		return $result;
		}
	public static function update_page_goto($conn,$PAGE_ID,$NEXT_PAGE_ID){
		$query	=	"UPDATE `cms`.`pages` 
						SET  
							`NEXT_PAGE`		= 	'$NEXT_PAGE_ID'
						WHERE 
							`PAGE_ID` 		=	$PAGE_ID";
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
	public static function update_table_columns($conn,$COLUMN_ID,$ELEMENT_ID){
		$query	=	"UPDATE `cms`.`table_columns` 
						SET  
							`ELEMENT_ID`		= 	$ELEMENT_ID
						WHERE 
							`COLUMN_ID` 		=	$COLUMN_ID";
		$result = $conn->query($query);
		return $result;
		}
	
}//endofclass
		
$con	=	new 	database;
$conn	=	$con->connection();
$page	=	new PAGES;
$PAGE_TITLE	=	'ADSF';
$PROJECT_ID	=	'1';
if($_POST['next_dropdown']	==	'Goto')
	if($_POST['pageId']	!=	NULL	||	$_POST['pageId']	!=	"")
	{
		if($_POST['goto_dropdown']	!=	'Select one...')
		$page->update_page_goto($conn,$_POST['pageId'],$_POST['goto_dropdown']);
			echo	'page togo set';
			exit;
		}
if($_POST['next_dropdown']	==	'input')
{
	$total	=	$_POST['elementCount'];
	$count	=	0;
	$i	=	1;
	while(true){
		if($total	==	$count)
			exit;
		if(isset($_POST['lable_'.$i])){
			$column_id	=	$_POST['field_'.$i];
			$element_id	=	$_POST['lable_'.$i];
			$page->update_table_columns($conn,$column_id,$element_id);
			$count	++;
				}
		$i++;
		}
	echo	'element link with table columns';
	exit;
			
			
	}

if(!$page->check_page_exist($conn,$PAGE_TITLE,$PROJECT_ID)){
	 
	echo 'Page created'.$page->create_page($conn,$PAGE_TITLE,$PROJECT_ID);
}else
{
	echo 'page exist';
	}
?>