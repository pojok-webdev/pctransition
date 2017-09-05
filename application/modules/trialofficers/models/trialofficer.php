<?php
class Trialofficer extends DataMapper{
	var $has_one = array('trial');
	function __construct(){
		parent::__construct();
	}
}
