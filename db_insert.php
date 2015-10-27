<?php 
	Class Insert{
			public function gen_insert_query($table_name, $arr){
				$query_col	=	NULL;
				$query_val	=	NULL;
				$query	=	"\"INSERT INTO `$table_name` ";
				foreach($arr	as $key => $value){
					$query_col	.=	" `".$key."` ,";
					$query_val	.=	" '\".\$_POST[\"".$value."\"].\"' ,";	
					}
				$query_col	=	rtrim($query_col,",");
				$query_val	=	rtrim($query_val,",");
				return $query.	"( ".$query_col." ) values (".$query_val.");\"";
			}
			public function gen_insert_code($query){
				$code	=	"<?php\n";
				$code	.=	"	\$query	=	$query;\n";
				$code	.=	"	\$result	=	\$conn->query(\$query);\n";
				$code	.=	"	if(\$result === true)\n";
				$code	.=	"	{\n";
				$code	.=	"		echo 'Record saved';\n";
				$code	.=	"	}\n";
				$code	.=	"	else\n";
				$code	.=	"	{\n";
				$code	.=	"		echo 'Record Not saved';\n";
				$code	.=	"	}\n";				
				return	$code."?>";
				}
		}
	 
	$Insert	=	new Insert;
	$table_name	=	'users';
	$col_val_arr	=	array("name"=>"name","age"=>"age","test"=>"test");
	$query	= $Insert->gen_insert_query($table_name,$col_val_arr);
	
	file_put_contents("test.php", $Insert->gen_insert_code($query));
?>

