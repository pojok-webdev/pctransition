<?php
class Budget extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_combo_data(){
		$objs = new Budget();
		$objs->get();
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	
	function getId($name){
		$obj = new Budget();
		$obj->where('name',$name)->get();
		return $obj->id;
	}
}
