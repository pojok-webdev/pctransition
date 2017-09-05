<?php
class reminderlog extends DataMapper{
	var $has_one = array('reminder');
	function __construct(){
		parent::__construct();
	}
}
