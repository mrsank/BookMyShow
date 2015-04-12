<?php
require ('./includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Result</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<script src="js/jquery.validate.min.js"></script>
<script>
$(document).ready(function() {

}); // end ready
</script>
</head>
<body>
	<div class="wrapper">

		<div class="content">
			<div class="main">
				<h1></h1>
			<?php
			$username = $_POST ['username'];
			getSecret($username);
			?>
			
		</div>
		</div>
		<div class="footer"></div>
	</div>
</body>
</html>
