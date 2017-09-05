<?php
class Grade extends DataMapper{
	var $has_many = array('user');
	function __construct(){
		parent::__construct();
	}
	
	function get_grades(){
		$objs = new Grade();
		$objs->get();
		$out = array();
		foreach ($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	
	function populate(){
		$obj = new Grade();
		$obj->get();
		return $obj;
	}
}
