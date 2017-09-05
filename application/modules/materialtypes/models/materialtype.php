<?php
class Materialtype extends DataMapper{
	var $has_many = array('material');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Materialtype();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	
	
	function get_combo_data($active='1'){
		$out = array();
		$objs = new Materialtype();
		if(!empty($active)){
			$objs->where('active',$active)->order_by('name','asc')->get();
		}else{
			$objs->order_by('name','asc')->get();
		}
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}
	
	function populate($active='1'){
		$obj = new Materialtype();
		if(!empty($active)){
			$obj->where('active',$active)->get()->order_by('name','asc');
		}else{
			$obj->get()->order_by('name','asc');
		}
		return $obj;
		
	}
}
