<html>
<head>
<title>BookMyFilms - View Movies</title>
</head>
<body>

<?php
require ('includes/header.php');
require ('includes/db.php');
require ('includes/movie.php');
require ('includes/common.php');
require ('includes/welcome.php');

$movies = array ();
$movies = getAllMovies ();

if (count ( $movies ) > 0) {
	foreach ( $movies as $value ) {
		?>
		<div id="content" class="center">
		<?php
		echo '<a href="moviedetails.php?id=' . $value->getMid () . '">' . $value->getName () . '</a>';
		echo "<br><br>";
		?>
		</div>
		<?php
	}
}

?>
	
	<div id="content"><?php  include 'includes/footer.php'; ?></div>
</body>
</html>
