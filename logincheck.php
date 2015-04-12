 <?php
	require ('./includes/db.php');
	include ('includes/header.php');
	require ('./includes/bookticket.php');
	session_start();
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	
	if (getUserPassword ( $username, $password )) {
		$_SESSION['user'] = $username;
		$_SESSION['cart']=new BookTicket();
		header ('Location:viewmovies.php');
	} else {
		header ('Location:home.php');
		exit();	
	}
	
	?>
 