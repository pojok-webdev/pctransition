<?php
class Application extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_combo_data(){
		$objs = new Application();
		$objs->get();
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	
	function populate(){
		$obj = new Application();
		$obj->get();
		return $obj;
	}
	
}
