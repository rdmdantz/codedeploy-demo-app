<?php 
include 'class_db.php';

Class TABLES_COLUMNS{
	public static function create_table($conn,$TABLE_NAME,$PROJECT_ID){
		$query	=	"INSERT INTO `cms`.`tables` (`TABLE_ID`, `TABLE_NAME`, `PROJECT_ID`) VALUES (NULL, '$TABLE_NAME', '$PROJECT_ID');";
		$result = $conn->query($query);  ;
		return $conn->insert_id;
		}
		public static function create_column($conn,$COLUMN_NAME,$COLUMN_TYPE,$LENGTH,$TABLE_ID){
		$query	=	"INSERT INTO `cms`.`table_columns` (`COLUMN_ID`, `COLUMN_NAME`, `COLUMN_TYPE`, `LENGTH`, `TABLE_ID`, `ELEMENT_ID`) VALUES (NULL, '$COLUMN_NAME', '$COLUMN_TYPE', '$LENGTH', '$TABLE_ID', '');";
		$result = $conn->query($query);  ;
		return $conn->insert_id;
		}
	
}//endofclass
		
		

$con	=	new 	database;
$conn	=	$con->connection();
$tc	=	new TABLES_COLUMNS;	

if(isset($_GET['table']))
{
	$project_id='1';
	$table_name='r';
	$tc->create_table($conn,$table_name,$project_id);
	echo 'Table Created';
	}
if(isset($_GET['column']))
{
	$COLUMN_NAME	=	'mm';
	$COLUMN_TYPE	=	'INT';
	$LENGTH			=	'255';
	$TABLE_ID		=	'1';
	$tc->create_column($conn,$COLUMN_NAME,$COLUMN_TYPE,$LENGTH,$TABLE_ID);
	echo 'Column Created';
	}
 
?>