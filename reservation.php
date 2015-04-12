<?php
require ('includes/header.php');
require ('./includes/db.php');
require ('./includes/movie.php');
require ('./includes/bookticket.php');
require ('includes/common.php');
require ('includes/welcome.php');

$movies = $_SESSION ['cart'];

if (isset ( $movies )) {
	foreach ( $movies as $key=>$value ) {
		if($key=="mname"){
			$name = $value;
		}
		if($key=="mid"){
			$mid = $value;
		}
	}
}
$showsscreen = array ();
$showsscreen = getMovieShowsScreens ( $mid );
?>
<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$('#book').validate({
			rules : {
				name : 'required',
				sdate : {
					required : true,
					date : true
				},
				seats :{
					required : true,
					number : true,
					range:[1,9]
				},
			},// end rules

		}); // end validate()
		
		var start = $('#start').val(); 
		var numbers = start.split("-"); 
		var startdate = new Date(numbers[2], numbers[0]-1, numbers[1]);

		var end = $('#end').val(); 
		var numbers = end.split("-"); 
		var enddate = new Date(numbers[2], numbers[0]-1, numbers[1]);
		
		$('#sdate').datepicker({

			minDate : startdate,
			maxDate : enddate,
			dateFormat: "yy/mm/dd"
		});
	});
</script>
<script src=" js/jquery-ui-1.10.4.custom.min.js"></script>
<link href="css/ui-lightness/jquery-ui-1.10.4.custom.min.css"
	rel="stylesheet" type="text/css" />
</head>
<body>


	<div id="content" class="center">

		<h4>Ticket Confirmation</h4>
		<fieldset>
			<form action="book.php" method="post" name="book" id="book">
				<br> Name: <input name="name" type="text" id="name" width="15"
					readonly value='<?php echo $name; ?>'> <br> <br> Show Time: <select
					name="showtime" id="showtime">
					<?php
					if (count ( $showsscreen ) > 0) {
						foreach ( $showsscreen as $value ) {
							$showtime = $value->getShow ();
							?>
						<option value='<?php echo $showtime;?>'><?php echo $showtime?></option>
					<?php
						}
					}
					$screen = $value->getScreen ();
					$start = $value->getStart ();
					$end = $value->getEnd ();
					// $end = date('m-d-Y', strtotime($ed));
					?></select> <br> <br> Screen: <input name="screen" type="text"
					id="screen" width="15" readonly value='<?php echo $screen; ?>'> <br>
				<br> Show Date <input name="sdate" type="text" id="sdate" /><br> <br>
				Number of Seats: <input name="seats" type="text" id="seats"
					width="15" /><br> <br> Ticket Type: <select name="ttype"
					id="ttype">
					<?php
					$tickettype = array ();
					$tickettype = getTicketDetails ( $screen );
					
					if (count ( $tickettype ) > 0) {
						foreach ( $tickettype as $value ) {
							$tickettype = $value->getType ();
							?>
						<option value='<?php echo $tickettype;?>'><?php echo $tickettype?></option>
					<?php
						}
					}
					?></select> G = Gold, S = Silver and N = Normal <br>
				<br> <input type="submit" name="submit" id="submit" value="Confirm"
					class="formbutton"> <input name="start" type="hidden" id="start"
					width="15" readonly value='<?php echo $start; ?>'> <input
					name="start" type="hidden" id="end" width="15" readonly
					value='<?php echo $end; ?>'>

			</form>
		</fieldset>
	</div>
	<div class="footer">
	<?php
	include ('./includes/footer.php');
	?>
	</div>
</body>
</html>
