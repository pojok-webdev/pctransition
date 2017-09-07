<?php
class Problem extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_combo_data($firstdata=""){
		$objs = new Problem();
		$objs->get();
		$out = array();
		if(!is_null($firstdata)){
			$out[0] = $firstdata;
		}
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	
	function getIndex($name){
		$obj = new Problem();
		$obj->where('name',$name)->get();
		return $obj->id;
	}

	function populate(){
		$obj = new Problem();
		$obj->get();
		return $obj;
	}
	
}
