<html>
<head>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
	function form_submit(a){
	alert(a);
				$.ajax({
						type:'POST', 
						url: 'db_elements.php', 
						data: { 
							name: $('#name').val(),
							name2: $('#name2').val(),
							 }, 
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
	/* attach a submit handler to the form */
    $("#form1").submit(function(event) {

      /* stop form from submitting normally */
      event.preventDefault();

      /* get some values from elements on the page: */
      var $form = $( this ),
          url = $form.attr( 'action' );

      /* Send the data using post */
      var posting = $.post( url, { name: $('#name').val(), name2: $('#name2').val() } );

      /* Alerts the results */
      posting.done(function( data ) {
        alert('success');
      });
    });
</script>
</head>
<body>
<form id="form1" action="db_elements.php" method="POST">
		<div>
            <label class="title">First Name</label>
            <input type="text" id="name" name="name" >
        </div>
        <div>
            <label class="title">Name</label>
            <input type="text" id="name2" name="name2" >
        </div>
<input type="button" id="submit" onclick="form_submit(1);"  name="submitButton" value="Submit">
</form>
</body>
</html>