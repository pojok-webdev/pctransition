<?php
class Duration extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_combo_data($firstdata=""){
		$objs = new Duration();
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
		$obj = new Duration();
		$obj->where('name',$name)->get();
		return $obj->id;
	}
}
