<?php
require ('includes/header.php');
session_start ();
?>
<html>
<head>
<title>BookMyFilms - Home</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
	<script src="js/jquery-1.10.1.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		$('#login').validate({
			rules : {
				username : {
					required : true,
					email : true
				},
				password : 'required'
			},// end rules
			messages : {
				username : {
					required : "Email address used for registration."
				},
				password : {
					required : "Password is required."
			}
			}
		// end of messages

		}); // end validate()
	});
</script>
	<script src=" js/jquery-ui-1.10.4.custom.min.js"></script>
	<div id="content" class="center">
		<h4>Member Login</h4>
		<fieldset>
			<form action="logincheck.php" method="POST" id="login">
				<br> Username: <input type="text" name="username" width="15"><br> <br>
				Password: <input type="password" name="password" width="15"><br> <br>
				<input type="submit" name="submit" value="Submit" class="formbutton">
				<a href="register.php"><font size="2">Register</font></a><br> <br> <a
					href="forgotpassword.php"><font size="1">Forgot Password</font></a><br>
			</form>
		</fieldset>
	</div>
	<?php
	require ('includes/footer.php');
	?>
</body>
</html>