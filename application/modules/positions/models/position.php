<?php
class Position extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_combo_data(){
		$objs = new Position();
		$objs->get();
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
}
