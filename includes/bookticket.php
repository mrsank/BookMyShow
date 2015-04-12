 <?php
 
 class BookTicket {

 private $movies;

	function __construct() {
		$this->movies = array();
	}
 
	function addMovie($movie) {  // no validations done.
			$Mid = $movie->getMid();
			$this->movies[$Mid]=$movie;
	}
        
  	function getMovies() {
		return $this->movies;
		}
    
     
 }
 ?>