<?php

	$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$select_projects				=		'SELECT * FROM `cms`.`projects`';
		$result_projects				=		$conn->query($select_projects);
		$dropdown=	'';
		while($row=mysqli_fetch_assoc($result_projects)){
					$data	 		= 		$row['PROJECT_NAME'];
					$ID				=		$row['PROJECT_ID'];
					$dropdown.=		'<option value="'.$data.'">'.$data.'</option>';
					}
	 ?>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style type="text/css">

/* popup styling ------------------------------------- */
.add_project_popup_extra_style {z-index:999999999 !important; /*top:20% !important;*/}
.add_project_popup_outer .modal-content { 
  background-color:#f9f9f9;
 -webkit-border-radius: 0 !important;
     -moz-border-radius: 0 !important;
          border-radius: 0 !important;
 }
.add_project_popup_outer .modal-body { padding-bottom:0; padding-top:0; }
.add_project_popup_outer .modal-header { border:0; }
.add_project_popup_outer .modal-title { text-align:center; font-size:38px; font-family: 'proxima_novalight'; }
.add_project_popup_outer h2 { color: #000; font-size: 13px; font-weight: 300; padding: 0 0 20px; text-align: center; }
.add_project_popup_outer .modal-body p { text-align:center; padding:0 60px 18px 60px; font-size:14px; font-family: 'proxima_novalight'; line-height:18px; }
.add_project_popup_outer .modal-footer { text-align:center; border:0; margin:0; }
.add_project_popup_outer .modal-footer .btn-default { width:175px; background-color:#0aebed; -webkit-border-radius: 0 !important; margin-bottom:2px;
     -moz-border-radius: 0 !important; padding:6px 12px; border:0; border-radius: 0 !important; font-size:18px; }
.add_project_popup_outer form { margin:0 auto; width:272px; }
.add_project_popup_outer .modal-footerbtns { width:50%; margin:0 auto; text-align:center; }
.add_project_popup_outer .modal-footerbtns .btn-default { margin:0 0 10px 0; width:205px; line-height:35px; font-size:20px; }
.add_project_popup_outer .modal-footerbtns .btn-default:first-child { background-color:#ccc; }
.add_project_popup_outer form input[type="text"] { background-color: #fff; border: 1px solid #ebebeb; box-sizing: border-box; color: #333;
display: inline-block; font-size: 13px; font-weight: 300; margin: 0 0 10px; padding: 6px; font-size:14px; width: 100%; }
.add_project_popup_outer .custompopupclose{margin:0 !important;}
.add_project_popup_outer form.full-width-form {  width:100%; }

.add_project_popup_outer .modal-body p.less-padding { padding:0 20px 18px 20px;  }
.add_project_popup_outer .modal-body p.input-field-style { padding:0 100px; }
.add_project_popup_outer .modal-body p > #changedEmail {
    width:60% !important;
    padding:6px !important;
}
@media screen and (max-width:480px) {
    .add_project_popup_outer .modal-body p.input-field-style { padding:0 20px; }
    .add_project_popup_outer .modal-content { 
padding-bottom: 20px;
 }
}

@media screen and (max-width:560px) {

    .add_project_popup_outer .modal-body p {
        padding-left:20px;
        padding-right:20px;
    }

}

@media screen and (max-width:480px){
    .add_project_popup_outer .modal-title {
        font-size:30px;
        padding-top:25px;
    }
    .add_project_popup_outer .modal-body p {
        padding:0 0 10px 0;
        font-size:12px;
    }
    .modal-footer {
        padding:0 0 10px 0;
    }
}
  
  </style>
  
  
</head>
<body>

    <script type="text/javascript">
	$( document ).ready(function() {
   
		$("#projects").change(function(){
			
			var selected = $('#projects option:selected').val();	
			if(selected	==	'NEW' || selected	==	'new')
			{
				$('#add_project_popup').modal('show');
				
				// if Ok presses then this code should work
				$("#ok_btn").click(function(){
					var projectName = $('#projectName').val();
					
					$.ajax({
						type:'POST', 
						url: 'db_projects.php', 
						data: { name: projectName }, 
						success: function(dataString) {
							 //alert(dataString);
							  var json = jQuery.parseJSON(dataString);
							  var error =	json.error;
							  if(!error){
							  	alert(json.data);
							  	window.location.replace(json.project_name);
								}
								else{
									alert(json.data);
								}
							// var json = jQuery.parseJSON(dataString);
							 
							},
							error: function()
							{
							   console.log(arguments);
							}
							
						});
					});
				
				
			}
			else{
					// Nothing to do in else part
				}
				
			});
			
		});	

	
	</script>


	<br>
	<form id="projectForm" action="index.php">
    	<select name="p" id="projects" style="width:300px;">
            <?php echo $dropdown;?>
            <option value="new"> New </option> 
        </select>
		<br><br>
		<a  onclick="document.getElementById('projectForm').submit();" href="#" id="submit" style="border:1px solid #000; padding:7px;">  NEXT  </a>
	</form>
	<div id="result"></div>
    
    <div class="add_project_popup_extra_style modal fade" id="add_project_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="add_project_popup_outer">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close custompopupclose" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Project UI</h4>
                </div>
                <div class="modal-body">
                    <p>
                        Please enter the project name
                    </p>
<input type="text" value="" id="projectName" name="projectName">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="ok_btn" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>