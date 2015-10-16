<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<script>
function submitForm() {
    $.ajax({type:'POST', url: 'db_input.php', data:$('#testForm').serialize(), success: function(response) {
    }});

    return false;
}
</script>
	<br>
	<form id="testForm" onSubmit="return submitForm();">
		TEST: <input type="text" id="textTest" name="test" />
		<br><br>
		<input type="submit" value="SAVE" id="submit" name="submit" size="20"/>
	</form>
	<div id="result"></div>
</body>
</html>