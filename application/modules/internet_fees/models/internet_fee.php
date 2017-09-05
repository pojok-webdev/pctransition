<?php
class Internet_fee extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_combo_data($firstdata=""){
		$objs = new Internet_fee();
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
		$obj = new Internet_fee();
		$obj->where('name',$name)->get();
		return $obj->id;
	}
	
	function populate(){
		$obj = new Application();
		$obj->get();
		return $obj;
	}
	
}
