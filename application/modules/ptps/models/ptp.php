<?php
class Ptp extends DataMapper{
	var $has_one = array("btstower","branch");
	function __construct(){
		parent::__construct();
	}
}
