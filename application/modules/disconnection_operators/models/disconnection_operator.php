<?php
class Disconnection_operator extends DataMapper{
	var $has_one = array('disconnection');
	function __construct(){
		parent::__construct();
	}
}
