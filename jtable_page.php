<?php 
$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$select				=		'SELECT * FROM `cms`.`jtable`';
		$result	=	$conn->query($select);
		
		$jtable_title = '';
		$jtable_desc = '';
		$jtable_cost = 0;
		$arrayList = array();
			
				while($row=mysqli_fetch_assoc($result)){
					$jtable_title	 		= 		$row['jtable_title'];
					$jtable_desc				=		$row['jtable_desc'];
					$jtable_cost				=		$row['jtable_cost'];
					
						$array = array(
							'title' => $jtable_title, 
							'desc' => $jtable_desc, 
							'cost' => $jtable_cost
						);
						
						$arrayList[] = $array;
					}
			
			$OUTPUT_ARR	 = $arrayList;	
			//print_r(json_encode($OUTPUT_ARR));
		
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>

<!-- DataTables CSS -->
<!--<link rel="stylesheet" type="text/css" href="/DataTables-1.10.9/media/css/jquery.dataTables.css">
  
<!-- jQuery -->
<!--<script type="text/javascript" charset="utf8" src="/DataTables-1.10.9/media/js/jquery.js"></script>-->
  
<!-- DataTables -->
<!--<script type="text/javascript" charset="utf8" src="/DataTables-1.10.9/media/js/jquery.dataTables.js"></script>-->


<script type="text/javascript">
$(document).ready(function(){
    $('#jTableContainer').DataTable();

	
});
</script>

<table id="jTableContainer" class="display">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($OUTPUT_ARR as $array)
	{
	?>
        <tr>
            <td id="col1"><?php echo $array['title']; ?></td>
            <td id="col2"><?php echo $array['desc']; ?></td>
            <td id="col3"><?php echo $array['cost']; ?></td>
        </tr>
        
        <?php
        }
		?>
        
    </tbody>
</table>