<?php
class Ticketcause extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	function get_combo_data($firstrow = ''){
		$objs = new Ticketcause();
		$objs->get();
		$out = array();
		if($firstrow !==''){
			$out[0] = $firstrow;			
		}
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	function get_combo_data2($firstrow = ''){
		$objs = new Ticketcause();
		$objs->get();
		$out = array();
		if($firstrow !==''){
			$out[0] = $firstrow;			
		}
		foreach($objs as $obj){
			$out[$obj->name] = $obj->name;
		}
		return $out;
	}
}
