<?php
require ('includes/header.php');
require ('./includes/db.php');
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>BookMyFilms - Register</title>

<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#signup').validate({
			rules : {
				firstname : 'required',
				lastname : 'required',
				username : {
					required : true,
					email : true
				},
				password : {
					required : true,
					rangelength : [ 6, 8 ]
				},
				confirm_pass : {
					equalTo : '#password'
				},
				secret : 'required',
				answer : 'required'
			},// end rules
			messages : {
				username : {
					required : "Email address must be valid."
				},
				password : {
					required : "Password is required."
				},
				confirm_pass : {
					equalTo : "The two passwords don't match."
				}
			}
		// end of messages

		}); // end validate()
	});
</script>

</head>
<body>
	<script src=" js/jquery-ui-1.10.4.custom.min.js"></script>
	<div id="content" class="center">
		<h4>Member Registration</h4>
		<fieldset>
			<form action="process.php" method="post" name="signup" id="signup">
				<br> First Name: <input type="text" name="firstname" width="15"
					id='firstname'><br> <br> Last Name: <input type="text"
					name="lastname" width="15" id='lastname'><br> <br> Username: <input
					type="text" name="username" width="15" id='username'><br> <br>
				Password: <input type="password" name="password" width="15"
					id='password'><br> <br> Confirm Password: <input type="password"
					name="confirm_pass" width="15" id='confirm_pass'><br> <br> Secret
				Question: <input type="text" name="secret" width="15" id='secret'><br>
				<br> Answer: <input type="text" name="answer" width="15" id='answer'><br>
				<br> <input type="submit" name="submit" id="submit" value="Submit"
					class="formbutton"> <a href="home.php"><font size="2">Log In</font></a><br>
				<br>
			</form>
		</fieldset>
	</div>

	<div class="footer"><?php
	include ('./includes/footer.php');
	?></div>

</body>
</html>
