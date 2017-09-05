<?php
class Preference extends DataMapper{
	var $has_one = array('user');
	function __construct(){
		parent::__construct();
	}
}