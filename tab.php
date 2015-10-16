<?php 
error_reporting(0);
if(isset($_POST['submit']))
{
		//create DB connection
		$servername = "localhost";
		$username = "root";
		$password = "pop.tarts";
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		if(isset($_POST['div_name'])){$div_name				=			$_POST['div_name'];}
		
		$select	=	'SELECT MAX(FORM_ID) AS ID FROM `CMS`.`html_css`';
					$result	=	$conn->query($select);
					$row=mysqli_fetch_assoc($result);
					$index	=	$row['ID'];
					
		$update	=	"UPDATE `CMS`.`html_css` SET  `CLASS`	=	'$div_name'	WHERE `html_css`.`FORM_ID` = $index";
		$result	=	$conn->query($update);
		
		
		$select_data	=	"SELECT * FROM `CMS`.`html_css` WHERE FORM_ID	= $index AND `STATUS` = '1'";
					$result	=	$conn->query($select_data);
					$data	=	'';
					$css_data	=	'';
					while($row=mysqli_fetch_assoc($result)){
					$data .= $row['HTML'];
					$data.=	'<br/>';
					$css_data	.=	$row['CSS'];
					}
					
		$html_file_name	=	$div_name;			
		$css_file_name	=	$div_name;
		$start_html	=	'<html><head><link rel="stylesheet" type="text/css" href="'.$css_file_name.'.css"></head><body>';
		$start_data	=	'<div id="'.$div_name.'" class="'.$div_name.'"><form method ="post" action="">';
		$end_data	=	'</form></div>';
			$end_html	=	'</body></html>';
			$file = 'dummy/'.$html_file_name.'.html';
			$myfile = fopen($html_file_name, "w");
			
			//$current = file_get_contents($file);
			$current = '';
			// Append code to the file
			$current .= $start_html;
			$current .= $start_data;
			$current .= $data;
			$current .= $end_data;
			
			$current .= $end_html;
			// Write the contents back to the file
			file_put_contents($file, $current);
			
			
			$file_css = 'dummy/'.$html_file_name.'.css';
			$myfile = fopen($file_css, "w");
			$current = '';
			$current .= $css_data;
			file_put_contents($file_css, $current);
		
	$update	=	"UPDATE `CMS`.`html_css` SET  `STATUS`	=	'SAVEDD'	WHERE `html_css`.`FORM_ID` = $index";
	$result	=	$conn->query($update);	
	echo '<p style="margin-left:20px;">ALL THE ELEMENTS SAVED TO DATABASE</p>';
	echo '<a href="download.php">Download HTML</a><br/>';
	echo '<a href="download_css.php">Download CSS</a>';
	}

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="tab.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<script>
$(document).ready(function() { 
$(".nav-tabs").on("click", "a", function(e){
     $(".container").tab(); 
    
    e.preventDefault();
     $(this).tab('show');
      })
    .on("click", "span", function () {
        var anchor = $(this).siblings('a');
        $(anchor.attr('href')).remove();
        $(this).parent().remove();
        $(".nav-tabs li").children('a').first().click();
    });
    /* Adding New Tabs */
    $('.add-tab').click(function(e) {
        e.preventDefault();
        var id = $(".nav-tabs").children().length; 
        $(this).closest('li').before('<li><a href="#tab'+id+'">#'+ id + '</a><span>x</span></li>');         
        $('.tab-content').append('<div class="tab-pane" id="tab'+id+'">'+ '<br><iframe src="index.php" width="100%" height="60%" allowtransparency="true" frameBorder="0">' + '</iframe>' + '</div>');
    
  });
});

function submitForm() {
    $.ajax({type:'POST', url: 'db_input.php', data:$('#testForm').serialize(), success: function(response) {
    }});

    return false;
}
</script>
<body>
  <div class="container">
      <ul class="nav nav-tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Home</a><span>x</span></li>
          <li><a href="#" class="add-tab" data-toggle="tab">+ Add Tab</a></li>
      </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1"><br><iframe src="index.php" width="100%" height="75%" allowtransparency="true" frameBorder="0">Your browser does not support IFRAME's</iframe></div>
    </div>
    <form method="post" action="">
    <label>Enter DIV's class and ID Name:</label>
            <input type="text" name="div_name" /><br/>
            
     <input type="submit" value="SAVE" name="submit"/>
    </form>
</div>
</body>
</html>
