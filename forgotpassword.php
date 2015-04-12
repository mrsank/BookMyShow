 <?php
	include 'includes/header.php';
	// session.start();
	?>
<html>
<head>
<title>BookMyFilms - Forgot Password</title>
</head>
<body>
	<script src="js/jquery-1.10.1.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		$('#passcheck').validate({
			rules : {
				username : {
					required : true,
					email : true
				}
			},// end rules
			messages : {
				username : {
					required : "Email address used for registration."
				}
			}
		// end of messages

		}); // end validate()
	});
</script>
	<script src=" js/jquery-ui-1.10.4.custom.min.js"></script>
	<div id="content">
		<br>
		<h2>Forgot Password</h2>
		<fieldset>
			<form action="passcheck.php" method="POST" id="passcheck">
				Username: <input type="text" name="username" width="15"><br /> <br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</fieldset>
	</div>
	<div>
   <?php  include 'includes/footer.php'; ?>
 </div>
</body>
</html>