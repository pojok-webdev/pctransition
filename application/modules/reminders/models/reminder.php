<?php
class Reminder extends DataMapper{
	var $has_many = array('reminderlog');
	function __construct(){
		parent::__construct();
	}
	function populate(){
		$objs = new Reminder();
		$objs->get();
		return $objs;
	}
}
