<?php 
//print_r($_POST);
//print_r($_GET);
//exit;
include 'class_db.php';

Class TABLES_COLUMNS{
	public static function create_table($conn,$TABLE_NAME,$PROJECT_NAME){
	  	$select	=	"SELECT * FROM `CMS`.`projects` WHERE `projects`.`PROJECT_NAME` ='$PROJECT_NAME'";
		$result	=	$conn->query($select);
		$PROJECT_ID	=	NULL;
		 while($row=mysqli_fetch_assoc($result))
		$PROJECT_ID=$row['PROJECT_ID'];
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
	$project_name=$_POST['projectId'];
	$table_name=$_POST['tableName_addNewTable'];
	echo $tc->create_table($conn,$table_name,$project_name);
	//echo 'Table Created';
	}
if(isset($_GET['column']))
{
	$COLUMN_NAME	=	$_POST['fieldName_addNewField'];
	$COLUMN_TYPE	=	$_POST['fieldType_addNewField'];
	$LENGTH			=	$_POST['fieldLength_addNewField'];
	$TABLE_ID		=	$_GET['column'];
	return $tc->create_column($conn,$COLUMN_NAME,$COLUMN_TYPE,$LENGTH,$TABLE_ID);
	//echo 'Column Created';
	}
 
?>