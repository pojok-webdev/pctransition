<?php
class Core extends DataMapper{
	var $has_one = array("btstower");
	function __construct(){
		parent::__construct();
	}
}
