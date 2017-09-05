<?php
class Datacenter extends Datamapper{
	function __construct(){
		parent::__construct();
	}
	function getbyid($id){
		$obj = new Datacenter();
		$obj->where('id',$id)->get();
		return $obj;
	}	
	function get_combo_data($first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$objs = new Datacenter();
		$objs->where('active','1')->get();
		foreach ($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
}
