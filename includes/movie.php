<?php
class Movie {
	private $name;
	private $mid;
	private $lang;
	private $cast;
	private $dir;
	private $year;
	private $sno;
	private $stime;
	private $cost;
	private $capacity;
	private $type;
	private $start;
	private $end;
	
	function __construct() {
	}
	
	public static function movieName( $mid, $mname ) {
		$instance = new self($mid, $mname);
		$instance->mid = $mid;
		$instance->name = $mname;
		return $instance;
	}
	
	public static function movieDetails($mid, $mlanguage, $mcast, $mdirector, $mreleaseyear, $mname) {
		$instance = new self($mid, $mlanguage, $mcast, $mdirector, $mreleaseyear, $mname);
		$instance->mid = $mid;
		$instance->name = $mname;
		$instance->lang = $mlanguage;
		$instance->cast = $mcast;
		$instance->dir = $mdirector;
		$instance->year = $mreleaseyear;
		return $instance;
	}
	
	public static function movieShowsScreens( $mid, $screen, $showtime, $start, $end ) {
		$instance = new self($screen, $showtime, $start, $end);
		$instance->mid = $mid;
		$instance->sno = $screen;
		$instance->stime = $showtime;
		$instance->start = $start;
		$instance->end = $end;
		return $instance;
	}
	
	public static function movieTicketDetails( $sno, $ttype, $tcost, $tcapacity ) {
		$instance = new self($sno, $ttype, $tcost, $tcapacity);
		$instance->sno = $sno;
		$instance->type = $ttype;
		$instance->cost = $tcost;
		$instance->capacity = $tcapacity;
		return $instance;
	}
	
	public function getMid() {
		return $this->mid;
	}
	public function getName() {
		return $this->name;
	}
	public function getLang() {
		return $this->lang;
	}
	public function getCast() {
		return $this->cast;
	}
	public function getDir() {
		return $this->dir;
	}
	public function getYear() {
		return $this->year;
	}
	public function getScreen() {
		return $this->sno;
	}
	public function getShow() {
		return $this->stime;
	}
	public function getType() {
		return $this->type;
	}
	public function getCost() {
		return $this->cost;
	}
	public function getCapacity() {
		return $this->capacity;
	}
	public function getStart() {
		return $this->start;
	}
	public function getEnd() {
		return $this->end;
	}
}

?>