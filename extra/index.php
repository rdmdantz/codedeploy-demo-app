<html>
<head>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
	function form_submit(a){
	alert(a);
				$.ajax({
						type:'POST', 
						url: 'db_pages.php', 
						data:  $("#form"+a).serialize(), 
						success: function(dataString) {
							 alert(dataString);
							  
							// var json = jQuery.parseJSON(dataString);
							 
							},
							error: function()
							{
								alert('err');
							   console.log(arguments);
							}
							
						});
					
	}
</script>
</head>
<body>
<form id="form1" action="db_elements.php" method="POST">
		<div>
            <label class="title">name</label>
            <input type="text" id="name" name="name" >
        </div>
        <div>
            <label class="title">Name</label>
            <input type="text" id="name2" name="name2" >
        </div>
<input type="button" id="submit" onClick="form_submit(1);"  name="submitButton" value="Submit">
</form>
<br><br><br>
<form id="form2" action="db_elements.php" method="POST">
		<div>
            <label class="title">name</label>
            <input type="text" id="name" name="name" >
        </div>
        <div>
            <label class="title">Name</label>
            <input type="text" id="name2" name="name2" >
        </div>
<input type="button" id="submit" onClick="form_submit(2);"  name="submitButton" value="Submit">
</form>
</body>
</html>