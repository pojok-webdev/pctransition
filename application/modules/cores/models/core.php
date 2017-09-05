<?php
class Core extends CI_Model{
	var $ci;
//	var $has_one = array("btstower");
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
}
