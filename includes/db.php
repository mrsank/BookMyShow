<?php
define ( 'DB_USER', 'root' );
define ( 'DB_PASSWORD', '' );
define ( 'DB_HOST', 'localhost' );
define ( 'DB_NAME', 'Movie Reservation' );

$con = mysqli_connect ( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME ) or die ( "Couldn't connect to the database server." );
function getUserPassword($username, $password) {
	global $con;
	$sql = "SELECT uid,username FROM members where username='$username' and password='$password'"or die ( "Couldn't connect to the database server." );
	$result = mysqli_query ( $con, $sql );
	if (mysqli_num_rows ( $result ) == 1) {
		return true;
	} else {
		return false;
	}
}
function getSecret($username) {
	global $con;
	$sql = "SELECT secretqs FROM members where username='$username'"or die ( "Couldn't connect to the database server." );
	$result = mysqli_query ( $con, $sql );
	if (mysqli_num_rows ( $result ) == 1) {
		$row = mysqli_fetch_row ( $result );
		echo "Secret question is $row[0]";
	}
}
function newMember() {
	global $con;
	$firstname = $_POST ['firstname'];
	$lastname = $_POST ['lastname'];
	$username = $_POST ['username'];
	$password = $_POST ['password'];
	$secret = $_POST ['secret'];
	$answer = $_POST ['answer'];
	$sql = "INSERT INTO members (firstname, lastname, username, password, secretqs, answer)
	VALUES ('$firstname','$lastname','$username','$password', '$secret', '$answer')" or die ( "Couldn't connect to the database server." );
	$result = mysqli_query ( $con, $sql );
	if ($result) {
		echo nl2br ( "<center>\nYour registration is successful.\n\nYour registration details are:\n</center>" );
		echo nl2br ( "<center>Usename is $username\n</center>" );
		echo nl2br ( "<center>Password is $password\n</center>" );
		echo nl2br ( "<center>Secret question is $secret\n</center>" );
		echo nl2br ( "<center>Secret answer is $answer\n\n</center>" );
		echo nl2br ( "<a href = viewmovies.php><center>View Movies</center></a>" );
	}
}
function Register() {
	global $con;
	$username = $_POST ['username'];
	if (! empty ( $username )) {
		$sql = "SELECT * FROM members WHERE username = '$username'" or die ( "Couldn't connect to the database server." );
		$result = mysqli_query ( $con, $sql );
		if (mysqli_num_rows ( $result ) == 0) {
			newMember ();
		} else {
			echo nl2br ( "<center>\nSorry, you are already a registered member. Please log in.</center>" );
			echo nl2br ( "<center>\n\n<a href = home.php>Log In</a></center>" );
		}
	}
}
function getAllMovies() {
	global $con;
	$movies = array ();
	$sql = "SELECT mid, mname FROM movies";
	$result = mysqli_query ( $con, $sql );
	while ( $row = mysqli_fetch_row ( $result ) ) {
		$mid = $row [0];
		$name = $row [1];
		$movie = Movie::movieName ( $mid, $name );
		array_push ( $movies, $movie );
	}
	return $movies;
}
function getMovieByMid($mid) {
	global $con;
	$sql = "SELECT md.mid, mlanguage, mcast, mdirector, mreleaseyear, mname FROM moviedetails AS md INNER JOIN movies AS m ON m.mid = md.mid WHERE md.mid ='$mid'" or die ( "Couldn't connect to the database server." );
	$result = mysqli_query ( $con, $sql );
	$row = mysqli_fetch_row ( $result );
	$movie['mid'] = $row [0];
	$movie['mlanguage'] = $row [1];
	$movie['mcast'] = $row [2];
	$movie['mdirector'] = $row [3];
	$movie['mreleaseyear'] = $row [4];
	$movie['mname'] = $row [5];
	//$movie = Movie::movieDetails ( $mid, $mlanguage, $mcast, $mdirector, $mreleaseyear, $mname );
	return $movie;
}

function getMovieShowsScreens($mid) {
	global $con;
	$moviesshows = array ();
	$sql = "SELECT m.mid, sno, showtime, DATE_FORMAT(mstartdate,'%m-%d-%Y'), DATE_FORMAT(menddate,'%m-%d-%Y') FROM moviedetails AS md INNER JOIN movies AS m ON m.mid = md.mid INNER JOIN showtime AS st ON st.mid = md.mid WHERE md.mid = '$mid' ORDER BY showtime" or die ( "Couldn't connect to the database server." );
	$result = mysqli_query ( $con, $sql );
while ( $row = mysqli_fetch_row ( $result ) ) {
		$mid = $row[0];
		$screen = $row [1];
		$showtime = $row [2];
		$start = $row[3];
		$end = $row[4];
		$movie = Movie::movieShowsScreens ( $mid, $screen, $showtime, $start, $end);
		array_push ( $moviesshows, $movie );
	}
	return $moviesshows;
}

function getTicketDetails($sno) {
	global $con;
	$tickets = array ();
	$sql = "SELECT sno, ttype, tcost, tcapacity FROM ticket WHERE sno = '$sno'" or die ( "Couldn't connect to the database server." );
	$result = mysqli_query ( $con, $sql );
	while ( $row = mysqli_fetch_row ( $result ) ) {
		$sno = $row[0];
		$ttype = $row [1];
		$tcost = $row [2];
		$tcapacity = $row[3];
		$movie = Movie::movieTicketDetails ( $sno, $ttype, $tcost, $tcapacity);
		array_push ( $tickets, $movie );
	}
	return $tickets;
}
function Book() {
global $con;
	$name = $_POST ['name'];
	$showtime = $_POST ['showtime'];
	$screen = $_POST ['screen'];
	//$sdate = date('m-d-y', strtotime($_POST ['sdate']));
	$sdate = $_POST ['sdate'];
	$seats = $_POST ['seats'];
	$ttype = $_POST ['ttype'];
	$sql = "INSERT INTO reservation (sno, mname, showtime, rdate, ttype, tquantity)
	VALUES ('$screen','$name', '$showtime', '$sdate', '$ttype', '$seats')" or die ( "Couldn't connect to the database server." );
	//('$screen','$name', '$showtime', '$sdate', '$ttype', '$seats')
	$sqlR = "SELECT MAX(rno) FROM reservation" or die ( "Couldn't connect to the database server.");
	$result = mysqli_query ( $con, $sql );
	$resultR = mysqli_query ( $con, $sqlR );
	while ( $row = mysqli_fetch_row ( $resultR ) ) {
		$rno = $row[0];
	}
	if ($result) {
		echo nl2br ( "<center>\nYour booking is successful.\n\nYour booking details are:\n</center>" );
		echo nl2br ( "<center>Reservation number is $rno\n</center>" );
		echo nl2br ( "<center>Movie is $name\n</center>" );
		echo nl2br ( "<center>Show timing is $showtime\n</center>" );
		echo nl2br ( "<center>Show date is $sdate\n</center>" );
		echo nl2br ( "<center>Screen number is $screen\n</center>" );
		echo nl2br ( "<center>Ticket type is $ttype\n</center>" );
		echo nl2br ( "<center>Number of seats is $seats\n\n</center>" );
	}
	else 
		echo "fail";
}
?>


