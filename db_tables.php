<?php 
include 'class_db.php';

Class TABLES{
	public static function create_table($conn,$table_name,$columns){
					$query	=	"CREATE TABLE $table_name
						(";
						foreach ($columns as $row) {
						 $query.= $row['name'].' '. $row['type'].' '. $row['size'].',';
						}
					  $query =	trim($query,",");
					$query.= ");";
	echo $query;exit;
		$result = $conn->query($query); //$conn->insert_id;
		return $result;
		}

	
		
	
	
}//endofclass
		
$con	=	new 	database;
$conn	=	$con->connection();
$table	=	new TABLES;
if($table->create_table($conn,"employeee",	array(
							'0'=>array('name' =>  'abc','type' =>  'int','size' => '255'),
							'1'=>array('name' =>  'abc','type' =>  'int','size' => '255')
							)))
	echo 'Page created';
 
?>