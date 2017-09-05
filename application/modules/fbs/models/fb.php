<?php
class Fb extends DataMapper{
	var $has_one = array('client_site');
	function __construct(){
		parent::__construct();
		$this->load->helper('date');
	}
	function gethumandate(){
		return date ("d/m/Y",strtotime($this->period1));
	}
} 
