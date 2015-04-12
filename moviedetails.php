 <?php
	require ('includes/db.php');
	require 'includes/header.php';
	require ('includes/movie.php');
	require ('includes/bookticket.php');
	require ('includes/common.php');
	require ('includes/welcome.php');
	
	if ($_SERVER ['REQUEST_METHOD'] == 'GET') {
		$mid = $_GET ['id'];
		unset($_SESSION['cart']);
		$movie = getMovieByMid ( $mid );
	}
	// if user clicks the buy tickets button
	if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
		$mid = $_POST ['id'];
		$movie = getMovieByMid ( $mid );
		$_SESSION['cart'] = $movie;
		header ( 'Location:reservation.php' );
	}
	?>
<html>
<head>
<title>BookMyFilms - Movies Details</title>
</head>
<body>
	<div id="content" class="center">
<?php
if ($mid == 1) {
	?>
 <img src="images/grandhotel.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 2) {
	?>
<img src="images/300.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 3) {
	?>
<img src="images/nfs.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 4) {
	?>
<img src="images/onechance.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 5) {
	?>
<img src="images/muppets.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 6) {
	?>
<img src="images/nymph.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 7) {
	?>
<img src="images/noah.jpg" alt="banner" style="float: right">
<?php
} else if ($mid  == 8) {
	?>
<img src="images/sabotage.jpg" alt="banner" style="float: right">
<?php
}
?>

	
	<h4>Name: <?php echo $movie['mname']; ?> </h4>
		<h4>Language: <?php echo $movie['mlanguage']; ?> </h4>
		<h4>Cast: <?php echo $movie['mcast']; ?> </h4>
		<h4>Director: <?php echo $movie['mdirector']; ?> </h4>
		<h4>Year: <?php echo $movie['mreleaseyear']; ?> </h4>
        
	<?php
	$moviesshows = array ();
	$movieid = $mid;
	$moviesshows = getMovieShowsScreens ( $movieid );
	
	if (count ( $moviesshows ) > 0) {
		echo "<table border='1'>";
		echo "<tr>";
		echo "<th>Screen</th>";
		echo "<th>Show Time</th>";
		echo "</tr>";
		foreach ( $moviesshows as $value ) {
			echo "<td>" . $value->getScreen () . "</td>";
			echo "<td>" . $value->getShow () . "</td>";
			echo "</tr>";
		}
		
		echo "</table>";
	}
	
	?>


	<form action="" method="post" accept-charset="utf-8">

			<!-- Hidden input field to get the movie id of the movie the user wishes to book. -->
			<input type="hidden" name="id" <?php echo 'value="' . $mid . '"' ?> />
			<p>
				<input type="submit" name="submit_button" value="Book Tickets"
					id="submit_button" class="formbutton" />
			</p>
		</form>
	</div>
<?php
include ('./includes/footer.php');
?>
</body>
</html>